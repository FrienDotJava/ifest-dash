@section('title', 'Dashboard')
<x-layouts.app>
    <form action="{{ route('logout') }}" method="post" class="is-hidden" id="logout">@csrf</form>
    <div id="ifst-app" class="app-wrapper">

        <div class="app-overlay"></div>
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        @include('admin_/slice_/sidehead')
        <!-- Content Wrapper -->
        <div class="view-wrapper" data-naver-offset="150" data-menu-item="#home-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">

                        <div class="title-wrap">
                            <h1 class="title is-4">Dashboard</h1>
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

                        <!--Personal Dashboard V3-->
                        <div class="personal-dashboard personal-dashboard-v3">

                            <div class="columns row">

                                <div class="column is-8">
                                    <div class="columns is-multiline is-flex-tablet-p">

                                        <div class="column is-6">
                                            <div class="dashboard-card is-welcome">
                                                <div class="welcome-title">
                                                    <h3 class="dark-inverted has-text-centered">Hello {{ Auth::user()->fullname }}</h3>
                                                    <p class="has-text-centered">
                                                        @if(Auth::user()->user_type == 'staff')
                                                            @if($not_verified > 0)
                                                                {{ __('Kamu memiliki '.$not_verified.' data yang belum diverifikasi.') }} <a href="#">Lihat dan verifikasi data dengan cara klik pada salah satu kompetisi/acara</a>
                                                            @endif
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="left">
                                                <span class="dark-inverted title is-6">Pendaftaran Terbaru</span>
                                                <span><a class="is-dark-primary"></a></span>
                                            </div>
                                            <div class="dashboard-card mt-2">
                                                @if(count($nw_pdft) > 0)
                                                @foreach($nw_pdft as $pdf)
                                                    <a href="{{env('APP_URL')}}/su_admin/{{$pdf->id_event}}/team/{{ $pdf->team_id }}" class="dashboard-card is-interview">
                                                        <div class="media-flex-center">
                                                            <div class="flex-meta">
                                                                <span>{{ $pdf->team_name . ' - ' . $pdf->event->event_name}}</span>
                                                                <span>{{ $pdf->created_at }}
                                                                    @php
                                                                        $count = 0;
                                                                        foreach($detail_task as $dt){
                                                                            if($dt->event_id == $pdf->id_event && $dt->condition_task == NULL){
                                                                                $count++;
                                                                            }
                                                                        }
                                                                    @endphp
                                                                    @if($pdf->task->count() == $count)
                                                                        <span class="tag is-light">
                                                                            Menunggu Verifikasi
                                                                        </span>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <div class="flex-end">
                                                                <i data-feather="chevron-right"></i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endforeach
                                                @else
                                                    <p class="has-text-centered">
                                                        Tidak tersedia
                                                    </p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="column is-6">
                                            <div class="stats-wrapper">
                                                <div class="left">
                                                    <span class="dark-inverted title is-6">Jumlah Peserta</span>
                                                    <span><a class="is-dark-primary"></a></span>
                                                </div>
                                                <div class="columns is-multiline is-flex-tablet-p">
                                                    <div class="column is-6">
                                                        <a href="{{ env('APP_URL') }}/su_admin/i2c" class="dashboard-card">
                                                            <div class="media-flex-center">
                                                                <div class="h-icon is-info is-rounded">
                                                                    <i data-feather="user"></i>
                                                                </div>
                                                                <div class="flex-meta">
                                                                    <span>{{ $i2c }}</span>
                                                                    <span>I2C</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="column is-6">
                                                        <a href="{{ env('APP_URL') }}/su_admin/wdc" class="dashboard-card">
                                                            <div class="media-flex-center">
                                                                <div class="h-icon is-purple is-rounded">
                                                                    <i data-feather="user"></i>
                                                                </div>
                                                                <div class="flex-meta">
                                                                        <span>{{ $wdc }}</span>
                                                                        <span>WDC</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="column is-12">
                                                        <a href="{{ env('APP_URL') }}/su_admin/muc" class="dashboard-card">
                                                            <div class="media-flex-center">
                                                                <div class="h-icon is-green is-rounded">
                                                                    <i data-feather="user"></i>
                                                                </div>
                                                                <div class="flex-meta">
                                                                    <span>{{ $muc }}</span>
                                                                    <span>MUC</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-4"> 
                                    
                                    <div class="left">
                                        <span class="dark-inverted title is-6">Timeline</span>
                                        <span><a class="is-dark-primary"></a></span>
                                    </div>
                                    <div class="list-widget list-widget-v3 is-straight">

                                        <div class="inner-list">
                                            <div class="icon-timeline">
                                                @php
                                                    $rand_color = ['is-primary', 'is-info', 'is-success', 'is-orange', 'is-yellow']
                                                @endphp
                                                @foreach($timeline as $item)
                                                <div class="timeline-item">
                                                    <div class="timeline-icon is-squared {{ $rand_color[array_rand($rand_color)] }}">
                                                        <i data-feather="{{$item->icon}}"></i>
                                                    </div>
                                                    <div class="timeline-content">
                                                        <p>@php print_r($item->timeline) @endphp</p>
                                                        <span>{{ \Carbon\Carbon::create($item->start)->format('d M Y') }} @if($item->close != null) - {{ \Carbon\Carbon::create($item->close)->format('d M Y') }} @endif<br> 
                                                        @if($item->close != null)
                                                            @if(now() >= $item->start && now() <= $item->close)
                                                                ( Sedang Berlangsung )
                                                            @endif
                                                        @elseif(Carbon\Carbon::now()->format('Y-m-d') == $item->start)
                                                            ( Sedang Berlangsung )
                                                        @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                @endforeach
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