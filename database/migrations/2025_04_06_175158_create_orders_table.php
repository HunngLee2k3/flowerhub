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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('address_id')->nullable()->constrained()->onDelete('set null');
        $table->decimal('total', 8, 2);
        $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('orders');
}
};
