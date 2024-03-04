<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('player_compitition_voter', function (Blueprint $table) {
            $table->bigInteger('player_id')->unsigned();
            $table->bigInteger('compitition_id')->unsigned();
            $table->bigInteger('voter_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('players')->uponUpdate('cascade')->onDelete('cascade');
            $table->foreign('compitition_id')->references('id')->on('compititions')->uponUpdate('cascade')->onDelete('cascade');
            $table->foreign('voter_id')->references('id')->on('voters')->uponUpdate('cascade')->onDelete('cascade');
            $table->primary(['player_id','compitition_id','voter_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
