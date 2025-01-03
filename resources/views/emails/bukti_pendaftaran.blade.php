@component('mail::message')
<h1 style="text-align: center;">Bukti Pendaftaran Donor Darah</h1>

<table>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td></td>
        <td>{{ $nama }}</td>
    </tr>
    <tr>
        <td>NPM</td>
        <td>:</td>
        <td></td>
        <td>{{ $npm }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td></td>
        <td>{{ $email }}</td>
    </tr>
    <tr>
        <td>No. HP</td>
        <td>:</td>
        <td></td>
        <td>{{ $no_hp }}</td>
    </tr>
    <tr>
        <td>Umur</td>
        <td>:</td>
        <td></td>
        <td>{{ $umur }}</td>
    </tr>
    <tr>
        <td>Berat Badan</td>
        <td>:</td>
        <td></td>
        <td>{{ $berat_badan }}</td>
    </tr>
    <tr>
        <td>Golongan Darah</td>
        <td>:</td>
        <td></td>
        <td>{{ $golongan_darah }}</td>
    </tr>
    <tr>
        <td>Hal</td>
        <td>:</td>
        <td></td>
        <td>{{ $hal }}</td>
    </tr>
    <tr>
        <td>Hari</td>
        <td>:</td>
        <td></td>
        <td>{{ $hari }}</td>
    </tr>
</table>

@component('mail::button', ['url' => config('app.url')])
Kembali Ke Website
@endcomponent

Terima Kasih,<br>
{{ __('Informatics Festival #11') }}
@endcomponent
