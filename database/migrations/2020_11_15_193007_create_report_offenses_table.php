<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportOffensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_offenses', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_no');
            $table->string('driver_license');
            $table->string('name');
            $table->string('address');
            $table->string('gender');
            $table->string('officer_reporting');
            $table->bigInteger('offense_id')->unsigned();
            $table->timestamps();

            $table->foreign('offense_id')
                ->references('id')
                ->on('offenses')
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
        Schema::dropIfExists('report_offenses');
    }
}
