@section('title', 'Kompetisi')
<x-layouts.app>
    <form action="{{ route('logout') }}" method="post" class="is-hidden" id="logout">@csrf</form>
    <div id="ifst-app" class="app-wrapper">

        <div class="app-overlay"></div>
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        @include('user_/slice_/sidehead')
        <!-- Content Wrapper -->
        <div class="view-wrapper" data-naver-offset="214" data-menu-item="#event-sidebar-menu" data-mobile-item="#event-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">

                        <div class="title-wrap">
                            <h1 class="title is-4">Kompetisi</h1>
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

                    <div class="card-grid-toolbar">
                        <div class="control has-icon">
                            <input class="input custom-text-filter" placeholder="Cari..." data-filter-target=".column">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <div class="card-grid card-grid-v3">

                            <!--List Empty Search Placeholder -->
                            <div class="page-placeholder custom-text-filter-placeholder is-hidden">
                                <div class="placeholder-content">
                                    <h3>Kami tidak dapat menemukan hasil yang cocok.</h3>
                                    <p class="is-larger">Sepertinya kami tidak dapat menemukan hasil yang cocok untuk
                                         istilah pencarian yang Anda masukkan. Silakan coba istilah atau kriteria pencarian yang berbeda .</p>
                                </div>
                            </div>

                            <!--Card Grid v3-->
                            <div class="columns is-multiline">
                                @foreach($events as $event)
                                @if($event->cm_soon != 1)
                                <!--Grid Item-->
                                <div class="column is-4">
                                    <div class="card-grid-item">
                                        <div class="h-avatar is-large">
                                            <img class="avatar is-squared" src="https://via.placeholder.com/150x150" data-demo-src="{{ asset('storage/'.$event->image_event) }}" alt="">
                                        </div>
                                        <h3 class="dark-inverted" data-filter-match>{{ $event->event_name }}</h3>
                                        <p>
                                            @php
                                                if(now() >= $event->start_regis){
                                                    if(now() > $event->close_regis){
                                                        echo 'Pendaftaran Telah Ditutup';
                                                    }else{
                                                        echo 'Pendaftaran Telah Dibuka';
                                                    }
                                                }
                                            @endphp
                                        </p>
                                        <div class="description">
                                            <p>{{ $event->description }}</p>
                                        </div>
                                        <div class="columns is-flex m-b-35">
                                            <span class="tag is-rounded is-success" style="position: absolute;left: 30px">{{ $event->event_type }}@if($event->event_type == 'Tim'): {{ $event->max_member }} Orang @endif</span>
                                            <span class="tag is-rounded is-info" style="position: absolute;right: 30px;">Biaya: @if($event->price == 'Rp. 0') Gratis @else {{$event->price}} @endif</span>
                                        </div>
                                        <div class="buttons">
                                            @if(now() >= $event->start_regis)
                                                @if(now() > $event->close_regis)
                                                <button class="button h-button is-dark-outlined" style="width:100%!important;" disabled>
                                                    <span class="icon">
                                                            <i data-feather="lock"></i>
                                                        </span>
                                                    <span>Pendaftaran Telah Ditutup</span>
                                                </button>
                                                @else
                                                <a href="{{env('APP_URL')}}/user/events/{{ $event->event_code }}" class="button h-button is-dark-outlined" style="width:100%!important;">
                                                    <span class="icon">
                                                            <i data-feather="edit-3"></i>
                                                        </span>
                                                    <span>Daftar</span>
                                                </a>
                                                @endif
                                            @else
                                            <button class="button h-button is-dark-outlined" style="width:100%!important;" disabled>
                                                    <span class="icon">
                                                            <i data-feather="lock"></i>
                                                        </span>
                                                    <span>Pendaftaran Dibuka {{ date('Y-m-d', strtotime($event->start_regis)) }}</span>
                                                </button>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @if(session('info'))
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
                    type: 'warning',
                    background: themeColors.warning,
                    icon: {
                        className: 'fas fa-hand-paper',
                        tagName: 'i',
                        text: ''
                    }
                    }]
                }); //Notyf Toasts Demos
                notyf.open({
                    type: "warning",
                    message: "{{ session('info') }}"
                });
            });
        </script>
    @endif
</x-layouts.app>