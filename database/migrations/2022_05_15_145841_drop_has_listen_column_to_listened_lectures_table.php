<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropHasListenColumnToListenedLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listened_lectures', function (Blueprint $table) {
            $table->dropColumn('has_listen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listened_lectures', function (Blueprint $table) {
            $table->boolean('has_listen')->default(true);
        });
    }
}
