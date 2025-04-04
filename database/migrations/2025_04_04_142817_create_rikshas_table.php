<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('rikshas', function (Blueprint $table) {
            $table->id('riksha_id');
            $table->foreignId('buyer_id')->constrained('users')->onDelete('cascade');
            $table->date('purchase_date');
            $table->string('district');
            $table->string('division');
            $table->string('police_station');
            $table->boolean('is_approved')->nullable(); // null = pending
            $table->string('qr_code')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rikshas');
    }
};
