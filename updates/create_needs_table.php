<?php namespace Waka\Wcms\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateNeedsTable extends Migration
{
    public function up()
    {
        Schema::create('waka_wcms_needs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('intro')->nullable();
            $table->text('description')->nullable();
            $table->string('state')->nullable();
            $table->text('content')->nullable();
            //reorder
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('waka_wcms_needs');
    }
}
