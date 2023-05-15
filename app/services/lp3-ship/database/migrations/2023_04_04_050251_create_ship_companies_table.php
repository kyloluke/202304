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
        Schema::create('ship_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('scac_code', 50)->nullable()->comment('SCACコード、運送会社識別コード');
            $table->string('mail')->nullable()->comment('メールアドレス');
            $table->text('remarks')->nullable()->comment('備考');
            $table->foreignId('country_id')->constrained('countries')->nullable()->comment('国ID、外部キー');
            $table->string('zip_code', 50)->nullable()->comment('ZIPコード');
            $table->string('state_jp', 50)->nullable()->comment('州・県「日本語」');
            $table->string('state_en', 50)->nullable()->comment('州・県「英語」');
            $table->string('city_jp', 50)->nullable()->comment('都市「日本語」');
            $table->string('city_en', 50)->nullable()->comment('都市「英語」');
            $table->string('address1_jp', 120)->nullable()->comment('住所１「日本語」');
            $table->string('address1_en', 120)->nullable()->comment('住所１「英語」');
            $table->string('address2_jp', 120)->nullable()->comment('住所２「日本語」');
            $table->string('address2_en', 120)->nullable()->comment('住所２「英語」');
            $table->string('address3_jp', 120)->nullable()->comment('住所３「日本語」');
            $table->string('address3_en', 120)->nullable()->comment('住所３「英語」');
            $table->string('timezone', 50)->nullable()->comment('タイムゾーン');
            $table->bigInteger('created_by')->unsigned()->nullable()->comment('作成者、外部キー');
            $table->bigInteger('updated_by')->unsigned()->nullable()->comment('更新者、外部キー');
            $table->bigInteger('deleted_by')->unsigned()->nullable()->comment('削除者、外部キー');
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
        Schema::dropIfExists('ship_companies');
    }
};
