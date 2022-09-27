<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
 '    */
    public function up()
    {
        Schema::create('requests_to_suppliers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('book_id');
            $table->date('request_date');
            $table->integer('delivery_confirmation');
            //$table->integer('corporate_id');
            $table->unsignedInteger('corporate_id');
            $table->foreign('corporate_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests_to_suppliers');
    }
};
