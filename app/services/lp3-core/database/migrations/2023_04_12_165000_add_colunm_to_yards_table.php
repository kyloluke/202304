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
        Schema::table('yards', function (Blueprint $table) {
            $table->bigInteger('yard_group_id')->after('status')->comment("ヤードグループId");
            $table->foreign('yard_group_id')->references('id')->on('yard_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('yards', function (Blueprint $table) {
            $table->dropColumn('yard_group_id');
        });
    }
};
