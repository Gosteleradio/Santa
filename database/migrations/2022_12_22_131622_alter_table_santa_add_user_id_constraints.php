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
        Schema::table('santas', function (Blueprint $table) {

                $table->unsignedBigInteger('creator_id')->default('1');
                $table->foreign('creator_id')->references('id')->on('users')->cascadeOnDelete();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
                $table->dropForeign(['creator_id']);
                $table->dropColumn(['creator_id']);
            });

    }

};

