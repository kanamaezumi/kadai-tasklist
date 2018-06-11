<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropUserIdToTasklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasklists', function (Blueprint $table) {
        //->dropColumn('user_id'); 
        });
//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasklists', function (Blueprint $table) {
         // $table->dropColumn('user_id');   //
        });
}
}