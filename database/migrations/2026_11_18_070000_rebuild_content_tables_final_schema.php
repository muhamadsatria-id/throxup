<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        foreach ([
            'seo_metas',
            'products',
            'news',
            'pages',
            'profiles',
            'platforms',
            'hero_carousels',
            'modal_banners',
            'categories',
        ] as $table) {
            Schema::dropIfExists($table);
        }

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->text('deskripsi');
            $table->json('benefits')->nullable();
            $table->json('detail_produk')->nullable();
            $table->json('images')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->longText('deskripsi');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->longText('konten');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->text('vision');
            $table->json('mission')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp');
            $table->text('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->timestamps();
        });

        Schema::create('platforms', function (Blueprint $table) {
            $table->id();
            $table->string('tiktok')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('shopee')->nullable();
            $table->string('tiktok_shop')->nullable();
            $table->string('tokopedia')->nullable();
            $table->string('lazada')->nullable();
            $table->timestamps();
        });

        Schema::create('hero_carousels', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('image');
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('modal_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image');
            $table->string('link_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('seo_metas', function (Blueprint $table) {
            $table->id();
            $table->morphs('seoable');
            $table->string('title', 70)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('keyword')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('robots')->default('index, follow');
            $table->string('og_image')->nullable();
            $table->json('schema_json')->nullable();
            $table->boolean('is_manual')->default(false);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        foreach ([
            'seo_metas',
            'products',
            'news',
            'pages',
            'profiles',
            'platforms',
            'hero_carousels',
            'modal_banners',
            'categories',
        ] as $table) {
            Schema::dropIfExists($table);

            Schema::create($table, function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        Schema::enableForeignKeyConstraints();
    }
};
