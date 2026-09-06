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
    Schema::create('chat_messages', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // ID siswa yang ngetik
        $table->string('submateri'); // Buat nandain ini chat di materi 1, 2, atau 3
        $table->text('message'); // Isi pesannya
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};
