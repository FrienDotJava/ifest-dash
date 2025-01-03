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
                <div class="single-form-wrap" style="min-height: 590px;">

                    <div class="inner-wrap">
                        <!--Form Title-->
                        <div class="auth-head">
                            <h2>Informatics Festival #12</h2>
                            <p>Reset Password</p>
                        </div>

                        <!--Form-->
                        <div class="form-card">
                            @if(session('status'))
                                <div class="has-text-centered success-text mb-2">{{session('status')}}</div>
                            @endif
                            @if($errors->any())
                                <div class="has-text-centered danger-text mb-2">{{implode('', $errors->all(':message'))}}</div>
                            @endif
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div id="signin-form" class="login-form">
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="email" class="input" type="email" name="email" value="{{old('email', $request->email)}}" required autofocus>
                                            <span class="form-icon">
                                                    <i data-feather="mail"></i>
                                                </span>
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="password" class="input" type="password" name="password" placeholder="Masukkan Password Baru"required>
                                            <span class="form-icon">
                                                    <i data-feather="lock"></i>
                                                </span>
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="password_confirmation" class="input" type="password" placeholder="Masukkan Ulang Password Baru"name="password_confirmation" required>
                                            <span class="form-icon">
                                                    <i data-feather="repeat"></i>
                                                </span>
                                        </div>
                                    </div>
                                    

                                    <!-- Submit -->
                                    <div class="control login">
                                        <button id="login_ifst" class="button h-button is-primary is-bold is-fullwidth is-raised">Reset Password</button>
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