<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('rikshas', function (Blueprint $table) {
            $table->string('status')->default('inactive')->after('puller_id');
            $table->timestamp('assigned_at')->nullable()->after('status');
        });
    }
    
    public function down()
    {
        Schema::table('rikshas', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('assigned_at');
        });
    }
};
