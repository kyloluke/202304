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
        Schema::create('yard_group_office_business_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('yard_group_id')->constrained('yard_groups')->comment("ヤードグルーぷId");
            $table->foreignId('office_business_types_id')->constrained('office_business_types')->comment("事業所と業態の関連Id");
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
        Schema::dropIfExists('yard_group_office_business_type');
    }
};
