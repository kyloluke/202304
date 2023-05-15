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
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('organization_id')->after('remember_token')->nullable()->comment("所属先組織Id");
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->bigInteger('office_id')->after('organization_id')->nullable()->comment("所属先事業所Id");
            $table->foreign('office_id')->references('id')->on('offices');
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
            $table->dropColumn('organization_id');
            $table->dropColumn('office_id');
        });
    }
};
