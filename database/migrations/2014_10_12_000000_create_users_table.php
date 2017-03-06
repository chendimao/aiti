<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name',20)->unique();
            $table->tinyInteger('gender',2);
            $table->string('email',40)->unique();
            $table->string('password',100);
            $table->string('avatar')->commit('头像');
            $table->integer('confirmation_token')->default(0)->commit('验证token');
            $table->integer('is_active')->default(0)->commit('时候激活邮箱');
            $table->integer('question_count')->default(0)->unsigned()->commit('提问数');
            $table->integer('answers_count')->default(0)->unsigned()->commit('回答数');
            $table->integer('comments_count')->default(0)->unsigned()->commit('评论数');
            $table->integer('favorites_count')->default(0)->unsigned()->commit('收藏数');
            $table->integer('likes_count')->default(0)->unsigned()->commit('点赞数');
            $table->integer('followers_count')->default(0)->unsigned()->commit('关注数');
            $table->integer('following_count')->default(0)->unsigned()->commit('被关注数');
            $table->json('options')->nullabel();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
