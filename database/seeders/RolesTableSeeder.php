<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = ['Purchasing Manager','District Manager','Supplier'];
        foreach($groups as $group){
        	$data[] = [
        		'name' =>	$group
        	];
        }
        \DB::table('roles')->insert($data);
    }
}
