<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("parent_id")->nullable();
            $table->integer("user_id");
            $table->string("title", 255);
            $table->integer("points")->default(0);
            $table->boolean("is_done")->default(0);
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
        Schema::dropIfExists('tasks');
    }
}
