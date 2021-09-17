<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('description');
           // $table->foreignId('subcategory_id')->constrained('sub_categories', 'id');

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
        Schema::dropIfExists('categories');


        // Schema::disableForeignKeyConstraints();
        // Schema::table('categories', function(Blueprint $table){
        //     $table->dropForeign(['animal_type_id']);
        // });

        // Schema::dropIfExists('categories');
        // Schema::enableForeignKeyConstraints();
    }
}
