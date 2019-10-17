<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('url')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('school');
            $table->string('address');
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
            $table
                ->foreign('user_id')
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
        Schema::dropIfExists('events');
    }
}
