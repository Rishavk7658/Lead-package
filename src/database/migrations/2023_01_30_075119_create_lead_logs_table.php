<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_logs', function (Blueprint $table) {
            $table->id();
            $table->string('lead_id');
            $table->string('user_id')->nullable();
            $table->string('description');
            $table->string('next_follow_up_date')->nullable();
            $table->Integer('status')->comment('1 = Converted , 2 = Next follow up  , 3 = Close');
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('lead_logs');
    }
}
