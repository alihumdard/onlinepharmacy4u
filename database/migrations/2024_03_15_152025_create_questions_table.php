<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('title')->unique();
            $table->string('anwser_set');
            $table->text('openbox')->nullable();
            $table->text('yes_lable')->nullable();
            $table->text('no_lable')->nullable();
            $table->text('optA')->nullable();
            $table->text('optB')->nullable();
            $table->text('optC')->nullable();
            $table->text('optD')->nullable();
            $table->string('status')->default('Active');
            $table->unsignedBigInteger('created_by')->nullable();
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
        Schema::dropIfExists('questions');
    }
};
