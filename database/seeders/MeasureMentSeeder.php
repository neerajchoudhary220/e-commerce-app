<?php

namespace Database\Seeders;

use App\Models\Measurement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasureMentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $measures =[
            [
                'name'=>'xl',
            ],
            [
                'name'=>'xxl',
            ],
            [
                'name'=>'x',
            ],
            [
                'name'=>'gm',
            ],
            [
                'name'=>'kg',
            ],
            [
                'name'=>'ltr',
            ]
            ];

            foreach($measures as $measure){
                Measurement::updateOrCreate($measure);
            }
            
    }

    
}
