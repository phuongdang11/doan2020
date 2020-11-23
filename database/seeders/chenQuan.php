<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class chenQuan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Quan')->insert([
            ['Ten_Quan' => 'Quận 1','AnHien'=>1],
            ['Ten_Quan' => 'Quận 12','AnHien'=>1],
            ['Ten_Quan' => 'Quận Thủ Đức','AnHien'=>1],
            ['Ten_Quan' => 'Quận 9','AnHien'=>1],
            ['Ten_Quan' => 'Quận Gò Vấp','AnHien'=>1],
            ['Ten_Quan' => 'Quận Bình Thạnh','AnHien'=>1],
            ['Ten_Quan' => 'Quận Tân Bình','AnHien'=>1],
            ['Ten_Quan' => 'Quận Tân Phú','AnHien'=>1],
            ['Ten_Quan' => 'Quận Phú Nhuận','AnHien'=>1],
            ['Ten_Quan' => 'Quận 2','AnHien'=>1],
            ['Ten_Quan' => 'Quận 3','AnHien'=>1],
            ['Ten_Quan' => 'Quận 10','AnHien'=>1],
            ['Ten_Quan' => 'Quận 11','AnHien'=>1],
            ['Ten_Quan' => 'Quận 4','AnHien'=>1],
            ['Ten_Quan' => 'Quận 5','AnHien'=>1],
            ['Ten_Quan' => 'Quận 6','AnHien'=>1],
            ['Ten_Quan' => 'Quận 8','AnHien'=>1],
            ['Ten_Quan' => 'Quận Bình Tân','AnHien'=>1],
            ['Ten_Quan' => 'Quận 7','AnHien'=>1],
            ['Ten_Quan' => 'Huyện Củ Chi','AnHien'=>1],
            ['Ten_Quan' => 'Huyện Hóc Môn','AnHien'=>1],
            ['Ten_Quan' => 'Huyện Nhà Bè','AnHien'=>1],
            ['Ten_Quan' => 'Huyện Cần Giờ','AnHien'=>1],
        ]);
    }
}
