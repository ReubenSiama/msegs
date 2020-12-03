<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = ['Aizawl','Kolasib','Lawngtlai', 'Lunglei', 'Mamit', 'Saiha', 'Serchhip', 'Champhai', 'Hnahthial', 'Khawzawl', 'Saitual'];
        foreach($groups as $group){
        	$data[] = [
        		'name' =>	$group
        	];
        }
        \DB::table('districts')->insert($data);
    }
}
