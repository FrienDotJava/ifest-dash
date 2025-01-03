@section('title', 'Tambah Pengguna')
<x-layouts.app>
    <form action="{{ route('logout') }}" method="post" class="is-hidden" id="logout">@csrf</form>
    <div id="ifst-app" class="app-wrapper">

        <div class="app-overlay"></div>
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        @include('admin_/slice_/sidehead')

        <div class="view-wrapper" data-naver-offset="465" data-menu-item="#users-sidebar-menu" data-mobile-item="#users-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">

                        <a href="{{env('APP_URL')}}/su_admin/users" class="menu-toggle has-chevron is-hidden-mobile">
                            <span class="icon-box-toggle active">
                                <span class="rotate">
                                    <i class="icon-line-top"></i>
                                    <i class="icon-line-center"></i>
                                    <i class="icon-line-bottom"></i>
                                </span>
                            </span>
                        </a>
                        <div class="title-wrap">
                            <h1 class="title is-4">Tambah Pengguna</h1>
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

                    <div class="page-content-inner">
                        
                        <form action="{{env('APP_URL')}}/su_admin/store_user" method="POST" class="form-layout is-webapp">
                            @csrf
                            <div class="form-outer">
                                <div class="form-header stuck-header">
                                    <div class="form-header-inner">
                                        <div class="left">
                                            <h3>Tambah Pengguna</h3>
                                        </div>
                                        <div class="right is-hidden-mobile">
                                            <div class="buttons">
                                                <button type="submit" id="save-button" class="button is-primary is-raised">Tambah</button>
                                            </div>
                                        </div>
                                        <div class="right is-hidden-tablet is-hidden-desktop">
                                            <div class="buttons">
                                                <a href="{{env('APP_URL')}}/su_admin/users" class="button h-button is-light is-dark-outlined">Kembali</a>
                                                <button type="submit" id="save-button" class="button is-primary is-raised" >Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <!--Fieldset-->
                                    <div class="form-fieldset">
                                        <div class="fieldset-heading">
                                            <h4>Personal Data</h4>
                                            <p>Data personal akun</p>
                                        </div>

                                        <div class="columns is-multiline">
                                            <div class="column is-12">
                                                <div class="field">
                                                    <label>Nama Lengkap</label>
                                                    <div class="control has-icon">
                                                        <input type="text" name="fullname" class="input @error('fullname') is-invalid @enderror">
                                                        <div class="form-icon">
                                                            <i data-feather="user"></i>
                                                        </div>
                                                    </div>
                                                    @error('fullname')
                                                        <div class="danger-text">Nama lengkap wajib diisi!</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="column is-12">
                                                <div class="field">
                                                    <label>Alamat Email</label>
                                                    <div class="control has-icon">
                                                        <input type="email" name="email" class="input @error('email') is-invalid @enderror">
                                                        <div class="form-icon">
                                                            <i data-feather="mail"></i>
                                                        </div>
                                                    </div>
                                                    @error('email')
                                                        <div class="danger-text">Email wajib diisi!</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="column is-12">
                                                <div class="field">
                                                    <label>Password</label>
                                                    <div class="control has-icon">
                                                        <input type="text" name="password" class="input" value="{{ strtolower(substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,7)) }}" readonly>
                                                        <div class="form-icon">
                                                            <i data-feather="key"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column is-12">
                                                <div class="field">
                                                    <label>Nomor Handphone</label>
                                                    <div class="control has-icon">
                                                        <input type="number" name="no_telpon" class="input @error('no_telpon') is-invalid @enderror">
                                                        <div class="form-icon">
                                                            <i data-feather="phone"></i>
                                                        </div>
                                                    </div>
                                                    @error('no_telpon')
                                                        <div class="danger-text">Nomor Telpon wajib diisi!</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="column is-12">
                                                <div class="field">
                                                    <label>ID Line</label>
                                                    <div class="control has-icon">
                                                        <input type="text" name="id_line" class="input @error('id_line') is-invalid @enderror">
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
                                    <!--Fieldset-->
                                    <div class="form-fieldset">
                                        <div class="fieldset-heading">
                                            <h4>Tambahan</h4>
                                            <p>Pengaturan Tambahan Akun</p>
                                        </div>

                                        <div class="columns is-multiline">
                                            <div class="column is-12">
                                                <div class="field">
                                                    <label>Tipe user</label>
                                                    <div class="field">
                                                        <div class="control">
                                                            <div class="h-select">
                                                                <div class="select-box">
                                                                    <span>Pilih tipe user</span>
                                                                </div>
                                                                <div class="select-icon">
                                                                    <i data-feather="chevron-down"></i>
                                                                </div>
                                                                <div class="select-drop has-slimscroll-sm">
                                                                    <div class="drop-inner">
                                                                        <div class="option-row">
                                                                            <input type="radio" name="user_type" value="superuser" disabled>
                                                                            <div class="option-meta">
                                                                                <span>SuperUser</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="option-row">
                                                                            <input type="radio" name="user_type" value="staff">
                                                                            <div class="option-meta">
                                                                                <span>Staff</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column is-12">
                                                <div class="field">
                                                    <label>Aktivasi Akun</label>
                                                    <div class="control">
                                                        <label class="form-switch is-primary">
                                                            <input type="checkbox" name="email_verified_at" class="is-switch" checked>
                                                            <i></i>
                                                        </label>
                                                    </div>
                                                    <label>Note: Aktivasi akun merupakan cara untuk melakukan verifikasi akun di mana jika di hidupkan akun akan langsung aktif tanpa melakukan verifikasi dari email.</label>
                                                </div>
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
</x-layouts.app>