@section('title', 'Timeline')
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
                            <h1 class="title is-4">Timeline</h1>
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
                                <a class="button h-button is-primary is-elevated h-modal-trigger" data-modal="add-timeline-modal">
                                    <span class="icon">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    <span>Tambah Timeline</span>
                                </a>
                            </div>

                                <div class="flex-table-wrapper">
                                    <!-- create table jquery and pagination -->
                                    <table class="ui celled table" id="table">
                                        <thead>
                                            <tr>
                                                <th class="has-text-centered">No</th>
                                                <th class="has-text-centered">Timeline</th>
                                                <th class="has-text-centered">Mulai</th>
                                                <th class="has-text-centered">Selesai</th>
                                                <th class="has-text-centered">Icon</th>
                                                <th class="has-text-centered">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($timeline as $tl)
                                            <tr>
                                                <td class="has-text-centered">{{ $loop->iteration }}</td>
                                                <td class="has-text-centered">{{ $tl->timeline }}</td>
                                                <td class="has-text-centered">{{ $tl->start }}</td>
                                                <td class="has-text-centered">{{ $tl->close }}</td>
                                                <td class="has-text-centered"><i data-feather="{{ $tl->icon }}"></i></td>
                                                <td class="has-text-centered">
                                                    <form action="{{env('APP_URL')}}/su_admin/pengaturan_web/timeline/delete_timeline/{{ $tl->id }}" id="tl_id_{{ $tl->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <a class="button is-small is-info is-outlined" onclick="editTimeline('{{ $tl->id }}')">
                                                        <span class="icon">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a onclick="initConfirm('Hapus Timeline', 'Apakah anda yakin? timeline yang sudah di hapus tidak dapat di kembalikan', false, false, 'Hapus', 'Batal', function (closeEvent) {$('#tl_id_{{ $tl->id }}').submit();})" class="button is-small is-danger is-outlined">
                                                        <span class="icon">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span>Hapus</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>

    <!-- modal add -->
    <div id="add-timeline-modal" class="modal h-modal is-large">
        <div class="modal-background h-modal-close"></div>
        <div class="modal-content">
            <form class="modal-card" action="{{env('APP_URL')}}/su_admin/pengaturan_web/timeline/add_timeline" method="POST" enctype="multipart/form-data">
                @csrf
                <header class="modal-card-head">
                    <h3>Tambah Timeline</h3>
                    <a class="h-modal-close ml-auto" aria-label="close">
                        <i data-feather="x"></i>
                    </a>
                </header>
                <div class="modal-card-body">
                    <div class="inner">
                        <div class="field">
                            <label class="label">Timeline</label>
                            <div class="control">
                                <input class="input" type="text" name="timeline" placeholder="Timeline" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Mulai</label>
                            <div class="control">
                                <input class="input" type="date" name="start" placeholder="Mulai" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Selesai</label>
                            <div class="control">
                                <input class="input" type="date" name="close" placeholder="Selesai" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Icon</label>
                            <div class="control">
                                <input class="input" type="text" name="icon" placeholder="Icon" required>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="modal-card-foot">
                    <button class="button is-success">Tambah</button>
                    <a class="button h-modal-close">Batal</a>
                </footer>
            </form>
        </div>
    </div>

    <!-- modal update -->
    <div id="edit-timeline-modal" class="modal h-modal is-large">
        <div class="modal-background h-modal-close"></div>
        <div class="modal-content">
            <form class="modal-card" action="{{env('APP_URL')}}/su_admin/pengaturan_web/timeline/edit_timeline" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <header class="modal-card-head">
                    <h3>Ubah Timeline</h3>
                    <a class="h-modal-close ml-auto" aria-label="close">
                        <i data-feather="x"></i>
                    </a>
                </header>
                <div class="modal-card-body">
                    <div class="inner-content">
                        <div class="modal-form">
                            <div class="columns is-multiline">
                                <div class="column is-12">
                                    <div class="field">
                                        <label class="label">Timeline</label>
                                        <div class="control">
                                            <input type="text" class="input" name="timeline" id="timeline" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="field">
                                        <label class="label">Mulai</label>
                                        <div class="control">
                                            <input type="date" class="input" name="start" id="start" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="field">
                                        <label class="label">Selesai</label>
                                        <div class="control">
                                            <input type="date" class="input" name="close" id="close" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-12">
                                    <div class="field">
                                        <label class="label">Icon</label>
                                        <div class="control">
                                            <input type="text" class="input" name="icon" id="icon" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-card-foot is-end">
                    <a class="button h-button is-rounded h-modal-close">Batal</a>
                    <button type="submit" class="button h-button is-primary is-raised is-rounded">Ubah</button>
                </div>
            </form>
        </div>
    </div>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.semanticui.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
    <script>
        $(window).on('load', function () {
            $('#table').DataTable(
                {
                    "pagingType": "full_numbers",
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    responsive: true,
                    "searching": false,
                }
            );
        });

        function editTimeline(id) {
            $('#edit-timeline-modal').addClass('is-active');
            $.ajax({
                url: "{{env('APP_URL')}}/su_admin/get_timeline/" + id,
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#id').val(data.id);
                    $('#timeline').val(data.timeline);
                    $('#start').val(data.start);
                    $('#close').val(data.close);
                    $('#icon').val(data.icon);
                },
                error: function () {
                    alert("Nothing Data");
                }
            });
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