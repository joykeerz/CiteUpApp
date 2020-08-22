@component('mail::message')
Congratulation!

Anda sudah berhasil mendaftar seminar Cite Up 2019.
Mohon Tunjukan Email ini saat datang ke acara seminar kami.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
