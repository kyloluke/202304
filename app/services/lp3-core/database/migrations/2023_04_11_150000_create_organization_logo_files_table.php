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
        Schema::create('organization_logo_files', function (Blueprint $table) {
            $table->id();
            $table->string('logo_file_uri')->comment("ロゴファイル_Uri");
            $table->string('logo_file_name')->nullable()->comment("ロゴファイル_名称");
            $table->string('logo_file_mime')->nullable()->comment("ロゴファイル_MIMEタイプ");
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
        Schema::dropIfExists('organization_logo_files');
    }
};
