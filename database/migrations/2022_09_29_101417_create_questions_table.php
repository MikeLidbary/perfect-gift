<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
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
            $table->longText('template');
            $table->timestamps();
        });

        $template = "(a) What is your relationship with the person?
                    (b) What is your budget?
                    (c) What's the occasion?
                    (d) What's their favourite colour?
                    (e) What's her favourite hobby and why?
                    (f) If they were an animal, what would they be?
                    (g) How do you like to be comforted when sad?
                    (h) What would their perfect day look like?
                    (i) What makes them laugh most?
                    (j) What do they do when no one else is around?";

        DB::table('questions')->insert(
            ['template' => $template]
        );

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
}
