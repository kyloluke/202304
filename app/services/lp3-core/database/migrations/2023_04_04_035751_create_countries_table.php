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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->comment('国名');
            $table->foreignId('region_id')->constrained('regions');
            $table->bigInteger('updated_by')->unsigned()->nullable()->comment('更新者、外部キー');
            $table->bigInteger('deleted_by')->unsigned()->nullable()->comment('削除者、外部キー');
            $table->bigInteger('created_by')->unsigned()->nullable()->comment('作成者、外部キー');
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
        Schema::dropIfExists('countries');
    }
};
