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
        Schema::create('yard_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment("名称");
            $table->foreignId('representative_yard_id')->nullable()->default(null)->constrained("yards")->comment("代表ヤードId");
            // yardの新規登録時、およびyardの削除時に、nullを許可していないと処理ができないため、外部キー制約の上、null許可としている。
            $table->string('reception_time_weekdays_from')->nullable()->comment("平日搬入受付時刻_from");
            $table->string('reception_time_weekdays_to')->nullable()->comment("平日搬入受付時刻_to");
            $table->string('reception_time_saturday_from')->nullable()->comment("土曜日搬入受付時刻_from");
            $table->string('reception_time_saturday_to')->nullable()->comment("土曜日搬入受付時刻_to");
            $table->string('rest_time_from')->nullable()->comment("搬入受付休憩時刻_from");
            $table->string('rest_time_to')->nullable()->comment("搬入受付休憩時刻_to");
            $table->foreignId('default_pol_id')->nullable()->constrained("locations")->comment("デフォルト積港Id");
            $table->foreignId('organization_id')->nullable()->constrained("organizations")->comment("所属先組織Id");
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
        Schema::dropIfExists('yard_groups');
    }
};
