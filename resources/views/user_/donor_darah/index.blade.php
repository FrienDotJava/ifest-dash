@section('title', 'Pendaftaran Donor Darah')
<x-layouts.app>
<div id="huro-app" class="app-wrapper">

    <!-- Pageloader -->
    <div class="pageloader is-full"></div>
    <div class="infraloader is-full is-active"></div>
    <div class="auth-wrapper">

        <div class="signup-nav">
            <div class="signup-nav-inner">
                <a href="/" class="logo">
                    <img src="{{ asset('images/ifest.png') }}" alt="IFEST 11">
                </a>
            </div>
        </div>

        <div id="huro-signup" class="signup-wrapper">

            <div class="signup-steps">
                <div class="steps-container">
                    <div class="step-icon is-active" data-progress="10" data-step="signup-step-1">
                        <div class="inner">
                            <i data-feather="file-text"></i>
                        </div>
                        <span class="step-label">Persetujuan</span>
                    </div>
                    <div class="step-icon is-inactive" data-progress="50" data-step="signup-step-2">
                        <div class="inner">
                            <i data-feather="edit-2"></i>
                        </div>
                        <span class="step-label">Formulir</span>
                    </div>
                    <div class="step-icon is-inactive" data-progress="100">
                        <div class="inner">
                            <i data-feather="check"></i>
                        </div>
                        <span class="step-label">Selesai</span>
                    </div>
                    <progress id="signup-steps-progress" class="progress" value="0" max="100">0%</progress>
                </div>
            </div>

            <div class="hero is-fullheight">
                <div class="hero-body">
                    <div class="container">
                        <div id="signup-step-1" class="columns signup-columns">
                            <div class="column is-4 is-offset-4">
                                <div class="signup-form-wrapper">
                                    <h1 class="title is-5 signup-title has-text-centered">Pendaftaran Donor Darah</h1>
                                    <h2 class="subtitle signup-subtitle has-text-centered">Silahkan membaca dan menyetujui syarat dan ketentuan yang berlaku.</h2>
                                    <div class="signup-form">
                                        <div class="field has-text-centered">
                                            <div class="control">
                                                <label class="form-switch is-success">
                                                    <input type="checkbox" class="is-switch" id="confirm-step-1-checkbox">
                                                    <i></i>
                                                </label>
                                            </div>
                                            <span class="form-switch-label subtitle signup-subtitle">Saya telah membaca dan menyetujui <a data-modal="syarat-ketentuan" class="has-text-primary h-modal-trigger">syarat dan ketentuan</a> yang berlaku.</span>
                                        </div>
                                        <div class="is-centered has-text-centered is-fullwidth">
                                            <button class="button is-primary is-fullwidth is-rounded is-raised is-next-step" id="confirm-step-1">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>

                        <div id="signup-step-2" class="columns signup-columns is-hidden">
                            <div class="column is-4 is-offset-4 username-form">
                                <h1 class="title is-5 signup-title has-text-centered">Formulir Data Diri Donor Darah</h1>
                                <h2 class="subtitle signup-subtitle has-text-centered">Silahkan mengisi formulir berikut.</h2>
                                <form class="signup-form">
                                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="control has-validation nama-control">
                                                <input type="text" class="input" name="nama_lengkap" id="nama_lengkap" required>
                                                <small class="error-text">Field wajib diisi</small>
                                                <div class="auth-label">Nama Lengkap</div>
                                                <div class="validation-icon is-success">
                                                    <div class="icon-wrapper">
                                                        <i data-feather="check"></i>
                                                    </div>
                                                </div>
                                                <div class="validation-icon is-error">
                                                    <div class="icon-wrapper">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-12">
                                            <div class="control has-validation">
                                                <input type="text" class="input" name="npm" id="npm">
                                                <div class="auth-label">NPM (Khusus Mahasiswa UAJY) </div>
                                                <div class="validation-icon is-success">
                                                    <div class="icon-wrapper">
                                                        <i data-feather="check"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-12">
                                            <div class="control has-validation email-control">
                                                <input type="email" class="input" name="email" id="email" required>
                                                <small class="error-text">Field wajib diisi</small>
                                                <div class="auth-label">Email Aktif</div>
                                                <div class="validation-icon is-success">
                                                    <div class="icon-wrapper">
                                                        <i data-feather="check"></i>
                                                    </div>
                                                </div>
                                                <div class="validation-icon is-error">
                                                    <div class="icon-wrapper">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-12">
                                            <div class="control has-validation no_hp-control">
                                                <input type="number" class="input" name="no_hp" id="no_hp" required>
                                                <small class="error-text">Field wajib diisi</small>
                                                <div class="auth-label">Nomor Handphone (WhatsApp)</div>
                                                <div class="validation-icon is-success">
                                                    <div class="icon-wrapper">
                                                        <i data-feather="check"></i>
                                                    </div>
                                                </div>
                                                <div class="validation-icon is-error">
                                                    <div class="icon-wrapper">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="is-centered has-text-centered is-fullwidth">
                                        <button id="confirm-step-2" type="button" class="button h-button is-big is-rounded is-primary is-fullwidth">Selanjutnya</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="signup-step-3" class="columns signup-columns is-hidden">
                            <div class="column is-4 is-offset-4 username-form">
                                <h1 class="title is-5 signup-title has-text-centered">Formulir Donor Darah</h1>
                                <h2 class="subtitle signup-subtitle has-text-centered">Silahkan mengisi formulir berikut.</h2>
                                <form class="signup-form">
                                    <div class="columns is-multiline">
                                    <div class="column is-12">
                                            <div class="control has-validation umur-control">
                                                <input type="number" class="input" name="umur" id="umur" required>
                                                <small class="error-text">Field wajib diisi</small>
                                                <small class="error-text">Umur minimal 18 tahun</small>
                                                <div class="auth-label">Umur</div>
                                                <div class="validation-icon is-success">
                                                    <div class="icon-wrapper">
                                                        <i data-feather="check"></i>
                                                    </div>
                                                </div>
                                                <div class="validation-icon is-error">
                                                    <div class="icon-wrapper">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-12">
                                            <div class="control has-validation berat_badan-control">
                                                <input type="number" class="input" name="berat_badan" id="berat_badan" required>
                                                <small class="error-text">Field wajib diisi</small>
                                                <small class="error-text">Berat badan minimal 45 kg</small>
                                                <div class="auth-label">Berat Badan (Kg)</div>
                                                <div class="validation-icon is-success">
                                                    <div class="icon-wrapper">
                                                        <i data-feather="check"></i>
                                                    </div>
                                                </div>
                                                <div class="validation-icon is-error">
                                                    <div class="icon-wrapper">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-12">
                                            <div class="control has-validation golongan_darah-control">
                                                <input type="text" class="input" name="golongan_darah" id="golongan_darah" required>
                                                <small class="error-text">Field wajib diisi</small>
                                                <div class="auth-label">Golongan Darah</div>
                                                <div class="validation-icon is-success">
                                                    <div class="icon-wrapper">
                                                        <i data-feather="check"></i>
                                                    </div>
                                                </div>
                                                <div class="validation-icon is-error">
                                                    <div class="icon-wrapper">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="is-centered has-text-centered is-fullwidth">
                                        <button id="confirm-step-3" type="button" class="button h-button is-big is-rounded is-primary is-fullwidth">Selanjutnya</button>
                                    </div>
                                    <div class="is-centered has-text-centered is-fullwidth mt-2">
                                        <button id="back-signup-1" type="button" class="button h-button is-big is-rounded is-danger is-fullwidth">Kembali</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="signup-step-4" class="columns signup-columns is-hidden">
                            <div class="column is-4 is-offset-4 username-form">
                                <h1 class="title is-5 signup-title has-text-centered">Hal Hal Yang Perlu Diperhatikan</h1>
                                <h2 class="subtitle signup-subtitle has-text-centered">Silahkan centang hal-hal berikut.</h2>
                                <form class="signup-form">
                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="control has-validation hal-control">
                                                <div class="hal-checkbox">
                                                    <label class="checkbox is-outlined is-success">
                                                        <input type="checkbox" name="hal" id="hal-1" value="1" required>
                                                        <span></span>
                                                        Tidak memiliki riwayat penyakit jantung dan paru-paru
                                                    </label>
                                                    <label class="checkbox is-outlined is-success">
                                                        <input type="checkbox" name="hal" id="hal-2" value="2" required>
                                                        <span></span>
                                                        Tidak menderita tekanan darah tinggi atau darah rendah
                                                    </label>
                                                    <label class="checkbox is-outlined is-success">
                                                        <input type="checkbox" name="hal" id="hal-3" value="3" required>
                                                        <span></span>
                                                        Tidak menderita kanker
                                                    </label>
                                                    <br>
                                                    <label class="checkbox is-outlined is-success">
                                                        <input type="checkbox" name="hal" id="hal-4" value="4" required>
                                                        <span></span>
                                                        Tidak mengidap HIV/AIDS
                                                    </label>
                                                    <label class="checkbox is-outlined is-success">
                                                        <input type="checkbox" name="hal" id="hal-5" value="5" required>
                                                        <span></span>
                                                        Tidak memiliki riwayat diabetes
                                                    </label>
                                                    <label class="checkbox is-outlined is-success">
                                                        <input type="checkbox" name="hal" id="hal-6" value="6" required>
                                                        <span></span>
                                                        Tidak sedang dalam kondisi hamil
                                                    </label>
                                                    <label class="checkbox is-outlined is-success">
                                                        <input type="checkbox" name="hal" id="hal-7" value="7" required>
                                                        <span></span>
                                                        Tidak sedang dalam proses berobat
                                                    </label>
                                                    <label class="checkbox is-outlined is-success">
                                                        <input type="checkbox" name="hal" id="hal-8" value="8" required>
                                                        <span></span>
                                                        Jika bertato dan tindik minimal sudah berselang 12 bulan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-12">
                                            <div class="control hari-control has-validation">
                                                <div class="h-select">
                                                    <div class="select-box">
                                                        <span>Pilih Hari Donor Darah</span>
                                                    </div>
                                                    <div class="select-icon">
                                                        <i data-feather="chevron-down"></i>
                                                    </div>
                                                    <div class="select-drop has-slimscroll-sm">
                                                        <fieldset id="hari">
                                                            <input type="radio" value="default" name="hari" checked hidden>
                                                            <div class="drop-inner">
                                                                <div class="option-row">
                                                                    <input type="radio" value="Rabu" name="hari">
                                                                    <div class="option-meta">
                                                                        <span>Rabu</span>
                                                                    </div>
                                                                </div>
                                                                <div class="option-row">
                                                                    <input type="radio" value="Kamis" name="hari">
                                                                    <div class="option-meta">
                                                                        <span>Kamis</span>
                                                                    </div>
                                                                </div>
                                                                <div class="option-row">
                                                                    <input type="radio" value="Jum'at" name="hari">
                                                                    <div class="option-meta">
                                                                        <span>Jum'at</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <small class="error-text">Field wajib diisi</small>
                                            </div>
                                        </div>
                                        <div class="column is-12">
                                            <div class="control has-switch">
                                                <span>Kirim saya bukti pendaftaran melalui email</span>
                                                <label class="form-switch ml-auto is-success">
                                                    <input type="checkbox" id="send-email" class="is-switch" checked>
                                                    <i></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="is-centered has-text-centered is-fullwidth">
                                        <button id="finish-signup" type="button" class="button h-button is-big is-rounded is-primary is-fullwidth">Kirim</button>
                                    </div>
                                    <div class="is-centered has-text-centered is-fullwidth mt-2">
                                        <button id="back-signup-2" type="button" class="button h-button is-big is-rounded is-danger is-fullwidth">Kembali</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div id="signup-step-5" class="action-page-wrapper action-page-v1 is-hidden columns signup-columns">
                            <div class="wrapper-inner">
                                <div class="action-box">
                                    <div class="box-content">
                                        <h3 class="dark-inverted">Selamat kamu berhasil melakukan pendaftaran Donor Darah.</h3>
                                        <div class="sender-message is-dark-card-bordered is-dark-bg-4 text-centered">
                                            <p class="is-centered has-text-centered">Berikut adalah bukti data pendaftaran kamu</p>
                                            <table id="table-donor">
                                                <tr>
                                                    <td>Nama</td>
                                                    <td> :  </td>
                                                    <td id="nama-suc"></td>
                                                </tr>
                                                <tr>
                                                    <td>NPM</td>
                                                    <td> :  </td>
                                                    <td id="npm-suc"></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td> :  </td>
                                                    <td id="email-suc"></td>
                                                </tr>
                                                <tr>
                                                    <td>No Handphone</td>
                                                    <td> :  </td>
                                                    <td id="no_hp-suc"></td>
                                                </tr>
                                                <tr>
                                                    <td>Umur</td>
                                                    <td> :  </td>
                                                    <td id="umur-suc"></td>
                                                </tr>
                                                <tr>
                                                    <td>Berat Badan</td>
                                                    <td> :  </td>
                                                    <td id="berat_badan-suc"></td>
                                                </tr>
                                                <tr>
                                                    <td>Golongan Darah</td>
                                                    <td> :  </td>
                                                    <td id="gol_darah-suc"></td>
                                                </tr>
                                                <tr>
                                                    <td>Hal yang harus diperhatikan</td>
                                                    <td> :  </td>
                                                    <td id="hal-suc"></td>
                                                </tr>
                                                <tr>
                                                    <td>Hari Donor Darah</td>
                                                    <td> :  </td>
                                                    <td id="hari-suc"></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="buttons">
                                            <a href="{{env('APP_URL')}}" class="button h-button m-t-20 is-primary is-raised" style="width: 100%;">Kembali Ke Dashboard</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal h-modal" id="syarat-ketentuan">
    <div class="modal-background h-modal-close"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Syarat dan Ketentuan</p>
            <button class="h-modal-close delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="content">
                <ol>
                    <li>Tidak memiliki riwayat penyakit jantung dan paru-paru</li>
                    <li>Tidak menderita tekanan darah tinggi atau darah rendah</li>
                    <li>Tidak menderita kanker</li>
                    <li>Tidak mengidap HIV/AIDS</li>
                    <li>Tidak memiliki riwayat diabetes</li>
                    <li>Tidak sedang dalam kondisi hamil</li>
                    <li>Tidak sedang dalam proses berobat</li>
                    <li>Jika bertato dan tindik minimal sudah berselang 12 bulan</li>
                </ol>
            </div>
        </section>
        <footer class="modal-card-foot">
            <button class="button is-success ml-auto h-modal-close">Saya Mengerti</button>
        </footer>
    </div>
</div>



<script src="{{asset('public_/js/donor.js')}}"></script>
</x-layouts.app>