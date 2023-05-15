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
        Schema::create('yards', function (Blueprint $table) {
            $table->id();
            $table->string('name_jp')->comment("名称_日本語");
            $table->string('name_en')->comment("名称_英語");
            $table->foreignId('country_id')->nullable()->constrained('countries')->comment("国Id");
            $table->string('zipcode')->nullable()->comment("郵便番号");
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
            $table->string('naccs_bonded_area_code')->nullable()->comment("保税地域コード");
            $table->string('mail')->nullable()->comment("メールアドレス");
            $table->string('telephone')->nullable()->comment("電話番号");
            $table->string('person_in_charge_jp')->nullable()->comment("担当者_日本語");
            $table->string('person_in_charge_en')->nullable()->comment("担当者_英語");
            $table->integer('capacity')->nullable()->comment("キャパシティ");
            $table->boolean('cc_when_carry_in_cy')->default(false)->length(10)->comment("CY搬入時通関済みフラグ");
            $table->string('name_web')->nullable()->comment("HP名称");
            $table->string('map_url_web')->nullable()->comment("地図URL");
            $table->string('transport_method_web')->nullable()->comment("輸送手段");
            $table->integer('status')->default(1)->length(10)->comment("ヤードステータス");
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
        Schema::dropIfExists('yards');
    }
};
