<?php

use Illuminate\Database\Seeder;

class SiteConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('siteconfig')->insert([
            'id' => 1,
            'website_title' => 'laravel5 后台管理系统',
        ]);
    }
}
