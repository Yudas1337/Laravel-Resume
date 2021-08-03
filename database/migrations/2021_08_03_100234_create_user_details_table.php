<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->char('id', 30)->primary();
            $table->string('name');
            $table->string('photo');
            $table->string('linkedin');
            $table->string('gmail');
            $table->string('telegram');
            $table->string('github');
            $table->string('whatsapp');
            $table->string('instagram');
            $table->string('facebook');
            $table->char('user_id', 30);
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
        Schema::dropIfExists('user_details');
    }
}
