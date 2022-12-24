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
        Schema::create('santas', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Santa Title');
            $table->text('description');
            $table->string('image')->default('');
            $table->string('address')->default('');
            $table->boolean('isPrivate')->default(false);
            $table->string('cost')->default('');
            $table->string('creationDate')->default('');
            $table->timestamp('draw_starts_at')->nullable();
            $table->timestamp('draw_expires_at')->nullable();
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
        Schema::dropIfExists('santas');
    }
};
