<?php

namespace Database\Seeders;

use App\Models\Assignment\Assignment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            $dataArray = [
                'dateline' => Str::random(10),
                'acquistion_officer' => Str::random(11),
                'instruction' => Str::random(100)
            ];

            Assignment::create($dataArray);
        }

    }
}
