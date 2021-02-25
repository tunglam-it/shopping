<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
             ['name'=>'admin','display_name'=>'Administrator'],
             ['name'=>'guest','display_name'=>'Customer'],
             ['name'=>'developer','display_name'=>'Dev'],
             ['name'=>'content','display_name'=>'Editor'],
        ]);
    }
}
