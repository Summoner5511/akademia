<?php namespace Krupka\TrapManager\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateManagersTable extends Migration
{
    public function up()
    {
        Schema::create('krupka_trapmanager_managers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('type');
            $table->string('percentage');
            $table->string('count');
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('krupka_trapmanager_managers');
    }
}
