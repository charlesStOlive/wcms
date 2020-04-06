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
            $table->text('description_html')->nullable();
            $table->string('state')->default('draft');
            $table->text('content')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('waka_wcms_solutions');
    }
}
