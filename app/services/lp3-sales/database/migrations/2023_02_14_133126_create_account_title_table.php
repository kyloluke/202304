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
        Schema::create('account_titles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名称');
            $table->string('name_en')->comment('英語名称');
            $table->string('code')->comment('コード');
            $table->boolean('available')->default(false)->comment('利用可能フラグ');
            $table->integer('ordinary')->default(0)->comment('順番');
            $table->integer('created_by')->nullable()->comment('登録者');
            $table->integer('updated_by')->nullable()->comment('更新者');
            $table->integer('deleted_by')->nullable()->comment('削除者');
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_titles');
    }
};
