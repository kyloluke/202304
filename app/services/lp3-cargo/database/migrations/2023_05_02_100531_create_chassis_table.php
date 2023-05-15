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
        Schema::create('chassis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cargo_type_id')->comment('貨物の種別、外部キー')->constrained('cargo_types');
            $table->foreignId('car_model_id')->comment('車種、外部キー')->constrained('car_models');
            $table->string('control_number')->nullable()->comment('入庫番号')->unique();
            $table->string('number')->nullable()->comment('車台番号');
            $table->string('search_number')->nullable()->comment('検索用番号');
            $table->float('displacement')->nullable()->comment('排気量');
            $table->float('weight')->nullable()->comment('重量');
            $table->float('extent')->nullable()->comment('車体長');
            $table->float('width')->nullable()->comment('車体幅');
            $table->float('height')->nullable()->comment('車体高さ');
            $table->float('m3')->nullable()->comment('容積');
            $table->boolean('movable')->nullable()->comment('可動フラグ');
            $table->foreignId('shipper_id')->comment('荷主事業所')->constrained('offices');
            $table->string('shipper_ref_no')->nullable()->comment('荷主参照番号');
            $table->foreignId('prime_forwarder_id')->nullable()->comment('元請フォワーダー')->constrained('offices');
            $table->boolean('require_collect_key')->nullable()->comment('鍵回収要望フラグ');
            $table->boolean('require_extra_lashing')->nullable()->comment('強化ラッシング要望フラグ');
            $table->boolean('require_photo_for_sale')->nullable()->comment('販売用写真撮影要望フラグ');
            $table->string('remarks')->nullable()->comment('備考');
            $table->string('inner_cargo_remarks')->nullable()->comment('インナーカーゴ備考');
            $table->string('admin_remarks')->nullable()->comment('管理用備考');
            $table->tinyInteger('expected_job_type')->nullable()->comment('予定ジョブ種別');
            $table->bigInteger('created_by')->nullable()->comment('登録者');
            $table->bigInteger('updated_by')->nullable()->comment('更新者');
            $table->bigInteger('deleted_by')->nullable()->comment('削除者');
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
        Schema::dropIfExists('chassis');
    }
};
