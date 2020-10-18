<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

class CreateAttachementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachements', function (Blueprint $table) {
            $table->id();
            $table->integer('size');
            $table->string('extension');
            $table->string('name');
            $table->string('mime');
            $table->integer('post_id')->nullable();
            $table->integer('respond_id')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE attachements ADD file bytea");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachements');
    }
}
