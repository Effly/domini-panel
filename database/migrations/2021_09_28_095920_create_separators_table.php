<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeparatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('separators', function (Blueprint $table) {
            $table->id();
            $table->text('html_text')->nullable();
            $table->string('path_inst_img')->nullable();
            $table->string('path_facebook_img')->nullable();
//            $table->string('path_inst')->nullable();
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
        Schema::dropIfExists('separators');
    }
}
