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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name_jp')->comment("名称_日本語");
            $table->string('name_en')->comment("名称_英語");
            $table->string('canonical_name')->nullable()->comment("正式名称");
            $table->string('name_abbr')->nullable()->comment("省略名称");
            $table->string('representative_name')->nullable()->comment("代表者名");
            $table->integer('system_usage')->nullable()->length(10)->comment("システム利用形態");
            $table->foreignId('use_logo_file_id')->nullable()->constrained('organization_logo_files')->comment("組織ロゴファイルId");
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
        Schema::dropIfExists('organizations');
    }
};
