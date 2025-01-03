@section('title', 'Donor Darah')
<x-layouts.app>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <form action="{{ route('logout') }}" method="post" class="is-hidden" id="logout">@csrf</form>
    <div id="ifst-app" class="app-wrapper">

        <div class="app-overlay"></div>
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        @include('admin_/slice_/sidehead')

        <div class="view-wrapper" data-naver-offset="405" data-menu-item="#dcr-sidebar-menu" data-mobile-item="#dcr-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">

                        <div class="title-wrap">
                            <h1 class="title is-4">Donor Darah</h1>
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

                    <div class="columns">
                        <div class="column is-12">
                            <div class="buttons">
                                <a class="button is-primary is-rounded is-elevated" id="user_num_btn1" href="{{env('APP_URL')}}/su_admin/donor_darah/export">
                                    <span class="icon">
                                        <i data-feather="download"></i>
                                    </span>
                                    <span>Export Data Donor Darah</span>
                                </a>
                            </div>


                            <div class="flex-table-wrapper">
                                <table class="ui celled table" id="table">
                                    <thead>
                                        <tr>
                                            <th class="has-text-centered">No</th>
                                            <th class="has-text-centered">Nama</th>
                                            <th class="has-text-centered">Email</th>
                                            <th class="has-text-centered">No. Telp</th>
                                            <th class="has-text-centered">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($donor_darah as $d)
                                        <tr>
                                            <td class="has-text-centered">{{ $loop->iteration }}</td>
                                            <td class="has-text-centered">{{ $d->nama }}</td>
                                            <td class="has-text-centered">{{ $d->email }}</td>
                                            <td class="has-text-centered">{{ $d->no_hp }}</td>
                                            <td class="has-text-centered">
                                                <a class="button is-info is-rounded is-elevated" id="user_num_btn1" href="{{env('APP_URL')}}/su_admin/donor_darah/detail/{{ $d->id }}">
                                                    <span class="icon">
                                                        <i data-feather="eye"></i>
                                                    </span>
                                                    <span>Detail</span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <style>
        .ui.celled.table tbody tr td {
            color: #000000BC;
        }
    </style>


    <!-- addons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.semanticui.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable(
                {
                    "pagingType": "full_numbers",
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    "responsive": true,
                    "searching": true,
                    "search": {
                        "search": "",
                        "smart": true,
                        "regex": false,
                        "caseInsensitive": true
                    },
                    "language": {
                        "search": "_INPUT_",
                        "searchPlaceholder": "Cari",
                    },
                    
                }
            );
            $('.dataTables_filter').find('span').removeClass('ui input');
        });
    </script>
</x-layouts.app>