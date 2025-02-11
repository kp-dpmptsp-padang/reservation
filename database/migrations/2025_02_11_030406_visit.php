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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('institution');
            $table->string('phone_number');
            $table->string('whatsapp_number');
            $table->string('email');
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('homestay');
            $table->date('day');
            $table->time('clock');
            $table->string('topic');
            $table->integer('group_size');
            $table->string('group_leader');
            $table->text('description')->nullable();
            $table->enum('status', ['menunggu', 'terverifikasi', 'sedang-berlangsung', 'selesai', 'batal'])->default('menunggu');
            $table->foreignId('admin_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('attachment_path')->nullable();
            $table->enum('attachment_type', ['image', 'document', 'other'])->nullable();
            $table->string('attachment_mime_type')->nullable();
            $table->string('success_token', 64)->nullable();
            $table->timestamp('token_expires_at')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};