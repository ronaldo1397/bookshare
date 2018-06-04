<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'thithi',
            'hoten' => 'Thi Thi',
            'email' => '16521155@gm.uit.edu.vn',
            'password' => bcrypt('nghiane')
        ]);
        DB::table('quyen')->insert([
        	[ 'tenquyen' => 'administrator', 'mota' => 'Admin' ],
        	[ 'tenquyen' => 'moderator', 'mota' => 'Quản lý' ] ,
        ]);
        DB::table('phanquyen')->insert([
        	[ 'id_quyen' => 1, 'id_user' => 1 ],
        ]);
        DB::table('theloai')->insert([
            'tenloai'  =>  'Văn Học Ngước Ngoài',
            'mota'      => ''
        ]);
    }
}
