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
                <div class="single-form-wrap">

                    <div class="inner-wrap">
                        <!--Form Title-->
                        <div class="auth-head">
                            <h2>Informatics Festival #12</h2>
                            <p>Silahkan masuk ke akun anda</p>
                            <a href="daftar">Saya tidak punya akun</a>
                        </div>

                        <!--Form-->
                        <div class="form-card">
                            @if($errors->any())
                                <div class="has-text-centered danger-text mb-2">{{implode('', $errors->all(':message'))}}</div>
                            @endif
                            <form method="POST" action="{{ route('masuk') }}">
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
                                        <div id="email_result"></div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                            <span class="form-icon">
                                                    <i data-feather="lock"></i>
                                                </span>
                                        </div>
                                        <div id="password_result"></div>
                                    </div>

                                    <div class="setting-item">
                                        <label class="form-switch is-primary">
                                            <input type="checkbox" class="is-switch" name="remember" {{ old('remember') ? 'checked' : '' }} id="busy-mode-toggle">
                                            <i></i>
                                        </label>
                                        <div class="setting-meta">
                                            <span>Remember Me</span>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div class="control login">
                                        <button id="login_ifst" class="button h-button is-primary is-bold is-fullwidth is-raised">Login</button>
                                    </div>


                                </div>
                            </form>
                        </div>

                        <div class="forgot-link has-text-centered">
                            <a href="lupa-password">Lupa Password?</a>
                        </div>
                        <div class="forgot-link has-text-centered">
                            <a href="daftar">Belum punya akun?</a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        // Validation
        $(document).ready(function() {
        $('#email').keyup(function () {
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (re.test($(this).val())) {
                $("#email_result").text("Format email Benar!");
                $("#email_result").removeClass();$("#email_result").addClass("success-text");
                $('#password').keyup(function () {
                    if($(this).val() !== ""){
                        $("#login_ifst").prop("disabled", false);
                    }
                });
            } else {
                $("#email_result").text("Format email Salah!");
                $("#email_result").removeClass();$("#email_result").addClass("danger-text");
                $("#login_ifst").prop("disabled", true);
            }
        });
        if($("#email").val() == "" && $("#password").val() == ""){
            $("#login_ifst").prop("disabled", true);
        }

        const password = document.querySelector('#password');
        password.addEventListener('keyup', function(e){
            if (e.getModifierState('CapsLock')) {
                $('#password_result').addClass('danger-text');
                $('#password_result').text('Caps lock is on');
            } else {
                $('#password_result').text('');
            }
        })

        });
    </script>
</x-layouts.defaultlayout>