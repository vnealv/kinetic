<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditRenewByFieldInEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->string('renew_by')->nullable()->change();
            $table->string('signed_by')->nullable()->change();
            $table->string('visual')->nullable()->change();
            $table->string('mo')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->string('renew_by')->nullable(false)->change();
            $table->string('signed_by')->nullable(false)->change();
            $table->string('visual')->nullable(false)->change();
            $table->string('mo')->nullable(false)->change();
        });
    }
}
