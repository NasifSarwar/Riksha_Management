<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('rikshas', function (Blueprint $table) {
            $table->unsignedBigInteger('puller_id')->nullable()->after('buyer_id');
    
            // If users table has foreign key constraints
            $table->foreign('puller_id')->references('id')->on('users')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('rikshas', function (Blueprint $table) {
            $table->dropForeign(['puller_id']);
            $table->dropColumn('puller_id');
        });
    }
};
