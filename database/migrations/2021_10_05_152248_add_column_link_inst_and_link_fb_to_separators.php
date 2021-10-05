<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnLinkInstAndLinkFbToSeparators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('separators', function (Blueprint $table) {
            $table->string('inst_link')->nullable()->after('path_inst_img');
            $table->string('facebook_link')->nullable()->after('path_facebook_img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('separators', function (Blueprint $table) {
            $table->dropColumn('inst_link');
            $table->dropColumn('facebook_link');
        });
    }
}
