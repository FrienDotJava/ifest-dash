<x-layouts.defaultlayout>
    <div id="ifst-app" class="app-wrapper" style="height: 100vh">

        <div class="app-overlay"></div>

        <!-- Pageloader -->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>

                    <div class="page-content-inner">

                        <!--Confirm Account-->
                        <div class="confirm-account-wrapper mt-5">
                            <div class="wrapper-inner">
                                <div class="action-box">
                                    <div class="box-content">
                                        <h3 class="dark-inverted">Verifikasi email anda</h3>
                                        <p>{{ __('Terima kasih telah mendaftar! Sebelum memulai, dapatkah Anda memverifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan melalui email kepada Anda? Jika Anda tidak menerima email tersebut, kami akan dengan senang hati mengirimkan email lain kepada Anda. ') }}<br>

                                        @if (session('status') == 'verification-link-sent')
                                            <div class="mt-2 mb-5 font-medium text-sm is-green">
                                                {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
                                            </div>
                                        @endif

                                        <form class="mt-5" method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <button type="submit" class="button h-button is-primary is-raised">{{ __('Klik disini untuk mengirim ulang') }}</button>.
                                        </form>
                                        <form class="mt-2" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="button h-button is-danger is-raised">{{ __('Keluar') }}</button>.
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-layouts.defaultlayout>
