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
        Schema::table('users', function (Blueprint $table){
            $table->string('id_in_soc', 20)->default(false)
            ->default('')
                ->comment('id in socialnet');
            $table->enum('type_auth',['site','vkontakte', 'github', 'ok'])
                ->default('vkontakte')
                ->comment('Type authorization');
            $table->string('avatar', 250)
                ->default('')
                ->comment('link to avatar');
            $table->index('id_in_soc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['id_in_soc', 'type_auth', 'avatar']); });

    }
};
