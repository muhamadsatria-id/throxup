<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('ga4_code')->nullable();
            $table->text('gtm_head_code')->nullable();
            $table->text('gtm_body_code')->nullable();
            $table->text('gsc_verification')->nullable();
            $table->longText('custom_head_scripts')->nullable();
            $table->longText('custom_body_scripts')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};