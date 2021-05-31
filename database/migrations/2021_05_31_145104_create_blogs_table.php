<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_Name',255);
            $table->text('blog_Description');
            $table->date('start_Date');
            $table->date('end_Date');
            $table->boolean('is_Active')->default(1);
            $table->string('image',60)->nullable();
            $table->unsignedBigInteger('created_By');
            $table->timestamps();
            $table->foreign('created_By')->references('id')->on('users')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
