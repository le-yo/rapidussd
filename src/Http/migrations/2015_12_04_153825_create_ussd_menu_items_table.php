<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUssdMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ussd_menu_items', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');
            $table->string('description');
            $table->integer('type')->default(0);
            $table->integer('next_menu_id')->default(NULL);
            $table->integer('step');
            $table->string('confirmation_phrase');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ussd_menu_items');
    }
}
