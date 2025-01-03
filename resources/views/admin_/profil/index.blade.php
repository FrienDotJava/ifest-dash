@section('title', 'Profil')
<x-layouts.app>
    <form action="{{ route('logout') }}" method="post" class="is-hidden" id="logout">@csrf</form>
    <div id="ifst-app" class="app-wrapper">

        <div class="app-overlay"></div>
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        @include('admin_/slice_/sidehead')

        <div class="view-wrapper">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">

                        <div class="title-wrap">
                            <h1 class="title is-4">Profil</h1>
                        </div>

                        <div class="toolbar ml-auto">

                            <div class="toolbar-link">
                                <label class="dark-mode ml-auto">
                                    <input type="checkbox" checked>
                                    <span></span>
                                </label>
                            </div>

                            @if(Auth::user()->user_type == 'superuser')
                            <a class="toolbar-link right-panel-trigger" data-panel="activity-panel">
                                <i data-feather="grid"></i>
                            </a>
                            @endif

                            <div class="toolbar-notifications is-hidden-mobile">
                                <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                    <div class="is-trigger" aria-haspopup="true">
                                        <i data-feather="bell"></i>
                                        @if(count($notification) > 0)
                                        <span class="new-indicator pulsate"></span>
                                        @endif
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <div class="heading">
                                                <div class="heading-left">
                                                    <h6 class="heading-title">Notifikasi</h6>
                                                </div>
                                                <!-- <div class="heading-right">
                                                    <a class="notification-link" href="admin-profile-notifications.html">See all</a>
                                                </div> -->
                                            </div>
                                            <ul class="notification-list">
                                                @foreach($notification as $notif)
                                                <li>
                                                    <a class="notification-item" href="{{env('APP_URL')}}/su_admin/{{$notif->id_event}}/team/{{ $notif->id_team }}">
                                                        <div class="img-left">
                                                            <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="{{ asset('storage/'.$notif->event->image_event) }}"/>
                                                        </div>
                                                        <div class="user-content">
                                                            <p class="user-info"><span class="name">{{ $notif->team->team_name }}</span> {{ $notif->message }}</p>
                                                            <p class="time">
                                                                <time class="is-relative">{{ $notif->created_at->diffForHumans() }}</time>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </li>
                                                @endforeach
                                                @if(count($notification) == 0)
                                                    <li>
                                                        <div class="user-content">
                                                            <p class="user-info">Tidak ada notifikasi</p>
                                                        </div>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="account-wrapper">
                        <div class="columns">

                            <!--Navigation-->
                            <div class="column is-4">
                                <div class="account-box is-navigation">
                                    <div class="media-flex-center">
                                        <div class="h-avatar is-large">
                                            <img class="avatar" src="https://via.placeholder.com/150x150"
                                                data-demo-src="{{ asset('storage/'.Auth::user()->foto) }}" alt="">
                                        </div>
                                        <div class="flex-meta">
                                            <span>{{ Auth::user()->fullname }}</span>
                                            <span>{{ Auth::user()->user_type }}</span>
                                        </div>
                                    </div>
                                    <div class="account-menu">
                                        <a onclick="personal_info()" class="account-menu-item personal-info is-active">
                                            <i class="lnil lnil-user-alt"></i>
                                            <span>Informasi Akun</span>
                                            <span class="end">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                        </a>
                                        <a onclick="change_password()" class="account-menu-item change_password">
                                            <i class="lnil lnil-key-alt"></i>
                                            <span>Ganti password</span>
                                            <span class="end">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-8" id="personal-info">
                                <div class="account-box is-form is-footerless">
                                    <div class="form-head stuck-header">
                                        <div class="form-head-inner">
                                            <div class="left">
                                                <h3>Informasi Akun</h3>
                                            </div>
                                            <div class="right is-hidden-mobile">
                                                <div class="buttons">
                                                    <a onclick="edit_profil()" class="button h-button is-primary is-raised">Ubah Profil</a>
                                                </div>
                                            </div>
                                            <a onclick="edit_profil()" class="button h-button is-primary is-raised is-hidden-desktop is-hidden-tablet" style="width: 100%!important">Ubah Profil</a>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <!--Fieldset-->
                                        <div class="fieldset">
                                            <div class="fieldset-heading">
                                                <h4>Informasi Personal</h4>
                                                <p>Data personal anda.</p>
                                            </div>

                                            <div class="columns is-multiline">
                                                <!--Field-->
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>Nama Lengkap</label>
                                                        <div class="control has-icon">
                                                            <input type="text" class="input" value="{{ Auth::user()->fullname }}" disabled>
                                                            <div class="form-icon">
                                                                <i data-feather="user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Field-->
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>Email</label>
                                                        <div class="control has-icon">
                                                            <input type="text" class="input" value="{{ Auth::user()->email }}" disabled>
                                                            <div class="form-icon">
                                                                <i data-feather="mail"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Field-->
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>Nomor Telpon</label>
                                                        <div class="control has-icon">
                                                            <input type="text" class="input" value="{{ Auth::user()->no_telpon }}" disabled>
                                                            <div class="form-icon">
                                                                <i data-feather="phone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Field-->
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>ID Line</label>
                                                        <div class="control has-icon">
                                                            <input type="text" class="input" value="{{ Auth::user()->id_line }}" disabled>
                                                            <div class="form-icon">
                                                                <i data-feather="smartphone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-8" id="change-password">
                                <form method="post" action="{{env('APP_URL')}}/su_admin/change_password"class="account-box is-form is-footerless">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-head stuck-header">
                                        <div class="form-head-inner">
                                            <div class="left">
                                                <h3>Ganti Password</h3>
                                            </div>
                                            <div class="right is-hidden-mobile">
                                                <div class="buttons">
                                                    <button class="button h-button is-primary is-raised">Perbarui Password</button>
                                                </div>
                                            </div>
                                            <button class="button h-button is-primary is-raised is-hidden-desktop is-hidden-tablet" style="width: 100%!important">Perbarui Password</button>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <!--Fieldset-->
                                        <div class="fieldset">
                                            <div class="fieldset-heading">
                                                <h4>Perbarui Password</h4>
                                                <p>Ubah password untuk meningkatkan keamanan akun anda.</p>
                                            </div>

                                            <div class="columns is-multiline">
                                                <!--Field-->
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>Password Sekarang</label>
                                                        <div class="control has-icon">
                                                            <input type="password" class="input @error('current_password') is-invalid @enderror" name="current_password" required>
                                                            <div class="form-icon">
                                                                <i data-feather="key"></i>
                                                            </div>
                                                        </div>
                                                        @error('current_password')
                                                            <div class="danger-text">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!--Field-->
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>Password Baru</label>
                                                        <div class="control has-icon">
                                                            <input type="password" name="new_password" class="input @error('new_password') is-invalid @enderror" autocomplete="new-password" required>
                                                            <div class="form-icon">
                                                                <i data-feather="key"></i>
                                                            </div>
                                                        </div>
                                                        @error('new_password')
                                                            <div class="danger-text">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!--Field-->
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>Konfirmasi Password</label>
                                                        <div class="control has-icon">
                                                            <input type="password" class="input" name="new_password_confirmation" required autocomplete="new-password">
                                                            <div class="form-icon">
                                                                <i data-feather="repeat"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="column is-8" id="edit-profil">
                                <form class="account-box is-form is-footerless" action="{{env('APP_URL')}}/su_admin/edit_profil" method="POST" enctype="multipart/form-data">
                                    <div class="form-head stuck-header">
                                        <div class="form-head-inner">
                                            <div class="left">
                                                <h3>Informasi Akun</h3>
                                            </div>
                                            <div class="right">
                                                <div class="buttons">
                                                    <a onclick="personal_info()" class="button h-button is-light is-dark-outlined">
                                                        <span class="icon">
                                                            <i class="lnir lnir-arrow-left rem-100"></i>
                                                        </span>
                                                        <span>Kembali</span>
                                                    </a>
                                                        @csrf
                                                        @method('PATCH')
                                                    <button type="submit" class="button h-button is-primary is-raised">Perbarui</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <!--Fieldset-->
                                        <div class="fieldset">
                                            <div class="fieldset-heading">
                                                <h4>Informasi Personal</h4>
                                                <p>Data personal anda.</p>
                                            </div>

                                            <div class="columns is-multiline">
                                                <!--Field-->
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>Nama Lengkap</label>
                                                        <div class="control has-icon">
                                                            <input type="text" name="fullname" class="input @error('fullname') is-invalid @enderror" value="{{ Auth::user()->fullname }}" required>
                                                            <div class="form-icon">
                                                                <i data-feather="user"></i>
                                                            </div>
                                                        </div>
                                                        @error('fullname')
                                                            <div class="danger-text">Nama lengkap wajib diisi!</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!--Field-->
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>Email</label>
                                                        <div class="control has-icon">
                                                            <input type="text" class="input" value="{{ Auth::user()->email }}" readonly disabled>
                                                            <div class="form-icon">
                                                                <i data-feather="mail"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Field-->
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>Nomor Telpon</label>
                                                        <div class="control has-icon">
                                                            <input type="number" name="no_telpon" class="input @error('no_telpon') is-invalid @enderror" value="{{ Auth::user()->no_telpon }}" required>
                                                            <div class="form-icon">
                                                                <i data-feather="phone"></i>
                                                            </div>
                                                        </div>
                                                        @error('no_telpon')
                                                            <div class="danger-text">Nomor Telpon wajib diisi!</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!--Field-->
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>ID Line</label>
                                                        <div class="control has-icon">
                                                            <input type="text" name="id_line" class="input @error('id_line') is-invalid @enderror" value="{{ Auth::user()->id_line }}" required>
                                                            <div class="form-icon">
                                                                <i data-feather="smartphone"></i>
                                                            </div>
                                                        </div>
                                                        @error('id_line')
                                                            <div class="danger-text">ID Line wajib diisi!</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $('#edit-profil').hide();
        $('#change-password').hide();
        function edit_profil(){
            $('#personal-info').hide();
            $('.personal-info').removeClass('is-active');
            $('.change_password').removeClass('is-active');
            $('#edit-profil').fadeIn('fast');
        }
        function personal_info(){
            $('#edit-profil').hide();
            $('#change-password').hide();
            $('.personal-info').addClass('is-active');
            $('.change_password').removeClass('is-active');
            $('#personal-info').fadeIn('fast');
        }
        function change_password(){
            $('#edit-profil').hide();
            $('#personal-info').hide();
            $('.personal-info').removeClass('is-active');
            $('.change_password').addClass('is-active');
            $('#change-password').fadeIn('fast');
        }
    </script>

    @if(session('notif'))
        <script>
            $(document).ready(function () {
                //Notyf Toasts Configuration
                notyf = new Notyf({
                    duration: 3000,
                    position: {
                    x: 'right',
                    y: 'bottom'
                    },
                    types: [{
                    type: 'green',
                    background: themeColors.green,
                    icon: {
                        className: 'fas fa-check',
                        tagName: 'i',
                        text: ''
                    }
                    }]
                }); //Notyf Toasts Demos
                notyf.success("{{ session('notif') }}");
            });
        </script>
    @endif
</x-layouts.app>