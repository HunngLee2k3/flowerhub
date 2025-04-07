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
    Schema::create('addresses', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('address_line');
        $table->string('city');
        $table->string('postal_code')->nullable();
        $table->string('country');
        $table->string('phone');
        $table->boolean('is_default')->default(false);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('addresses');
}
};
