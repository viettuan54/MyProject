<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('Admin.Addproduct');
    }

    /**
     * Store a newly created product in database.
     */
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug|max:255',
            'subtitle' => 'nullable|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price_vnd' => 'required|numeric|min:0',
            'price_display' => 'nullable|string',
            'power' => 'nullable|string|max:255',
            'power_ps' => 'nullable|integer|min:0',
            'power_kw' => 'nullable|integer|min:0',
            'torque_nm' => 'nullable|integer|min:0',
            'acceleration_sec' => 'nullable|numeric|min:0',
            'top_speed_kmh' => 'nullable|integer|min:0',
            'consumption_l_per_100km' => 'nullable|numeric|min:0',
            'spec_note' => 'nullable|string',
            'length_mm' => 'nullable|integer|min:0',
            'height_mm' => 'nullable|integer|min:0',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'stock' => 'nullable|integer|min:0',
            'is_active' => 'required|in:0,1',
        ]);

        // Auto-generate slug if empty
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Auto-format price_display if empty
        if (empty($validated['price_display']) && !empty($validated['price_vnd'])) {
            $validated['price_display'] = number_format($validated['price_vnd'], 0, ',', '.') . ' VNĐ';
        }

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('frontend/asset/images'), $mainImageName);
            $validated['main_image'] = 'frontend/asset/images/' . $mainImageName;
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryImageName = time() . '_' . Str::random(10) . '_' . $galleryImage->getClientOriginalName();
                $galleryImage->move(public_path('frontend/asset/images'), $galleryImageName);
                $galleryPaths[] = 'frontend/asset/images/' . $galleryImageName;
            }
            $validated['gallery'] = json_encode($galleryPaths);
        }

        // Set default values
        $validated['stock'] = $validated['stock'] ?? 0;
        $validated['is_active'] = $validated['is_active'] == 1 ? true : false;

        // Create product
        $product = product::create($validated);

        return redirect()->route('admin.product')
            ->with('success', 'Sản phẩm "' . $product->name . '" đã được thêm thành công!');
    }

    /**
     * Display all products.
     */
public function index()
{
    $products = product::orderBy('id', 'ASC')->get();
    return view('Admin.Product', compact('products'));
}
    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $product = product::findOrFail($id);
        return view('Admin.EditProduct', compact('product'));
    }

    /**
     * Update the specified product in database.
     */
    public function update(Request $request, $id)
    {
        $product = product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug,' . $id . '|max:255',
            'subtitle' => 'nullable|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price_vnd' => 'required|numeric|min:0',
            'price_display' => 'nullable|string',
            'power' => 'nullable|string|max:255',
            'power_ps' => 'nullable|integer|min:0',
            'power_kw' => 'nullable|integer|min:0',
            'torque_nm' => 'nullable|integer|min:0',
            'acceleration_sec' => 'nullable|numeric|min:0',
            'top_speed_kmh' => 'nullable|integer|min:0',
            'consumption_l_per_100km' => 'nullable|numeric|min:0',
            'spec_note' => 'nullable|string',
            'length_mm' => 'nullable|integer|min:0',
            'height_mm' => 'nullable|integer|min:0',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'stock' => 'nullable|integer|min:0',
            'is_active' => 'required|in:0,1',
        ]);

        // Auto-generate slug if empty
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Auto-format price_display if empty
        if (empty($validated['price_display']) && !empty($validated['price_vnd'])) {
            $validated['price_display'] = number_format($validated['price_vnd'], 0, ',', '.') . ' VNĐ';
        }

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('frontend/asset/images'), $mainImageName);
            $validated['main_image'] = 'frontend/asset/images/' . $mainImageName;
        }

        // Handle gallery images upload (append to existing)
        if ($request->hasFile('gallery')) {
            $galleryPaths = !empty($product->gallery) ? json_decode($product->gallery, true) : [];
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryImageName = time() . '_' . Str::random(10) . '_' . $galleryImage->getClientOriginalName();
                $galleryImage->move(public_path('frontend/asset/images'), $galleryImageName);
                $galleryPaths[] = 'frontend/asset/images/' . $galleryImageName;
            }
            $validated['gallery'] = json_encode($galleryPaths);
        }

        $validated['is_active'] = $validated['is_active'] == 1 ? true : false;

        $product->update($validated);

        return redirect()->route('admin.product')
            ->with('success', 'Sản phẩm "' . $product->name . '" đã được cập nhật thành công!');
    }

    /**
     * Delete the specified product.
     */
    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $productName = $product->name;
        $product->delete();

        return redirect()->route('admin.product')
            ->with('success', 'Sản phẩm "' . $productName . '" đã được xóa!');
    }
    public function view($id)
{
    $product = product::findOrFail($id);
    return view('Admin.ViewProduct', compact('product'));
}

    /**
     * Search products via AJAX
     */
    public function search(Request $request)
    {
        $query = trim($request->get('q', ''));

        if (mb_strlen($query) < 2) {
            return response()->json(['results' => []]);
        }

        $exactProducts = product::where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%')
                    ->orWhere('category', 'LIKE', '%' . $query . '%')
                    ->orWhere('subtitle', 'LIKE', '%' . $query . '%')
                    ->orWhere('slug', 'LIKE', '%' . $query . '%');
            })
            ->select('id', 'name', 'category', 'price_display', 'main_image', 'slug')
            ->orderByRaw("CASE
                WHEN name LIKE ? THEN 0
                WHEN slug LIKE ? THEN 1
                WHEN category LIKE ? THEN 2
                WHEN subtitle LIKE ? THEN 3
                ELSE 4
            END", ["%{$query}%", "%{$query}%", "%{$query}%", "%{$query}%"])
            ->limit(8)
            ->get();

        $products = $exactProducts;

        if ($products->isEmpty()) {
            $normalizedQuery = $this->normalizeSearchText($query);

            $products = product::where('is_active', true)
                ->select('id', 'name', 'category', 'price_display', 'main_image', 'slug', 'subtitle', 'description')
                ->get()
                ->filter(function ($product) use ($normalizedQuery) {
                    $haystack = $this->normalizeSearchText(implode(' ', [
                        $product->name,
                        $product->subtitle,
                        $product->category,
                        $product->slug,
                    ]));

                    return str_contains($haystack, $normalizedQuery);
                })
                ->take(8)
                ->values();

            if ($products->isEmpty()) {
                $products = product::where('is_active', true)
                    ->select('id', 'name', 'category', 'price_display', 'main_image', 'slug', 'subtitle', 'description')
                    ->get()
                    ->filter(function ($product) use ($normalizedQuery) {
                        $haystack = $this->normalizeSearchText(implode(' ', [
                            $product->name,
                            $product->subtitle,
                            $product->category,
                            $product->slug,
                            $product->description,
                        ]));

                        return str_contains($haystack, $normalizedQuery);
                    })
                    ->take(8)
                    ->values();
            }
        }

        $results = $products->map(fn($product) => $this->mapProductForSearch($product));

        return response()->json(['results' => $results]);
    }

    public function searchPage(Request $request)
    {
        $query = trim($request->get('q', ''));
        $products = collect();

        if (mb_strlen($query) >= 2) {
            $products = product::where('is_active', true)
                ->where(function ($q) use ($query) {
                    $q->where('name', 'LIKE', '%' . $query . '%')
                        ->orWhere('category', 'LIKE', '%' . $query . '%')
                        ->orWhere('subtitle', 'LIKE', '%' . $query . '%')
                        ->orWhere('slug', 'LIKE', '%' . $query . '%');
                })
                ->orderByRaw("CASE
                    WHEN name LIKE ? THEN 0
                    WHEN slug LIKE ? THEN 1
                    WHEN category LIKE ? THEN 2
                    WHEN subtitle LIKE ? THEN 3
                    ELSE 4
                END", ["%{$query}%", "%{$query}%", "%{$query}%", "%{$query}%"])
                ->orderBy('category')
                ->orderBy('name')
                ->get();

            if ($products->isEmpty()) {
                $normalizedQuery = $this->normalizeSearchText($query);

                $products = product::where('is_active', true)
                    ->get()
                    ->filter(function ($product) use ($normalizedQuery) {
                        $haystack = $this->normalizeSearchText(implode(' ', [
                            $product->name,
                            $product->subtitle,
                            $product->category,
                            $product->slug,
                        ]));

                        return str_contains($haystack, $normalizedQuery);
                    })
                    ->values();

                if ($products->isEmpty()) {
                    $products = product::where('is_active', true)
                        ->get()
                        ->filter(function ($product) use ($normalizedQuery) {
                            $haystack = $this->normalizeSearchText(implode(' ', [
                                $product->name,
                                $product->subtitle,
                                $product->category,
                                $product->slug,
                                $product->description,
                            ]));

                            return str_contains($haystack, $normalizedQuery);
                        })
                        ->values();
                }
            }
        }

        $productsByCategory = $products->groupBy(function ($product) {
            return $product->category ?: 'Sản phẩm khác';
        });

        return view('User.SearchResults', [
            'query' => $query,
            'products' => $products,
            'productsByCategory' => $productsByCategory,
        ]);
    }

    private function mapProductForSearch(product $product): array
    {
        $productUrl = $product->slug ? url('/' . ltrim($product->slug, '/')) : route('products.view', $product->id);

        return [
            'id' => $product->id,
            'name' => $product->name,
            'category' => $product->category,
            'price' => $product->price_display,
            'image' => asset($product->main_image),
            'url' => $productUrl,
        ];
    }

    private function normalizeSearchText(?string $text): string
    {
        $normalized = Str::of((string) $text)
            ->lower()
            ->ascii()
            ->replaceMatches('/\s+/', ' ')
            ->trim()
            ->value();

        return $normalized;
    }
}
