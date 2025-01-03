@section('title', 'Registarsi Sukses')
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

                    <div class="page-content-inner">

                        <!--Action Page-->
                        <div class="action-page-wrapper action-page-v1">
                            <div class="wrapper-inner">
                                <div class="action-box">
                                    <div class="box-content">
                                        <h3 class="dark-inverted">Selamat kamu berhasil melakukan pendaftaran tim.</h3>
                                        <div class="sender-message is-dark-card-bordered is-dark-bg-4 text-centered">
                                            <p>{{ session('notif') }}</p>
                                        </div>
                                        <div class="buttons">
                                            <a href="{{env('APP_URL')}}/user/regis_event" class="button h-button is-primary is-raised" style="width: 100%;">Lihat Tim</a>
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