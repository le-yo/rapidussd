<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class MenuItemsTableSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('menu_items')->truncate();

        DB::table('menu_items')->delete();

        DB::table('menu_items')->insert(array(
            array(
                'menu_id' => 1,
                'description' => 'Enter PIN',
                'next_menu_id' => 2,
                'step' => 0,
                'confirmation_phrase' => '',
            ),
            array(
                'menu_id' => 2,
                'description' => 'Request Loan',
                'next_menu_id' => 3,
                'step' => 0,
                'confirmation_phrase' => '',
            ),
            array(
                'menu_id' => 2,
                'description' => 'Loan Balance',
                'next_menu_id' => 4,
                'step' => 0,
                'confirmation_phrase' => '',
            ),
            array(
                'menu_id' => 2,
                'description' => 'Repay Loan',
                'next_menu_id' => 5,
                'step' => 0,
                'confirmation_phrase' => '',
            ),
            array(
                'menu_id' => 2,
                'description' => 'Extend Loan',
                'next_menu_id' => 6,
                'step' => 0,
                'confirmation_phrase' => '',
            ),
//            array(
//                'menu_id' => 2,
//                'description' => 'Mini Statements',
//                'next_menu_id' => 7,
//                'step' => 0,
//                'confirmation_phrase' => '',
//            ),
            array(
                'menu_id' => 2,
                'description' => 'Terms & Conditions',
                'next_menu_id' => 8,
                'step' => 0,
                'confirmation_phrase' => '',
            ),
            array(
                'menu_id' => 3,
                'description' => 'Enter loan Amount',
                'next_menu_id' => 0,
                'step' => 1,
                'confirmation_phrase' => 'Amount',
            ),
        ));
    }
}
