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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('name_jp')->comment("名称_日本語");
            $table->string('name_en')->comment("名称_英語");
            $table->text('remarks')->nullable()->comment("備考");
            $table->integer('status')->default(1)->length(10)->comment("ステータス");
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
            $table->foreignId('organization_id')->nullable()->constrained('organizations')->comment('所属先組織Id');
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
        Schema::dropIfExists('offices');
    }
};
