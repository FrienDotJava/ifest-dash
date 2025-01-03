<x-layouts.defaultlayout>
    <div id="ifst-app" class="app-wrapper overflow-hidden">

        <!-- Pageloader -->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <div class="auth-wrapper">

            <div class="auth-wrapper-inner is-single">

                <!--Fake navigation-->
                <div class="auth-nav">
                    <div class="left"></div>
                    <div class="center mt-3">
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
                <div class="single-form-wrap" style="min-height: 490px!important">

                    <div class="inner-wrap">
                        <!--Form Title-->
                        <div class="auth-head">
                            <h2>Informatics Festival #12</h2>
                            <p>Lupa Password</p>
                            <a onclick="history.back()">Kembali </a>
                        </div>

                        <!--Form-->
                        <div class="form-card">
                            @if(session('status'))
                                <div class="has-text-centered success-text mb-2">{{session('status')}}</div>
                            @endif
                            @if($errors->any())
                                <div class="has-text-centered danger-text mb-2">{{implode('', $errors->all(':message'))}}</div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div id="signin-form" class="login-form">
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                            <span class="form-icon">
                                                    <i data-feather="mail"></i>
                                                </span>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div class="control login">
                                        <button id="login_ifst" class="button h-button is-primary is-bold is-fullwidth is-raised">Email Password Reset Link</button>
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