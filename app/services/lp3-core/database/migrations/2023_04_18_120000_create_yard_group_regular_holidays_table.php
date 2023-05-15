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
        Schema::create('yard_group_regular_holidays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('yard_group_id')->constrained('yard_groups')->comment("ヤードグルーぷId");
            $table->dateTime('start_date')->comment("有効期限開始日");
            $table->dateTime('end_date')->nullable()->comment("有効期限終了日");
            $table->boolean('monday_flg')->default(false)->comment("月曜日フラグ");
            $table->boolean('tuesday_flg')->default(false)->comment("火曜日フラグ");
            $table->boolean('wednesday_flg')->default(false)->comment("水曜日フラグ");
            $table->boolean('thursday_flg')->default(false)->comment("木曜日フラグ");
            $table->boolean('friday_flg')->default(false)->comment("金曜日フラグ");
            $table->boolean('saturday_flg')->default(false)->comment("土曜日フラグ");
            $table->boolean('sunday_flg')->default(false)->comment("日曜日フラグ");
            $table->boolean('national_holidays_flg')->default(false)->comment("祝日フラグ");
            $table->integer('created_by')->nullable()->comment("登録者");
            $table->integer('updated_by')->nullable()->comment("更新者");
            $table->integer('deleted_by')->nullable()->comment("削除者");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yard_group_regular_holidays');
    }
};
