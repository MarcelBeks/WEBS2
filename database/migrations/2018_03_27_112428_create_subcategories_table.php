<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });

        //Componenten
        DB::table('subcategories')->insert(
            array(
                'name'=> 'Processor',
                'category_id'=> 1               
            )
        );

        DB::table('subcategories')->insert(
            array(
                'name'=> 'Moederbord',
                'category_id'=> 1               
            )
        );

        //Randapparatuur
        DB::table('subcategories')->insert(
            array(
                'name'=> 'Monitor',
                'category_id'=> 2               
            )
        );

        DB::table('subcategories')->insert(
            array(
                'name'=> 'Audio',
                'category_id'=> 2               
            )
        );

        DB::table('subcategories')->insert(
            array(
                'name'=> 'Muis & Toetsenbord',
                'category_id'=> 2               
            )
        );

        //Laptop & PC
        DB::table('subcategories')->insert(
            array(
                'name'=> 'Laptop',
                'category_id'=> 3               
            )
        );

        DB::table('subcategories')->insert(
            array(
                'name'=> 'Desktop',
                'category_id'=> 3               
            )
        );

        //Gaming
        DB::table('subcategories')->insert(
            array(
                'name'=> 'Muis & Toetsenbord',
                'category_id'=> 4               
            )
        );

        DB::table('subcategories')->insert(
            array(
                'name'=> 'Stuur',
                'category_id'=> 4               
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
        Schema::dropIfExists('subcategories');
    }
}
