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
     */
    public function up()
    {
        Schema::create('dispatch_requests', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('location_id')->constrained();
            $table->foreignId('ability_id')->constrained();
            $table->foreignId('size_category_id')->constrained();
            $table->foreignId('car_id')->nullable();
            $table->text('item')->nullable();
            $table->text('method');
            $table->foreignId('user_id')->constrained();
            $table->string('image_path')->nullable();
            $table->text('description')->nullable();
            $table->boolean('approval_status')->nullable();
            $table->foreignId('driver_id')->nullable();
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
        Schema::dropIfExists('dispatch_requests');
    }
};
