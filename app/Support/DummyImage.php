<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Menghasilkan gambar placeholder lokal untuk data dummy.
 *
 * File disimpan di disk "public" sehingga path yang tersimpan di database
 * tetap relatif (mis. products/foo.svg) dan kompatibel dengan asset('storage/...').
 */
final class DummyImage
{
    /** @var array<int, array{0: string, 1: string}> */
    private const PALETTES = [
        ['#1e3093', '#3949ab'],
        ['#0f766e', '#14b8a6'],
        ['#7c2d12', '#ea580c'],
        ['#312e81', '#6366f1'],
        ['#0f172a', '#334155'],
        ['#831843', '#db2777'],
        ['#713f12', '#ca8a04'],
        ['#164e63', '#0891b2'],
    ];

    public static function make(
        string $directory,
        string $key,
        string $label,
        int $width = 1200,
        int $height = 675,
    ): string {
        $directory = trim(str_replace('\\', '/', $directory), '/');
        $filename = Str::slug($label).'-'.substr(sha1($directory.'|'.$key), 0, 8).'.svg';
        $path = $directory.'/'.$filename;

        if (! Storage::disk('public')->exists($path)) {
            Storage::disk('public')->put($path, self::svg($label, $width, $height));
        }

        return $path;
    }

    protected static function svg(string $label, int $width, int $height): string
    {
        [$from, $to] = self::PALETTES[array_rand(self::PALETTES)];
        $label = htmlspecialchars($label, ENT_XML1 | ENT_QUOTES, 'UTF-8');

        $shapes = [];
        for ($i = 0; $i < 6; $i++) {
            $x = random_int(0, $width);
            $y = random_int(0, $height);
            $size = random_int((int) ($width * 0.08), (int) ($width * 0.28));
            $opacity = random_int(5, 14) / 100;

            $shapes[] = $i % 2 === 0
                ? sprintf('<circle cx="%d" cy="%d" r="%d" fill="#ffffff" fill-opacity="%s"/>', $x, $y, $size, $opacity)
                : sprintf('<rect x="%d" y="%d" width="%d" height="%d" rx="%d" fill="#ffffff" fill-opacity="%s" transform="rotate(%d %d %d)"/>',
                    $x, $y, $size, $size, (int) ($size / 5), $opacity, random_int(-25, 25), $x, $y);
        }

        $fontSize = max(28, (int) ($width / 22));
        $shapeMarkup = implode('', $shapes);
        $titleY = $height - 64;
        $subtitleY = $height - 28;

        return <<<SVG
        <svg xmlns="http://www.w3.org/2000/svg" width="{$width}" height="{$height}" viewBox="0 0 {$width} {$height}" role="img" aria-label="{$label}">
          <defs>
            <linearGradient id="bg" x1="0" y1="0" x2="1" y2="1">
              <stop offset="0%" stop-color="{$from}"/>
              <stop offset="100%" stop-color="{$to}"/>
            </linearGradient>
            <pattern id="grid" width="48" height="48" patternUnits="userSpaceOnUse">
              <path d="M 48 0 L 0 0 0 48" fill="none" stroke="#ffffff" stroke-opacity="0.07" stroke-width="1"/>
            </pattern>
          </defs>
          <rect width="{$width}" height="{$height}" fill="url(#bg)"/>
          <rect width="{$width}" height="{$height}" fill="url(#grid)"/>
          {$shapeMarkup}
          <text x="64" y="{$titleY}" font-family="Inter, Arial, sans-serif" font-size="{$fontSize}" font-weight="700" fill="#ffffff" fill-opacity="0.92">{$label}</text>
          <text x="64" y="{$subtitleY}" font-family="Inter, Arial, sans-serif" font-size="24" font-weight="600" fill="#ffffff" fill-opacity="0.6" letter-spacing="3">THORXUP · DUMMY ASSET</text>
        </svg>
        SVG;
    }
}
