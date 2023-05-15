<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('chassis_carry_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chassis_id')->comment('貨物、外部キー')->constrained('chassis');
            $table->boolean('prospect')->nullable()->comment('予定フラグ');
            $table->dateTime('act_at')->nullable()->comment('活動日時');
            $table->string('remarks')->nullable()->comment('備考');
            $table->string('admin_remarks')->nullable()->comment('管理用備考');
            $table->string('grouping_value')->nullable()->comment('グルーピング値');
            $table->foreignId('yard_id')->comment('ヤード、外部キー')->constrained('yards');
            $table->tinyInteger('type')->nullable()->comment('種別');
            $table->dateTime('auth_at')->nullable()->comment('作成日時');
            $table->bigInteger('author_id')->nullable()->comment('作成者、外部キー');
            $table->bigInteger('created_by')->nullable()->comment('登録者');
            $table->bigInteger('updated_by')->nullable()->comment('更新者');
            $table->bigInteger('deleted_by')->nullable()->comment('削除者');
            $table->softDeletes();
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
        Schema::dropIfExists('chassis_carry_activities');
    }
};
