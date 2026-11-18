<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Detail produk berubah dari pasangan key-value (JSON) menjadi konten rich text (HTML).
        Schema::table('products', function (Blueprint $table) {
            $table->longText('detail_produk')->nullable()->change();
        });

        // Konversi data lama: {"Spesifikasi": "Nilai"} -> "<p><strong>Spesifikasi:</strong> Nilai</p>"
        foreach (DB::table('products')->whereNotNull('detail_produk')->get() as $product) {
            $decoded = json_decode((string) $product->detail_produk, true);

            if (is_array($decoded)) {
                $html = collect($decoded)
                    ->map(fn ($value, $key) => '<p><strong>'.e($key).':</strong> '.e($value).'</p>')
                    ->implode('');
            } elseif (is_string($decoded)) {
                $html = $decoded;
            } else {
                continue;
            }

            DB::table('products')
                ->where('id', $product->id)
                ->update(['detail_produk' => $html]);
        }
    }

    public function down(): void
    {
        // Bungkus kembali konten HTML sebagai string JSON agar valid saat kolom diubah ke json.
        foreach (DB::table('products')->whereNotNull('detail_produk')->get() as $product) {
            DB::table('products')
                ->where('id', $product->id)
                ->update(['detail_produk' => json_encode((string) $product->detail_produk)]);
        }

        Schema::table('products', function (Blueprint $table) {
            $table->json('detail_produk')->nullable()->change();
        });
    }
};
