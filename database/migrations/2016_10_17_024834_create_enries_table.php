<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('business_type_id');
            $table->string('signed_by');
            $table->string('visual');
            $table->string('mo');
            $table->string('renew_by');
            $table->integer('ad_format_id');
            $table->integer('state_id');
            $table->integer('town_id');
            $table->integer('site_location_id');
            $table->date('in_charge')->nullable();
            $table->date('out_charge')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('expiry')->nullable();
            $table->float('rental')->nullable();
            $table->float('lighting')->nullable();
            $table->float('production')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('entries');
    }
}
