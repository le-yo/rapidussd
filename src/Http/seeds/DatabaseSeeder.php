<?php

use Illuminate\Database\Seeder;

class RapidussdDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Eloquent::unguard();

        $this->call('MenuItemsTableSeeder');
        $this->call('MenusTableSeeder');
    }
}
