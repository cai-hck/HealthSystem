<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_id');
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('age');
            $table->string('weight');
            $table->string('height');
            $table->string('bmi');
            $table->string('diabetes');
            $table->string('cholesterol');
            $table->string('pressure');
            $table->string('diseases');
            $table->string('others');
            $table->string('textarea_issues');
            $table->string('allergies');
            $table->string('smoking');
            $table->string('alcohol');
            $table->string('status');
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
        Schema::dropIfExists('patients');
    }
}
