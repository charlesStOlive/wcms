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
            $table->string('intro')->nullable();
            $table->string('catchline')->nullable();
            $table->string('state')->default('draft');
            $table->text('description')->nullable();
            $table->text('description_html')->nullable();
            $table->text('content')->nullable();
            $table->text('kpi')->nullable();
            $table->string('icone')->nullable();

            $table->integer('sort_order')->default(0);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('waka_wcms_needs');
    }
}
