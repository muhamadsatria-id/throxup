@props(['phone' => ''])

@php
    // Bersihkan karakter selain angka (misal: "+62 812-3456" -> "628123456")
    $cleanPhone = preg_replace('/\D+/', '', (string) $phone);
    // Ubah awalan "08..." menjadi "628..." secara otomatis
    if (str_starts_with($cleanPhone, '0')) {
        $cleanPhone = '62' . substr($cleanPhone, 1);
    }
    $message = urlencode('Halo ' . (data_get($profile ?? null, 'nama') ?: config('app.name', 'Thorxup')) . ', saya ingin menanyakan informasi produk.');
@endphp

@if($cleanPhone)
    <style>
        .wa-float-btn {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 9999;
            display: inline-flex;
            align-items: center;
            height: 56px;
            padding: 0 16px;
            border-radius: 9999px;
            background-color: #25D366;
            color: #ffffff;
            text-decoration: none;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.18);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }
        .wa-float-btn:hover {
            padding: 0 22px 0 18px;
            background-color: #20bd5a;
            box-shadow: 0 10px 24px rgba(37, 211, 102, 0.4);
        }
        .wa-float-icon {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
            fill: currentColor;
        }
        .wa-float-text {
            max-width: 0;
            opacity: 0;
            margin-left: 0;
            overflow: hidden;
            white-space: nowrap;
            font-family: 'Inter', sans-serif;
            font-size: 15px;
            font-weight: 600;
            line-height: 1;
            transition: max-width 0.35s ease, opacity 0.25s ease, margin-left 0.3s ease;
        }
        .wa-float-btn:hover .wa-float-text {
            max-width: 140px;
            opacity: 1;
            margin-left: 10px;
        }
    </style>

    <a href="https://wa.me/{{ $cleanPhone }}?text={{ $message }}"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Chat with us via WhatsApp"
       class="wa-float-btn">
        <svg class="wa-float-icon" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2M12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 15 3.8 13.47 3.8 11.91C3.81 7.37 7.5 3.67 12.05 3.67M8.53 7.33C8.37 7.33 8.1 7.39 7.87 7.64C7.65 7.89 7 8.5 7 9.71C7 10.93 7.89 12.1 8 12.27C8.14 12.44 9.76 14.94 12.25 16C12.84 16.27 13.3 16.42 13.66 16.53C14.25 16.72 14.79 16.69 15.22 16.63C15.7 16.56 16.68 16.03 16.89 15.45C17.1 14.87 17.1 14.38 17.04 14.27C16.97 14.17 16.81 14.11 16.56 14C16.31 13.86 15.09 13.26 14.87 13.18C14.64 13.1 14.5 13.06 14.31 13.3C14.15 13.55 13.67 14.11 13.53 14.27C13.38 14.44 13.24 14.46 13 14.34C12.74 14.21 11.94 13.95 11 13.11C10.26 12.45 9.77 11.64 9.62 11.39C9.5 11.15 9.61 11 9.73 10.89C9.84 10.78 10 10.6 10.1 10.45C10.23 10.31 10.27 10.2 10.35 10.04C10.43 9.87 10.39 9.73 10.33 9.61C10.27 9.5 9.77 8.26 9.56 7.77C9.36 7.29 9.16 7.35 9 7.34C8.86 7.34 8.7 7.33 8.53 7.33Z"/>
        </svg>
        <span class="wa-float-text">Chat with us</span>
    </a>
@endif