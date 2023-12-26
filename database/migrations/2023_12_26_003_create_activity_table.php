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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('officer_id')->constrained();
            $table->foreignId('visitor_id')->nullable()->constrained();
            $table->string('aname');
            $table->enum('atype', ['Leave', 'Appointment', 'Break']);
            $table->enum('astatus', ['Active', 'Cancelled', 'Deactivated']);
            $table->date('adate');
            $table->time('startTime');
            $table->time('endTime');
            $table->timestamp('addedOn');
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
        Schema::dropIfExists('activity');
    }
};
