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
        $this->call(SiteConfigTableSeeder::class);
		$this->call(MenusTableSeeder::class);
		$this->call(AuthGroupTableSeeder::class);
		$this->call(AdminsTableSeeder::class);
		$this->call(CategoryTableSeeder::class);
    }
}
