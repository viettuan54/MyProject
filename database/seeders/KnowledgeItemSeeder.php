<?php

namespace Database\Seeders;

use App\Models\KnowledgeItem;
use Illuminate\Database\Seeder;

class KnowledgeItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Thong tin showroom Sai Gon',
                'content' => 'Porsche Centre Sai Gon tai 2 Bis Nguyen Thi Minh Khai, Quan 1, TP.HCM. Hotline: 028 3911 9111. Gio lam viec 8:00 - 18:00 (Chu nhat - Thu bay). Dia chi nay la trung tam chinh hang Porsche tai TP.HCM, cung cap dich vu tư van, test drive, bao duong, va ban hang xe moi.',
                'tags' => 'showroom,sai gon,hcm,hotline,gio lam viec,tư van,test drive',
                'source' => 'showroom.saigon',
            ],
            [
                'title' => 'Thong tin showroom Ha Noi',
                'content' => 'Porsche Centre Ha Noi tai 2 Nguyen Van Huyen, Cau Giay, Ha Noi. Hotline: 024 3795 9111. Gio lam viec 8:00 - 18:00. Porsche Studio Ha Noi tai TTTM Lotte, 54 Lieu Giai, Ba Dinh, Ha Noi. Hotline: 024 3200 9111. Gio lam viec 9:00 - 21:00 (hang ngay). Hai trung tam puc vu day du dich vu tư van, bao duong, va ban hang.',
                'tags' => 'showroom,ha noi,hanoi,hotline,gio lam viec,studio,lotte',
                'source' => 'showroom.hanoi',
            ],
            [
                'title' => 'Chinh sach bao hanh Porsche',
                'content' => 'Bao hanh chinh hang 3 nam khong gioi han km. Bao hanh pin Taycan 8 nam hoac 160000 km. Bao hanh son 3 nam, bao hanh chong an mor 12 nam. Bao hiem vat chat can ban 1 nam mien phi voi xe mua moi. Khach hang co the goi rong bao hanh tuy chon them.',
                'tags' => 'bao hanh,warranty,taycan,pin,son,bao hiem',
                'source' => 'policy.warranty',
            ],
            [
                'title' => 'Thong tin tai chinh tra gop',
                'content' => 'Porsche Financial Services ho tro tai tro toi da 85% gia tri xe. Ky han tu 12 den 84 thang. Lai suat canh tranh bat dau tu 7.5% tuy theo thoi diem. Thu tuc nhanh gon, duyet trong 24 gio. Co tro cap goi von toan bo quy trinh.',
                'tags' => 'tra gop,tai chinh,vay,lai suat,funding,porsche financial',
                'source' => 'policy.finance',
            ],
            [
                'title' => 'Bang gia dong xe tham khao',
                'content' => 'Bang gia tham khao 2026: Macan tu 3.350 ty VND, 718 tu 3.850 ty VND, Taycan tu 4.620 ty VND, Panamera tu 6.420 ty VND, Cayenne tu 5.560 ty VND, 911 tu 8.870 ty VND. Gia co the thay doi tuy theo cau hinh, lung, mau sac va cac tuy chon them them.',
                'tags' => 'bang gia,gia xe,macan,718,taycan,cayenne,911,panamera,price',
                'source' => 'catalog.price',
            ],
            [
                'title' => 'Chi tiet dong xe 718',
                'content' => 'Porsche 718 - dong xe the thao 2 cua gon nhe va manh me. Dong co 4 xi-lanh tang ap voi cong suat tu 300 den 420 ma luc. Cac phien ban nhan hanh: 718 Cayman, 718 Cayman S, 718 Boxster, 718 Boxster S, 718 Spyder. Gia tham khao tu 3.850 ty VND. Thich hop cho cac nguoi yeu thich toc do va cam nhan lai dien.',
                'tags' => '718,cayman,boxster,the thao,2 cua,turbo,re,gia re,rẻ nhất',
                'source' => 'catalog.718',
            ],
            [
                'title' => '718 Cayman - dong xe 2 cua co dinh',
                'content' => 'Porsche 718 Cayman - phien ban xe 2 cua co dinh, thit nhe, ngang gion. Dong co 4 xi-lanh 2.0L hoac 2.5L tang ap voi cong suat 300 hoac 365 ma luc tuy theo phien ban Standard hoac S. Toc do toi da 275-285 km/h, tang toc 0-100 trong 4.7-5.4 giay. Tai nguyen rua phanh M, he thong loi phuong hanh ca tinh, ke lem an toan toan vien. Gia tham khao tu 3.850 ty VND. Ide bon ve ca nhan la quyen chon kiem kinh te nhat cua dong 718.',
                'tags' => 'cayman,718,coupe,fix,gia re,dong co 2.0,2.5,thit xe',
                'source' => 'catalog.718.cayman',
            ],
            [
                'title' => '718 Boxster - dong xe mo tran canh',
                'content' => 'Porsche 718 Boxster - phien ban xe mo tran canh convertible, thich hop cho dieu kien tro hang va day gio. Dong co 4 xi-lanh 2.0L hoac 2.5L tang ap voi cong suat 300 hoac 365 ma luc tuy theo phien ban Standard hoac S. Toc do toi da 275-285 km/h, tang toc 0-100 trong 4.8-5.5 giay. May tran canh dien dung 11 giay, cao on biem va bao toan san pham. Gia tham khao tu 4.150 ty VND. Du doan de trai nghiem hanh dong tren duong cao toc va tham du chương trinh tuan thao.',
                'tags' => 'boxster,718,convertible,roadster,mo tran,canh,gia cao hon cayman',
                'source' => 'catalog.718.boxster',
            ],
            [
                'title' => '718 Spyder - dong xe mo tran cao cap nhat',
                'content' => 'Porsche 718 Spyder - phien ban top cao cap nhat cua dong 718, 100% mo tran canh va khong co cua ngoai duong. Dong co 4.0L boxer 6 xi-lanh tu nhien (khong tang ap) voi cong suat 414 ma luc, am thanh va thom thanh hang dau. Toc do toi da 301 km/h, tang toc 0-100 trong 3.7 giay. He thong truc dua cao cap voi khoa ban va he thong kh ca tnh. Noi that carbon fiber, van da nhân tao cao cap. Gia tham khao tu 5.850 ty VND. Danh cho cac nhieu thị yeu xich anh miét va muon the nghiem cuc han thich canh lam xe the thao nhat dôi 718.',
                'tags' => 'spyder,718,convertible,6xi,boxer,414hp,cao cap,dat nhat',
                'source' => 'catalog.718.spyder',
            ],
            [
                'title' => 'Chi tiet dong xe 911',
                'content' => 'Porsche 911 - bieu tuong huyen thoai cua hang. Dong co 6 xi-lanh boxer voi thiet ke kinh dien. Cac phien ban: 911 Carrera, 911 Carrera S, 911 Turbo, 911 Turbo S, 911 GT3. Gia tham khao tu 8.870 ty VND. Xe the thao ham hoc nhat voi truyen thong 70 nam. Hieu suat an tuong, kha nang lai tien tien.',
                'tags' => '911,carrera,turbo,gt3,huyen thoai,iconic,dat,gia cat,đắt nhất,gia cao',
                'source' => 'catalog.911',
            ],
            [
                'title' => 'Chi tiet dong xe Taycan',
                'content' => 'Porsche Taycan - xe dien the thao dau tien cua Porsche. Cong nghe pin 800V voi sac sieu nhanh. Cong suat toi da len 761 ma luc. Cac phien ban: Taycan, Taycan 4S, Taycan Turbo, Taycan Turbo S, Taycan Cross Turismo. Gia tham khao tu 4.620 ty VND. La tuong lai cua dong luc nguon voi hieu suat khong thoả hiệp.',
                'tags' => 'taycan,dien,electric,ev,800v,sac nhanh,future,gia trung',
                'source' => 'catalog.taycan',
            ],
            [
                'title' => 'Chi tiet dong xe Macan',
                'content' => 'Porsche Macan - SUV compact the thao, linh hoat trong do thi va manh me tren moi dia hinh. Dong co 4 xi-lanh voi cong suat canh tranh. Cac phien ban: Macan, Macan S, Macan GTS, Macan Turbo. Gia tham khao tu 3.350 ty VND. Lua chon ly tuong de gia dinh va ca nhan dam me toc do.',
                'tags' => 'macan,suv,compact,do thi,gia dinh,sporty,re,rẻ nhất,gia thap',
                'source' => 'catalog.macan',
            ],
            [
                'title' => 'Chi tiet dong xe Cayenne',
                'content' => 'Porsche Cayenne - SUV cao cap, rong rai va da nang. Ket hop tien nghi gia dinh voi DNA the thao Porsche. Cac phien ban: Cayenne, Cayenne S, Cayenne E-Hybrid, Cayenne Turbo, Cayenne Turbo S E-Hybrid. Gia tham khao tu 5.560 ty VND. Thieu hoa nhien lieu tot, khong kho khan tren duong truog.',
                'tags' => 'cayenne,suv,full-size,gia dinh,hybrid,luxury,gia cao',
                'source' => 'catalog.cayenne',
            ],
            [
                'title' => 'Dich vu bao duong va sua chua',
                'content' => 'Dich vu bao duong Porsche: Bao duong dinh ky theo huong dan hang. Trung tam dich vu dat chuan toan cau. Ky thuat vien dao tao tai Duc. Phu tung chinh hang 100%. Co the dat lich bao duong qua hotline hoac truc tiep tai showroom. Sach bao duong da duoc tinh san trong gia san pham.',
                'tags' => 'bao duong,service,sua chua,maintenance,phu tung,hotline',
                'source' => 'service.maintenance',
            ],
            [
                'title' => 'Dich vu test drive va tư van',
                'content' => 'Dat lich lai thu mien phi tai Porsche: Co the dat lich lai thu bat ky mau xe nao. Chung toi sap xep chuyen vien tư van dong hanh. Duong thoi gian 30-60 phut tuy theo nhu cau. Xe lap dat sach sao, bao hiem day du, tro cap mien phi. Lien he hotline showroom de dat lich soonest.',
                'tags' => 'test drive,lai thu,tư van,huong dan,hotline,experience',
                'source' => 'service.testdrive',
            ],
            [
                'title' => 'Phuong thuc thanh toan',
                'content' => 'Cac tuy chon thanh toan xe Porsche: (1) Thanh toan mot lan bang chuyen khoan hoac tien mat, (2) Tra gop qua Porsche Financial Services 12-84 thang tai lai suat canh tranh, (3) Tra gop qua ngan hang doi tac voi cac dieu kien loi ich. Ho tro tư van chi tiet tai showroom. Tro cap goi gop 100% quy trinh mua hang.',
                'tags' => 'thanh toan,payment,tra gop,chuyen khoan,financial',
                'source' => 'policy.payment',
            ],
            [
                'title' => 'So sanh gia tham khao dong xe Porsche',
                'content' => 'Danh sach gia dong xe Porsche tham khao (2026): (1) Macan - rẻ nhất tu 3.350 ty VND (SUV compact), (2) 718 - tu 3.850 ty VND (the thao 2 cua), (3) Taycan - tu 4.620 ty VND (xe dien), (4) Cayenne - tu 5.560 ty VND (SUV full-size), (5) Panamera - tu 6.420 ty VND (sedan), (6) 911 - đắt nhất tu 8.870 ty VND (the thao huyen thoai). Gia tham khao va co the thay doi tuy theo cau hinh lua chon.',
                'tags' => 'gia,so sanh,rẻ nhất,đắt nhất,macan,718,taycan,cayenne,panamera,911,bang gia',
                'source' => 'catalog.price',
            ],
        ];

        foreach ($items as $item) {
            KnowledgeItem::updateOrCreate(
                ['title' => $item['title']],
                [
                    'content' => $item['content'],
                    'tags' => $item['tags'],
                    'source' => $item['source'],
                    'is_active' => true,
                ]
            );
        }
    }
}
