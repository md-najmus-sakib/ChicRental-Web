<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_pic')->nullable()->after('email');
            $table->string('phone')->nullable()->after('profile_pic');
            $table->string('address')->nullable()->after('phone');
            $table->float('rating')->default(0)->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['profile_pic', 'phone', 'address', 'rating']);
        });
    }
}