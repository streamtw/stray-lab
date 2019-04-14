<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('animal_id')->nullable();
            $table->string('animal_subid')->nullable();
            $table->string('animal_area_pkid')->nullable();
            $table->string('animal_shelter_pkid')->nullable();
            $table->string('animal_place')->nullable();
            $table->string('animal_kind')->nullable();
            $table->string('animal_sex')->nullable();
            $table->string('animal_bodytype')->nullable();
            $table->string('animal_colour')->nullable();
            $table->string('animal_age')->nullable();
            $table->string('animal_sterilization')->nullable();
            $table->string('animal_bacterin')->nullable();
            $table->string('animal_foundplace')->nullable();
            $table->string('animal_title')->nullable();
            $table->string('animal_status')->nullable();
            $table->text('animal_remark')->nullable();
            $table->text('animal_caption')->nullable();
            $table->string('animal_opendate')->nullable();
            $table->string('animal_closeddate')->nullable();
            $table->string('animal_update')->nullable();
            $table->string('animal_createtime')->nullable();
            $table->string('shelter_name')->nullable();
            $table->string('album_file')->nullable();
            $table->string('album_update')->nullable();
            $table->string('cDate')->nullable();
            $table->string('shelter_address')->nullable();
            $table->string('shelter_tel')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::dropIfExists('adoptions');
    }
}
