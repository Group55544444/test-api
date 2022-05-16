<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListenedClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listened_classes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('school_class_id');
            $table->bigInteger('lecture_id');
            $table->unique(['school_class_id', 'lecture_id']);
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
        Schema::dropIfExists('listened_classes');
    }
}
