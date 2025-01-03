@section('title', 'Dashboard')
<x-layouts.app>
    <form action="{{ route('logout') }}" method="post" class="is-hidden" id="logout">@csrf</form>
    <div id="ifst-app" class="app-wrapper">

        <div class="app-overlay"></div>
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        @include('user_/slice_/sidehead')
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
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <!--Personal Dashboard V3-->
                        <div class="personal-dashboard personal-dashboard-v3">

                            <div class="columns">

                                <div class="column is-8">
                                    <div class="columns is-multiline is-flex-tablet-p">

                                        <div class="column is-6">
                                            <div class="dashboard-card is-welcome">
                                                <div class="welcome-title">
                                                    <h3 class="dark-inverted has-text-centered">Hello {{ Auth::user()->fullname }}</h3>
                                                    @if($nullvalue != 0)  
                                                    <p class="has-text-centered">
                                                    Sedikit lagi, kamu memiliki
                                                    {{$nullvalue}}
                                                    data yang harus dilengkapi sebelum mengikuti perlombaan.
                                                    </p>
                                                    @else
                                                    <p class="has-text-centered">
                                                        Data kamu sudah lengkap, silahkan mendaftarkan perlombaan yang ingin kamu ikuti.
                                                    </p>
                                                    @endif
                                                </div>
                                                <div class="welcome-progress is-flex" style="justify-content: center;">
                                                    <div id="welcome-gauge" class="gauge"></div>
                                                </div>
                                                <div class="button-wrap">
                                                    @if($nullvalue != 0)
                                                        <a href="{{env('APP_URL')}}/user/profil" class="button h-button is-primary is-fullwidth is-big is-raised">Lihat Profil</a>
                                                    @else
                                                        <a href="{{env('APP_URL')}}/user/events  " class="button h-button is-primary is-fullwidth is-big is-raised">Daftar Kompetisi/Acara</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="column is-6">
                                            <h3 class="dark-inverted"><b>Lomba Yang Diikuti</b></h3>
                                            <div class="dashboard-card mt-2">
                                                @if(count($data_lomba)>0)
                                                @foreach($data_lomba as $data)
                                                    <a href="{{env('APP_URL')}}/user/regis_event/{{ $data->id_event }}/detail_tim" class="dashboard-card is-interview">
                                                        <div class="media-flex-center">
                                                            <div class="flex-meta">
                                                                <span>{{ $data->event->event_name }}</span>
                                                                <span>
                                                                    @if($data->status == 1)
                                                                        Terverifikasi
                                                                    @elseif($data->status == 0)
                                                                        Belum Terverifikasi
                                                                    @else
                                                                        Tim Kamu Di Blacklist
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
                                                    <div class="has-text-centered">
                                                        <p>{{ __('Kamu tidak mengikuti lomba apapun.') }}</p>
                                                    </div>
                                                @endif
                                            </div>

                                            <h3 class="dark-inverted is-6 mb-1"><b>Timeline</b></h3>
                                            <div class="list-widget list-widget-v3 is-straight">

                                                <div class="inner-list">
                                                    <div class="icon-timeline">
                                                        @php
                                                            $rand_color = ['is-primary', 'is-info', 'is-success', 'is-orange', 'is-yellow']
                                                        @endphp
                                                        @foreach($timeline as $item)
                                                        <!--Timeline item-->
                                                        <div class="timeline-item">
                                                            <div class="timeline-icon is-squared {{ $rand_color[rand(0,4)] }}">
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

                                        <div class="column is-6 h-hidden-mobile h-hidden-tablet-p">
                                        </div>

                                    </div>
                                </div>

                                <div class="column is-4">
                                    <div class="widget picker-widget" style="height: 280px">
                                        <div class="widget-toolbar">
                                            <div class="left">
                                            </div>
                                            <div class="center">
                                                <h3 class="date"></h3>
                                            </div>
                                            <div class="right"></div>
                                        </div>
                                        <table class="calendar">

                                            <thead class="hari">

                                                <tr>

                                                    <td>Min</td>
                                                    <td>Sen</td>
                                                    <td>Sel</td>
                                                    <td>Rab</td>
                                                    <td>Kam</td>
                                                    <td>Jum</td>
                                                    <td>Sab</td>

                                                </tr>

                                            </thead>

                                            <tbody class="tanggal">

                                            </tbody>

                                        </table>
                                    </div>
                                    
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- create hint css -->
    <script>
        $(document).ready(function(){
            generateCalendar(moment().month(), moment().year());
            getToday();
            var welcomeGauge = bb.generate({
                data: {
                columns: [["Profil", 100]],
                type: "gauge",
                onclick: function onclick(d, i) {
                    console.log("onclick", d, i);
                },
                onover: function onover(d, i) {
                    console.log("onover", d, i);
                },
                onout: function onout(d, i) {
                    console.log("onout", d, i);
                }
                },
                gauge: {
                label: {
                    extents: function extents() {
                    return "";
                    }
                }
                },
                color: {
                pattern: [themeColors.danger, themeColors.green],
                threshold: {
                    values: [70, 100]
                }
                },
                size: {
                height: 90,
                width: 90
                },
                padding: {
                bottom: 0
                },
                legend: {
                show: false,
                position: "inset"
                },
                bindto: "#welcome-gauge"
            });
            setTimeout(function () {
                welcomeGauge.load({
                columns: [["Profil", 0]]
                });
            }, 1000);
            setTimeout(function () {
                welcomeGauge.load({
                columns: [["Profil", "{{ round((100/count(Schema::getColumnListing('users'))) * (count(Schema::getColumnListing('users')) - $nullvalue), 0) }}"]]
                });
            }, 2000);
        })
    </script>
</x-layouts.app>