<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigureUsersTbl extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("username")->unique();
            $table->string("roles");
            $table->string("avatar");
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("username");
            $table->dropColumn("roles");
            $table->dropColumn("avatar");
        });
    }
}
