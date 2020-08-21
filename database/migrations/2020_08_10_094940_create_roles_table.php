<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('roles')) {
            //
            Schema::drop('roles');
        }
        Schema::create('roles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('role_id');
            $table->string('name', 30);  //varchar
            //$table->char('name', 4);
            $table->tinyInteger('status',false,true);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->index('name');  //普通索引
        });
        //执行命令 php artisan migrate --path [目录]
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
