@component('mail::message')
# Pesan Baru dari Website Portfolio

**Dari:** {{ $data['name'] }}  
**Email:** {{ $data['email'] }}  
**Subjek:** {{ $data['subject'] }}

**Pesan:**  
{{ $data['message'] }}

@component('mail::button', ['url' => config('app.url')])
Kunjungi Website
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent 