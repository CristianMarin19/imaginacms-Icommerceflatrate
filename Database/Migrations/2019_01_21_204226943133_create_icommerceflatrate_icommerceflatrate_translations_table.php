<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcommerceflatrateIcommerceFlatrateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icommerceflatrate__icommerceflatrate_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('icommerceflatrate_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['icommerceflatrate_id', 'locale']);
            $table->foreign('icommerceflatrate_id')->references('id')->on('icommerceflatrate__icommerceflatrates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('icommerceflatrate__icommerceflatrate_translations', function (Blueprint $table) {
            $table->dropForeign(['icommerceflatrate_id']);
        });
        Schema::dropIfExists('icommerceflatrate__icommerceflatrate_translations');
    }
}
