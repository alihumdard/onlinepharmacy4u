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

        Schema::table('p_med_general_questions', function (Blueprint $table) {
            $table->string('anwser_set');
            $table->string('type')->default('non_dependent');
            $table->text('yes_lable')->nullable();
            $table->text('no_lable')->nullable();
            $table->text('optA')->nullable();
            $table->text('optB')->nullable();
            $table->text('optC')->nullable();
            $table->text('optD')->nullable();
            // $table->integer('order')->nullable()->change();
            $table->string('is_dependent')->default('no');
            $table->string('is_assigned')->default('no');
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_med_general_questions', function (Blueprint $table) {
            //
        });
    }
};
