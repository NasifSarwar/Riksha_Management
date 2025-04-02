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
        Schema::table('users', function (Blueprint $table) {
            // Adding new mandatory columns
            $table->string('phone_number');      // Mandatory field
            $table->string('nid_number');        // Mandatory field
            $table->string('division');          // Mandatory field
            $table->string('district');          // Mandatory field
            $table->text('full_address');        // Mandatory field

            // Adding the role column (if not already added)
            $table->enum('role', ['owner', 'admin', 'puller'])->default('owner');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Dropping the newly added columns
            $table->dropColumn(['phone_number', 'nid_number', 'division', 'district', 'full_address']);
            // Dropping the role column (if it exists)
            $table->dropColumn('role');
        });
    }
};
