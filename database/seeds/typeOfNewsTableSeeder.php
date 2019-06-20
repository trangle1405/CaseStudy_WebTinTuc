<?php

use Illuminate\Database\Seeder;

class typeOfNewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typeOfNews')->insert([
            ['category_id' => '1', 'name' => 'Giáo Dục', 'name_slug' => 'Giao-Duc'],
            ['category_id' => '1', 'name' => 'Nhịp Điệu Trẻ', 'name_slug' => 'Nhip-Dieu-Tre'],
            ['category_id' => '1', 'name' => 'Du Lịch', 'name_slug' => 'Du-Lich'],
            ['category_id' => '1', 'name' => 'Du Học', 'name_slug' => 'Du-Hoc'],
            ['category_id' => '2', 'name' => 'Cuộc Sống Đó Đây', 'name_slug' => 'Cuoc-Song-Do-Day'],
            ['category_id' => '2', 'name' => 'Ảnh', 'name_slug' => 'Anh'],
            ['category_id' => '2', 'name' => 'Người Việt 5 Châu', 'name_slug' => 'Nguoi-Viet-5-Chau'],
            ['category_id' => '2', 'name' => 'Phân Tích', 'name_slug' => 'Phan-Tich'],
            ['category_id' => '3', 'name' => 'Chứng Khoán', 'name_slug' => 'Chung-Khoan'],
            ['category_id' => '3', 'name' => 'Bất Động Sản', 'name_slug' => 'Bat-Dong-San'],
            ['category_id' => '3', 'name' => 'Doanh Nhân', 'name_slug' => 'Doanh-Nhan'],
            ['category_id' => '3', 'name' => 'Quốc Tế', 'name_slug' => 'Quoc-Te'],
            ['category_id' => '3', 'name' => 'Mua Sắm', 'name_slug' => 'Mua-Sam'],
            ['category_id' => '3', 'name' => 'Doanh Nghiệp Viết', 'name_slug' => 'Doanh-Nghiep-Viet'],
            ['category_id' => '4', 'name' => 'Hoa Hậu', 'name_slug' => 'Hoa-Hau'],
            ['category_id' => '4', 'name' => 'Nghệ Sỹ', 'name_slug' => 'Nghe-Sy'],
            ['category_id' => '4', 'name' => 'Âm Nhạc', 'name_slug' => 'Am-Nhac'],
            ['category_id' => '4', 'name' => 'Thời Trang', 'name_slug' => 'Thoi-Trang'],
            ['category_id' => '4', 'name' => 'Điện Ảnh', 'name_slug' => 'Dien-Anh'],
            ['category_id' => '4', 'name' => 'Mỹ Thuật', 'name_slug' => 'My-Thuat'],
            ['category_id' => '5', 'name' => 'Bóng Đá', 'name_slug' => 'Bong-Da'],
            ['category_id' => '5', 'name' => 'Tennis', 'name_slug' => 'Tennis'],
            ['category_id' => '5', 'name' => 'Chân Dung', 'name_slug' => 'Chan-Dung'],
            ['category_id' => '5', 'name' => 'Ảnh', 'name_slug' => 'Anh-TT'],
            ['category_id' => '6', 'name' => 'Hình Sự', 'name_slug' => 'Hinh-Su']
        ]);
    }
}
