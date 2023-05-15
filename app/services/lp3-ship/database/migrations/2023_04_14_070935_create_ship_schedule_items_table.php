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
        Schema::create('ship_schedule_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ship_schedule_id')->comment('本船スケジュール 外部キー')->constrained('ship_schedules');
            $table->foreignId('pol_port_id')->nullable()->comment('積港 外部キー')->constrained('locations');
            $table->dateTime('pol_arrival_at')->nullable()->comment('積港入港予定日時');
            $table->dateTime('pol_arrived_at')->nullable()->comment('積港入港日時');
            $table->dateTime('pol_departure_at')->nullable()->comment('積港出港予定日時');
            $table->dateTime('pol_departed_at')->nullable()->comment('積港出港日時');
            $table->foreignId('pod_port_id')->nullable()->comment('揚港 外部キー')->constrained('locations');
            $table->dateTime('pod_arrival_at')->nullable()->comment('揚港到着予定日時');
            $table->dateTime('pod_arrived_at')->nullable()->comment('揚港到着日時');
            $table->dateTime('document_cut_at')->nullable()->comment('ドキュメントカット日時');
            $table->boolean('document_am_cut')->default(false)->nullable()->comment('ドキュメントAMカットフラグ');
            $table->dateTime('cy_open_at')->nullable()->comment('コンテナヤードオープン日時');
            $table->dateTime('cy_cut_at')->nullable()->comment('コンテナヤードカット日時');
            $table->boolean('cy_am_cut')->default(false)->comment('コンテナヤードAMカットフラグ');
            $table->boolean('irregular_cy_cut')->default(false)->comment('例外コンテナヤードカット日時フラグ');
            $table->text('remarks')->nullable()->comment('備考');
            $table->boolean('available')->default(true)->comment('利用可能フラグ');
            $table->foreignId('fd_id')->nullable()->comment('仕向地 外部キー')->constrained('locations');
            $table->dateTime('fd_arrival_at')->nullable()->comment('仕向け地到着予定日時');
            $table->dateTime('fd_arrived_at')->nullable()->comment('仕向け地到着日時');
            $table->dateTime('go_down_at')->nullable()->comment('ゴーダウン予定日時');
            $table->string('go_down_zip_code', 50)->nullable()->comment('ゴーダウン場所の郵便番号');
            $table->string('go_down_address')->nullable()->comment('ゴーダウン場所の住所');
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
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
        Schema::dropIfExists('ship_schedule_items');
    }
};
