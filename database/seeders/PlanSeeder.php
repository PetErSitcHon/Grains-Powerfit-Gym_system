<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
        [
            'name' => 'Monthly',
            'slug' => 'Montly Subscription',
            'stripe_plan' => 'price_1OMiTTCBU2gAu9GV15Zz3Vbl',
            'price' => 300,
            'description' => 'Monthly Plan',
        ],
        [
            'name' => '6 Months',
            'slug' => '6 Months Subscription',
            'stripe_plan' => 'price_1OMiX8CBU2gAu9GV5MtGadzv',
            'price' => 1500,
            'description' => '6 Months Plan',
        ],
        [
            'name' => '1 Year',
            'slug' => '1 Year Subscription',
            'stripe_plan' => 'price_1OMiYOCBU2gAu9GVNr1Y7gDr',
            'price' => 3000,
            'description' => '1 Year Plan',
        ],
        ];    

        foreach( $plans as $plan){

            Plan::create($plan);
        }
        

    }
}
