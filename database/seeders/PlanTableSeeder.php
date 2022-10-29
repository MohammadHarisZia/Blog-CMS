<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create(
            [
                'name'          => 'Monthly Plan',
                'slug'          => 'monthly-plan',
                'stripe_name'   => 'monthly',
                'stripe_product_id' => 'prod_Kqbav0hWEyFsNs',
                'stripe_price_id'   => 'price_1KAuNEHhUvP8areWqFIhl0sr',
                'price'         => 2,
                'abbreviation'  => '/month',
            ]
        );

        Plan::create(
            [
                'name'          => 'Yearly Plan',
                'slug'          => 'yearly-plan',
                'stripe_name'   => 'yearly',
                'stripe_product_id' => 'prod_KqbacezSkqQhnT',
                'stripe_price_id'   => 'price_1KAuNaHhUvP8areWbn3lAkYh',
                'price'         => 20,
                'abbreviation'  => '/year',
            ]
        );
    }
}
