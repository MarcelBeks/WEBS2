<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavbarItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navbar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('link')->default('#');
            $table->timestamps();
        });

         //testdata
         DB::table('navbar')->insert(
            array(
                'label'=> 'Home',
                'link'=> '/'
            )
        );
        
        DB::table('navbar')->insert(
            array(
                'label'=> 'About',
                'link'=> 'about'
            )
        );

        DB::table('navbar')->insert(
            array(
                'label'=> 'Componenten',
                'link'=> 'category/componenten'
            )
        );

        DB::table('navbar')->insert(
            array(
                'label'=> 'Randapparatuur',
                'link'=> 'category/randapparatuur',
            )
        );

        DB::table('navbar')->insert(
            array(
                'label'=> 'Laptop & PC',
                'link'=> 'category/Laptop & PC',
            )
        );

        DB::table('navbar')->insert(
            array(
                'label'=> 'Gaming',
                'link'=> 'category/gaming',
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
        Schema::dropIfExists('navbar');
    }
}
