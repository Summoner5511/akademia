<?php namespace Pyrex\Prichod\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePrichodsTable extends Migration
{
    public function up()
    {
        Schema::create('pyrex_prichod_prichods', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pyrex_prichod_prichods');
    }
}
