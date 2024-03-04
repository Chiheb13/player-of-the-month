<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPlayerCompititionVoterTable extends Migration
{
    public function up()
    {
        Schema::table('player_compitition_voter', function (Blueprint $table) {
            $table->integer('note')->default(0)->change();
        });
    }

    public function down()
    {
        // If you need to rollback, you can add the necessary code here
    }
}

