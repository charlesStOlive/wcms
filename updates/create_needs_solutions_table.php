<?php namespace Waka\Wcms\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateNeedsSolutionsTable extends Migration
{
    public function up()
    {
        Schema::create('waka_wcms_needs_solutions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('need_id')->unsigned();
            $table->integer('solution_id')->unsigned();
            $table->primary(['need_id', 'solution_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('waka_wcms_needs_solutions');
    }
}
