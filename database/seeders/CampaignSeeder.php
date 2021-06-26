<?php

namespace Database\Seeders;


use App\Models\Campaign\Campaign;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CampaignSeeder extends Seeder
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
                'name' => Str::random(15),
                'mobile' => Str::random(11),
                'pick_up_point' => Str::random(20),
                'drop_off_point' => Str::random(20),
                'institute' => Str::random(30),
                'scope' => Str::random(3),
                'remarks' => Str::random(100),
                'date' => date('Y-m-d'),
            ];

            Campaign::create($dataArray);
        }

    }
}
