<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'password' => bcrypt('admin'),
			'status' => 1,
			'auth_group' => 1,
			'created_at' => date('Y-m-d h:i:s'),
        ]);
    }
}
