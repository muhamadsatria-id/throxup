<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('business_email');
            $table->string('phone_number')->nullable();
            $table->string('subject')->nullable();
            $table->text('project_specifications');
            $table->string('status')->default('pending'); // pending, reviewed, replied, closed
            $table->text('admin_notes')->nullable(); // catatan internal sales/admin
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};