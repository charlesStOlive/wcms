<?php namespace Waka\Wcms\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateSolutionsTable extends Migration
{
    public function up()
    {
        Schema::create('waka_wcms_solutions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('state')->nullable();
            $table->text('content')->nullable();
            //nested
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('nest_left')->unsigned()->nullable();
            $table->integer('nest_right')->unsigned()->nullable();
            $table->integer('nest_depth')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('waka_wcms_solutions');
    }
}