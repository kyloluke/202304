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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment("名称");
            $table->string('name_en')->nullable()->comment("名称_英語");
            $table->tinyInteger('location_type')->comment('種別、例：港/仕向地');
            $table->tinyInteger('type')->nullable()->comment("港種別、例：積港/揚港");
            $table->foreignId('country_id')->nullable()->comment("国Id")->constrained('countries');
            $table->string('zip_code')->nullable()->comment("郵便番号");
            $table->string('state_jp')->nullable()->comment("州_日本語");
            $table->string('state_en')->nullable()->comment("州_英語");
            $table->string('city_jp')->nullable()->comment("市_日本語");
            $table->string('city_en')->nullable()->comment("市_英語");
            $table->string('address1_jp')->nullable()->comment("住所1_日本語");
            $table->string('address2_jp')->nullable()->comment("住所2_日本語");
            $table->string('address3_jp')->nullable()->comment("住所3_日本語");
            $table->string('address1_en')->nullable()->comment("住所1_英語");
            $table->string('address2_en')->nullable()->comment("住所2_英語");
            $table->string('address3_en')->nullable()->comment("住所3_英語");
            $table->string('timezone')->nullable()->comment("タイムゾーン");
            $table->string('naccs_code')->nullable()->comment("NACCSコード");
            $table->string('unlo_code')->nullable()->comment("UN/LOコード");
            $table->boolean('require_local_agent')->default(false)->comment("現地代理店必須フラグ");
            $table->bigInteger('created_by')->nullable()->comment("登録者");
            $table->bigInteger('updated_by')->nullable()->comment("更新者");
            $table->bigInteger('deleted_by')->nullable()->comment("削除者");
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
        Schema::dropIfExists('locations');
    }
};
