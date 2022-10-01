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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('profile_image')->nulllable();
            $table->enum('following',['FOLLOWING','UNFOLLOW'])->nulllable();
            $table->string('follow_status')->nullable();
            $table->string('post')->nulllable();
            $table->string('comment')->nullable();
            $table->enum('like',['LIKE','UNLIKE']);
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
        Schema:: dropIfExists('user_profiles');
    }
};
