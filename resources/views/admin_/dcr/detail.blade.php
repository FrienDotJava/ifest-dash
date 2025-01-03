@section('title', 'Detail Donor Darah')
<x-layouts.app>
    <form action="{{ route('logout') }}" method="post" class="is-hidden" id="logout">@csrf</form>
    <div id="ifst-app" class="app-wrapper">

        <div class="app-overlay"></div>
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        @include('admin_/slice_/sidehead')

        <div class="view-wrapper" data-naver-offset="406" data-menu-item="#dcr-sidebar-menu" data-mobile-item="#dcr-sidebar-menu-mobile">
            <div class="page-content-wrapper">
                <div class="page-content is-relative">
                    <div class="page-title has-text-centered">
                        
                        <a href="{{env('APP_URL')}}/su_admin/donor_darah" class="menu-toggle has-chevron">
                            <span class="icon-box-toggle active">
                                <span class="rotate">
                                    <i class="icon-line-top"></i>
                                    <i class="icon-line-center"></i>
                                    <i class="icon-line-bottom"></i>
                                </span>
                            </span>
                        </a>
                        <div class="title-wrap">
                            <h1 class="title is-4">Donor Darah - Identitas</h1>
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
                    <div class="page-content-inner project-details">
                        <div class="tabs-wrapper  is-triple-slider">
                            <div class="tabs-inner">
                                <div class="tabs">
                                    <ul>
                                        <li data-tab="form-tab" class="is-active" style="width:100%"><a><span>Form</span></a></li>
                                        <li class="tab-naver" style="width:100%!important"></li>
                                    </ul>
                                </div>
                            </div>


                            <div id="form-tab" class="tab-content is-active">
                                <div class="columns project-details-inner">
                                    <div class="column is-8">
                                        <div class="project-details-card">
                                            <div class="card-head">
                                                <div class="title-wrap">
                                                    <h3>{{ $donor_darah->nama }}</h3>
                                                </div>
                                            </div>

                                            <div class="project-files">
                                                <h4>Data Diri</h4>
                                                <div class="columns is-multiline">
                                                    <div class="column is-12">
                                                        <div class="file-box">
                                                            <span class="dark-inverted">
                                                                <i data-feather="user"></i>
                                                            </span>
                                                            <div class="meta">
                                                                <span>Nama</span>
                                                                <span>{{ $donor_darah->nama }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column is-12">
                                                        <div class="file-box">
                                                            <span class="dark-inverted">
                                                                <i data-feather="mail"></i>
                                                            </span>
                                                            <div class="meta">
                                                                <span>Email</span>
                                                                <span>{{ $donor_darah->email }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column is-12">
                                                        <div class="file-box">
                                                            <span class="dark-inverted">
                                                                <i data-feather="phone"></i>
                                                            </span>
                                                            <div class="meta">
                                                                <span>No. Handphone</span>
                                                                <span>{{ $donor_darah->no_hp }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="column is-4">
                                        <div class="project-details-card">
                                            <div class="card-head">
                                                <div class="title-wrap">
                                                    <h3>Detail Data</h3>
                                                </div>
                                            </div>
                                            <div class="project-files">
                                                <div class="columns is-multiline">
                                                    <div class="column is-12">
                                                        <div class="file-box">
                                                            <span class="dark-inverted">
                                                                <i data-feather="plus-circle"></i>
                                                            </span>
                                                            <div class="meta">
                                                                <span>Umur</span>
                                                                <span>{{ $donor_darah->umur }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column is-12">
                                                        <div class="file-box">
                                                            <span class="dark-inverted">
                                                                <i data-feather="octagon"></i>
                                                            </span>
                                                            <div class="meta">
                                                                <span>Berat Badan</span>
                                                                <span>{{ $donor_darah->berat_badan }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column is-12">
                                                        <div class="file-box">
                                                            <span class="dark-inverted">
                                                                <i data-feather="life-buoy"></i>
                                                            </span>
                                                            <div class="meta">
                                                                <span>Golongan Darah</span>
                                                                <span>{{ $donor_darah->golongan_darah }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column is-12">
                                                        <div class="file-box">
                                                            <span class="dark-inverted">
                                                                <i data-feather="alert-triangle"></i>
                                                            </span>
                                                            <div class="meta">
                                                                <span>Hal yang harus diperhatikan</span>
                                                                <span>{{ $donor_darah->hal }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column is-12">
                                                        <div class="file-box">
                                                            <span class="dark-inverted">
                                                                <i data-feather="calendar"></i>
                                                            </span>
                                                            <div class="meta">
                                                                <span>Hari Donor</span>
                                                                <span>{{ $donor_darah->hari }}</span>
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
                    
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>