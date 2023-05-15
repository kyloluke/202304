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
        Schema::create('ship_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ship_id')->comment('本船 外部キー')->constrained('ships');
            $table->foreignId('ship_company_id')->comment('船会社 外部キー')->constrained('ship_companies');
            $table->string('voyage_number')->nullable()->comment('航海番号');
            $table->text('remarks')->nullable()->comment('備考');
            $table->string('refer_url')->nullable()->comment('参照URL');
            $table->tinyInteger('type')->nullable()->comment('本船スケジュールタイプ');
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
        Schema::dropIfExists('ship_schedules');
    }
};
