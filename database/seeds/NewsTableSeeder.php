<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $NoiDung = "Noi dung";
        DB::table('news')->insert([
            ['typeOfNews_id' => '2', 'title' => '100 cặp tình nhân hôn nhau trên khinh khí cầu ', 'title_slug' => '100-Cap-Tinh-Nhan-Hon-Nhau-Tren-Khinh-Khi-Cau', 'summary' => '100 cặp tình nhân sẽ trao nhau nụ hôn trên khinh khí cầu và được tặng một bó hoa với 999 nụ hồng xanh ', 'content' => $NoiDung, 'image' => 'valentine22.jpg', 'featured_news' => 1],
            ['typeOfNews_id' => '2', 'title' => 'Giám đốc tuổi mèo và thành tích đáng nể ', 'title_slug' => 'Giam-Doc-Tuoi-Meo-Va-Thanh-Tich-Dang-Ne', 'summary' => 'Học hết lớp 9, Nguyễn Hữu Năm phải nghỉ học vì nhà nghèo lại đông con, nhưng chàng trai đất Chương Mỹ (Hà Nội. ', 'content' => $NoiDung, 'image' => 'Nguyen_Huu_Nam_set_sub.jpg', 'featured_news' => 1],
            ['typeOfNews_id' => '1', 'title' => 'Học sinh vùng cao nghỉ Tết kéo dài vì giá rét', 'title_slug' => 'Hoc-Sinh-Vung-Cao-Nghi-Tet-Keo-Dai-Vi-Gia-Ret', 'summary' => 'Học sinh Hà Giang có thể nghỉ Tết Tân Mão gần 20 ngày còn học sinh Lào Cai được nghỉ Tết hơn các vùng khác 3 ngày để tránh giá rét. ', 'content' => $NoiDung, 'image' => 'sapa9.jpg', 'featured_news' => 1],
            ['typeOfNews_id' => '1', 'title' => 'Hỗ trợ gần 3.000 vé xe tết cho sinh viên', 'title_slug' => 'Ho-Tro-Gan-3.000-Ve-Xe-Tet-Cho-Sinh-Vien', 'summary' => 'Mỗi khi máy bay sắp hạ cánh xuống sân bay Suvarnabhumi, tôi đều có cảm giác mình sắp được trở về nhà, về quê hương thân thương thứ hai của mình.', 'content' => $NoiDung, 'image' => 'sinhvien[1]_1.jpg', 'featured_news' => 1],
            ['typeOfNews_id' => '3', 'title' => 'Một mình ở Thái Lan ', 'title_slug' => 'Mot-Minh-O-Thai-Lan', 'summary' => 'Không quá ồn ã tấp nập như Hong Kong, hay quá yên bình như Hội An, Bangkok khiến cho tôi cảm thấy vô cùng phấn khích, tựa hồ như vừa thức giấc sau một cơn ngủ say. Bạn Nguyễn Anh Ngọc viết. ', 'content' => $NoiDung, 'image' => 'top1.jpg', 'featured_news' => 1],
            ['typeOfNews_id' => '19', 'title' => 'Phim Tết của Trương Bá Chi lép vế', 'title_slug' => 'Phim-Tet-Cua-Truong-Ba-Chi-Lep-Ve', 'summary' => 'Phim hài Tối cường hỷ sự được quảng bá rầm rộ của Trương Bá Chi, Lưu Gia Linh, Cổ Thiên Lạc chỉ về thứ hai trên bảng xếp hạng phim Tết, xếp sau I Love Hong Hong, tác phẩm có hơn 100 diễn viên góp mặt.', 'content' => $NoiDung, 'image' => 'Toi_cuong_hy_su.jpg', 'featured_news' => 1],
        ]);
    }
}
