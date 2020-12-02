<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('categories')->insert(
            array(
                'name'=> 'Componenten'               
            )
        );
        
        DB::table('categories')->insert(
            array(
                'name'=> 'Randapparatuur'               
            )
        );
        
        DB::table('categories')->insert(
            array(
                'name'=> 'Laptop & PC'               
            )
        );

        DB::table('categories')->insert(
            array(
                'name'=> 'Gaming'               
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
