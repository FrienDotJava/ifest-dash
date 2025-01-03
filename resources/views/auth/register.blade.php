<x-layouts.defaultlayout>
    <div id="ifst-app" class="app-wrapper">

        <!-- Pageloader -->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <div class="auth-wrapper">

            <div class="auth-wrapper-inner is-single">

                <!--Fake navigation-->
                <div class="auth-nav">
                    <div class="left"></div>
                    <div class="center mt-5">
                        <a href="/" class="header-item mt-5">
                            <img class="light-image" src="{{ asset('images/ifest.png') }}" alt="">
                            <img class="dark-image" src="{{ asset('images/ifest.png') }}" alt="">
                        </a>
                    </div>
                    <div class="right">
                        <label class="dark-mode ml-auto">
                            <input type="checkbox" checked>
                            <span></span>
                        </label>
                    </div>
                </div>

                <!--Single Centered Form-->
                <div class="single-form-wrap">

                    <div class="inner-wrap">
                        <!--Form Title-->
                        <div class="auth-head">
                            <h2>Informatics Festival #12</h2>                
                            <p>Silahkan buat akun untuk masuk</p>
                            <a href="masuk">Saya sudah punya akun </a>
                        </div>

                        <!--Form-->
                        <div class="form-card">

                            <form method="POST" action="{{ route('daftar') }}">
                                @csrf
                                <div id="signin-form" class="login-form">
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="fullname" type="text" class="input @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" placeholder="Nama Lengkap" required autocomplete="fullname">
                                            <span class="form-icon">
                                                    <i data-feather="user"></i>
                                                </span>
                                            @error('fullname')
                                                <div class="danger-text">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Aktif" required autocomplete="email">
                                            <span class="form-icon">
                                                    <i data-feather="mail"></i>
                                                </span>
                                            @error('email')
                                                <div class="danger-text">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                                            <span class="form-icon">
                                                    <i data-feather="key"></i>
                                                </span>
                                            @error('password')
                                                <div class="danger-text">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="password-confirm" type="password" class="input" placeholder="Konfirmasi Password" name="password_confirmation" required autocomplete="new-password">
                                            <span class="form-icon">
                                                    <i data-feather="repeat"></i>
                                                </span>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div class="control login mt-5">
                                        <button type="submit" class="button h-button is-primary is-bold is-fullwidth is-raised">Daftar</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.defaultlayout>
