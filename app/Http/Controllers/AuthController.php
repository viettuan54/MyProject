<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /* ========== ĐĂNG KÝ ========== */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        return redirect('/dangnhap')->with('success', 'Đăng ký thành công');
    }

    /* ========== ĐĂNG NHẬP ========== */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->with('error', 'Sai tài khoản hoặc mật khẩu');
        }

        $user = Auth::user();

        // USER thường → vào thẳng
        if ($user->role !== 'admin') {
            return redirect('/');
        }

        // ADMIN → logout tạm, chờ verify face
        Auth::logout();
        session(['admin_verify_user_id' => $user->id]);

        return redirect()->route('admin.face.verify');
    }

    /* ========== FORM XÁC THỰC KHUÔN MẶT ========== */
    public function showVerifyFace()
    {
        if (!session()->has('admin_verify_user_id')) {
            return redirect('/dangnhap');
        }

        return view('Login.verify_face');
    }

    /* ========== XỬ LÝ VERIFY FACE (JS WEBCAM) ========== */
public function verifyFace(Request $request)
{
    if (!session()->has('admin_verify_user_id')) {
        return response()->json(['status' => 'fail', 'reason' => 'no_session']);
    }

    $request->validate([
        'image' => 'required|string'
    ]);

    $user = User::find(session('admin_verify_user_id'));
    if (!$user) {
        return response()->json(['status' => 'fail', 'reason' => 'no_user']);
    }

    // 1️⃣ Decode image
    $image = preg_replace('#^data:image/\w+;base64,#i', '', $request->image);
    $image = base64_decode($image);

    $imagePath = storage_path('app/face_verify.jpg');
    file_put_contents($imagePath, $image);

    // 2️⃣ Run python
    $python = 'D:\\Python\\python.exe';
    $script = base_path('AI/face_recognition_attendance.py');

    $cmd = "\"$python\" \"$script\" \"$imagePath\" 2>&1";
    $raw = shell_exec($cmd);

    // 3️⃣ DEBUG SAFE
    $lines = array_filter(array_map('trim', explode("\n", $raw)));
    $lastLine = strtolower(end($lines));

    // 👉 LOG để bạn xem
    \Log::info('FACE VERIFY RAW', [
        'last_line' => $lastLine,
        'raw' => $raw
    ]);

    // 4️⃣ CHECK KẾT QUẢ
    if ($lastLine === 'admin') {
        Auth::login($user);
        session()->forget('admin_verify_user_id');

        return response()->json([
            'status' => 'ok',
            'redirect' => '/'
        ]);
    }

    // Không xóa session để có thể thử lại liên tục
    return response()->json([
        'status' => 'fail',
        'last_line' => $lastLine
    ]);
}

    /* ========== ĐĂNG XUẤT ========== */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /* ========== TRANG THÔNG TIN ========== */
    public function index()
    {
        return view('Login.Thongtin');
    }

    /* ========== CẬP NHẬT THÔNG TIN ========== */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->name;

        // Upload avatar
        if ($request->hasFile('avatar')) {
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('avatars', $avatarName, 'public');
            $user->avatar = $avatarName;
        }

        // Đổi mật khẩu
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Cập nhật hồ sơ thành công');
    }
}
