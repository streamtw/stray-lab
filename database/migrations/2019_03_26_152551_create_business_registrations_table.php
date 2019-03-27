<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tax_number'); // 統一編號
            $table->string('name'); // 商業名稱
            $table->string('address'); // 商業地址
            $table->string('status'); // 登記狀態
            $table->string('dataset')->nullable(); // 資料集名稱
            $table->boolean('is_imported')->default(false); // 是否已被匯入
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
        Schema::dropIfExists('business_registrations');
    }
}
