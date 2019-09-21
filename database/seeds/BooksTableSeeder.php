<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
	            'name' => "Vasu Kuncham",
	            'price' => '10',
	            'description'=> 'this is sample desc',
	            'author' => 'Vasu',
	            'image' => 'https://www.mytectra.com/media/catalog/product/cache/1/thumbnail/120x120/9df78eab33525d08d6e5fb8d27136e95/m/y/mytectra-award-2018_41.jpg',
	            'created_at'=> date('Y-m-d H:i:s'),
	            'updated_at'=> date('Y-m-d H:i:s')
        ]);
    }
}
