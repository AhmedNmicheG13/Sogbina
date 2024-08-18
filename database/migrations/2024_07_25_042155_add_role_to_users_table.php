<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // إضافة حقل role إلى جدول users
            $table->string('role')->default('user'); // يمكنك استخدام ENUM أيضًا إذا كان ذلك مناسبًا
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
            // إزالة حقل role عند التراجع عن الهجرة
            $table->dropColumn('role');
        });
    }
}
