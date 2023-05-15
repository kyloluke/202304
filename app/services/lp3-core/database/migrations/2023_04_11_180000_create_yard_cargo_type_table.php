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
        Schema::create('yard_cargo_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('yard_id')->constrained('yards')->comment("ヤードId");
            $table->foreignId('cargo_type_id')->constrained('cargo_types')->comment("取扱貨物種類Id");
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
        Schema::dropIfExists('yard_cargo_type');
    }
};
