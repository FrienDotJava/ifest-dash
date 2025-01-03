@section('title', 'WDC')
<x-layouts.app>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <form action="{{ route('logout') }}" method="post" class="is-hidden" id="logout">@csrf</form>
    <div id="ifst-app" class="app-wrapper">

        <div class="app-overlay"></div>
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        @include('admin_/slice_/sidehead')

        <div class="view-wrapper" data-naver-offset="274" data-menu-item="#wdc-sidebar-menu" data-mobile-item="#wdc-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">

                        <div class="title-wrap">
                            <h1 class="title is-4">Web Design Competition (WDC)</h1>
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

                    <div class="user-grid-toolbar">

                        <div class="buttons">
                            <div class="field">
                                <div class="control">
                                    <div class="h-select">
                                        <div class="select-box">
                                            <span>
                                                @if(isset($filter))
                                                    @if($filter == '1')
                                                        Terverifikasi
                                                    @elseif($filter == '0')
                                                        Belum Terverifikasi
                                                    @elseif($filter == 'bl')
                                                        Blacklist/Mengundurkan diri
                                                    @endif
                                                @else
                                                    Semua
                                                @endif
                                            </span>
                                        </div>
                                        <div class="select-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                        </div>
                                        <div class="select-drop has-slimscroll-sm">
                                            <div class="drop-inner">
                                                <div class="option-row">
                                                    <form action="{{env('APP_URL')}}/su_admin/wdc" id="semua_team" method="get"></form>
                                                    <input type="radio" onclick="$('#semua_team').submit()" name="grid_filter">
                                                    <div class="option-meta">
                                                        <span>Semua</span>
                                                    </div>
                                                </div>
                                                <div class="option-row">
                                                    <form action="{{env('APP_URL')}}/su_admin/wdc/1" id="verif_team" method="get"></form>
                                                    <input type="radio" onclick="$('#verif_team').submit()" name="grid_filter">
                                                    <div class="option-meta">
                                                        <span>Terverifikasi</span>
                                                    </div>
                                                </div>
                                                <div class="option-row">
                                                    <form action="{{env('APP_URL')}}/su_admin/wdc/0" id="nonverif_team" method="get"></form>
                                                    <input type="radio" onclick="$('#nonverif_team').submit()" name="grid_filter">
                                                    <div class="option-meta">
                                                        <span>Belum Terverifikasi</span>
                                                    </div>
                                                </div>
                                                <div class="option-row">
                                                    <form action="{{env('APP_URL')}}/su_admin/wdc/bl" id="bl_team" method="get"></form>
                                                    <input type="radio" onclick="$('#bl_team').submit()" name="grid_filter">
                                                    <div class="option-meta">
                                                        <span>Blacklist/Mengundurkan diri</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-inner">
                        <div class="user-grid user-grid-v2">

                            <!--List Empty Search Placeholder -->
                            <div class="page-placeholder custom-text-filter-placeholder is-hidden">
                                <div class="placeholder-content">
                                    <h3>Kami tidak dapat menemukan hasil yang cocok.</h3>
                                    <p class="is-larger">Sepertinya kami tidak dapat menemukan hasil yang cocok untuk
                                         istilah pencarian yang Anda masukkan. Silakan coba istilah atau kriteria pencarian yang berbeda .</p>
                                </div>
                            </div>

                            <div class="columns is-multiline">

                                <!--Grid item-->
                                @if(count($team_event) > 0)
                                    @foreach($team_event as $team)
                                        <div class="column is-3">
                                            <div class="grid-item-wrap">
                                                <div class="grid-item-head">
                                                    <div class="flex-head">
                                                        <div class="meta">
                                                            <span class="dark-inverted">
                                                                @php
                                                                    $task_count = 0;
                                                                    $alltask = count($task_event);
                                                                @endphp
                                                                @foreach($task_team as $task)
                                                                    @if($task->team_id == $team->team_id)
                                                                        @php
                                                                            $task_count += 1;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                                @if($team->status == 1)
                                                                    Terverifikasi
                                                                @elseif($team->status == 0)
                                                                    @if($task_count == $count_task)
                                                                        Menunggu Verifikasi
                                                                    @else
                                                                        Belum Terverifikasi
                                                                    @endif
                                                                @else
                                                                    Mengundurkan Diri/Blacklist
                                                                @endif
                                                            </span>
                                                            <span>{{ $alltask - $task_count }} Task Tersisa</span>
                                                        </div>
                                                        <div class="status-icon 
                                                            @if($team->status == 1)
                                                                is-success
                                                            @elseif($team->status == 0)
                                                                is-warning
                                                            @else
                                                                is-danger
                                                            @endif
                                                        ">
                                                            <i class="
                                                            @if($team->status == 1)
                                                                fas fa-check
                                                            @elseif($team->status == 0)
                                                                fas fa-spinner
                                                            @else
                                                                fas fa-times
                                                            @endif"></i>
                                                        </div>
                                                    </div>
                                                    <div class="buttons">
                                                        <a href="{{env('APP_URL')}}/su_admin/wdc/team/{{ $team->team_id }}#task-tab" class="button h-button is-dark-outlined" style="width: 100%;">
                                                            <span class="icon">
                                                                    <i data-feather="check-circle"></i>
                                                                </span>
                                                            <span>Tasks</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="grid-item">
                                                    <h3 class="dark-inverted" data-filter-match>{{ $team->team_name }}</h3>
                                                    <p data-filter-match>{{ $team->owner->fullname }}</p>
                                                    <div class="buttons mt-2">
                                                        <a href="{{env('APP_URL')}}/su_admin/wdc/team/{{ $team->team_id }}" class="button h-button is-dark-outlined">
                                                            <span>Lihat Data</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="page-placeholder custom-text-filter-placeholder">
                                        <div class="placeholder-content">
                                            <h3>Data tidak tersedia.</h3>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            {{ $team_event->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>