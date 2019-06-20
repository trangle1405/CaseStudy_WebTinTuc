<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Xã Hội','name_slug' => 'Xa-Hoi'],
            ['name' => 'Thế Giới','name_slug' => 'The-Gioi'],
            ['name' => 'Kinh Doanh','name_slug' => 'Kinh-Doanh'],
            ['name' => 'Văn Hoá','name_slug' => 'Van-Hoa'],
            ['name' => 'Thể Thao','name_slug' => 'The-Thao'],
            ['name' => 'Pháp Luật','name_slug' => 'Phap-Luat'],
            ['name' => 'Đời Sống','name_slug' => 'Doi-Song'],
            ['name' => 'Khoa Học','name_slug' => 'Khoa-Hoc'],
            ['name' => 'Vi Tính','name_slug' => 'Vi-Tinh']
        ]);
    }
}
