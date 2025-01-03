@component('mail::message')
# Selamat Tim Kamu Sudah Di Verifikasi

Tim kamu sudah di verifikasi oleh panitia, silahkan login ke akun kamu untuk melihat detail tim kamu dan mengupload task yang baru.

@component('mail::button', ['url' => config('app.url').'/masuk'])
Login
@endcomponent

Terima Kasih,<br>
{{ __('Informatics Festival #11') }}
@endcomponent
