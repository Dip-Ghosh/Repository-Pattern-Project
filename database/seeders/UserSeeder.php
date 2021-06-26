<?php

namespace Database\Seeders;

use App\Models\User;
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
        $dataArray = [
            'name' => 'admin',
            'email' =>'admin@shuttlebd.com',
            'password' => bcrypt('secret'),
        ];
        User::create($dataArray);

    }
}
