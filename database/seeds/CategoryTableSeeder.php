<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'id' => '1',
            'pid' => 0,
			'name'=>'测试栏目',
			'created_at' => date('Y-m-d h:i:s'),
			'type'=>1,
			'sort'=>0,
        ]);
    }
}
