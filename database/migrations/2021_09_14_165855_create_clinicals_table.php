<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_table_id');
            $table->string('chief_complaints');
            $table->string('upload_conset_form');
            $table->string('albumin');
            $table->string('sugar');
            $table->string('acetone');
            $table->string('history_of_present_illness');
            $table->string('past_history');
            $table->string('social_history');
            $table->string('family_history');
            $table->string('drugs_history');
            $table->string('general');
            $table->string('head');
            $table->string('mouth');
            $table->string('neck');
            $table->string('breast');
            $table->string('cardio_vascular_system');
            $table->string('lungs');
            $table->string('lymph_nodes');
            $table->string('abdomen');
            $table->string('genitalia');
            $table->string('cns');
            $table->string('joints');
            $table->string('provisional_diagnosis');
            $table->string('differential_diagnosis');
            $table->string('visit_date');
            $table->string('attending_doctor');
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
        Schema::dropIfExists('clinicals');
    }
}
