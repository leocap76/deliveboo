<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('plate_name');
            $table->text('plate_description');
            $table->text('plate_ingredients');
            $table->float('plate_price', 5, 2);
            $table->boolean('plate_vegan')->default(false);
            $table->boolean('plate_vegetarian')->default(false);
            $table->boolean('plate_spicy')->default(false);
            $table->boolean('plate_glutenfree')->default(false);
            $table->boolean('plate_available')->default(true);
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plates');
    }
}
