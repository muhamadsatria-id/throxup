<x-mail::message>
# New Formal Quote Request (RFQ)

Anda menerima permintaan penawaran harga baru dari website:

- **Full Name:** {{ $quote->full_name }}
- **Business Email:** {{ $quote->business_email }}
- **Phone Number:** {{ $quote->phone_number ?? '-' }}
- **Subject / Part Number:** {{ $quote->subject ?? '-' }}

**Project Specifications / Requirements:**
<x-mail::panel>
{{ $quote->project_specifications }}
</x-mail::panel>

<x-mail::button :url="url('/admin/quote-requests/' . $quote->id . '/edit')">
Lihat & Kelola di Admin Panel
</x-mail::button>

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>