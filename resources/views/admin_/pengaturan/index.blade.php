@section('title', 'Pengaturan')
<x-layouts.app>
    <form action="{{ route('logout') }}" method="post" class="is-hidden" id="logout">@csrf</form>
    <div id="ifst-app" class="app-wrapper">

        <div class="app-overlay"></div>
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        @include('admin_/slice_/sidehead')
        <!-- Content Wrapper -->
        <div class="view-wrapper">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">

                        <div class="title-wrap">
                            <h1 class="title is-4">Pengaturan Web</h1>
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

                        <div class="list-view list-view-v2">

                            <div id="active-items-tab" class="tab-content is-active">
                                <div class="list-view-inner">

                                    <!--List Item-->
                                    @foreach($events as $event)
                                    <div class="list-view-item">
                                        <div class="list-view-item-inner">
                                            <div class="meta-left">
                                                <h3>
                                                    <span>{{ $event->event_name }}</span>
                                                </h3>
                                                <p class="m-r-20">
                                                    <i data-feather="clipboard"></i>
                                                    <span>{{ $event->description }}</span>
                                                </p>

                                                <div class="icon-list m-t-10">
                                                    <span>
                                                            <i class="lnil lnil-calender-alt-2"></i>
                                                            <span>{{$event->start_regis}}</span>
                                                    </span>
                                                    <span>
                                                            <i class="lnil lnil-calender-alt-3"></i>
                                                            <span>{{$event->close_regis}}</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="meta-right">
                                                <div class="buttons">
                                                    <a data-modal="edit-event-modal" data-event="{{ $event }}" id="edit-event" class="button h-button is-primary is-raised h-modal-trigger is-hidden-mobile">Ubah</a>
                                                    <a data-modal="edit-event-modal" data-event="{{ $event }}" id="edit-event" class="button h-button is-primary is-raised h-modal-trigger is-hidden-desktop is-hidden-tablet" style="width: 100%;">Ubah</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="list-view-item">
                                        <div class="list-view-item-inner">
                                            <div class="meta-left">
                                                <h3>
                                                    <span>TIMELINE</span>
                                                </h3>
                                            </div>
                                            <div class="meta-right">
                                                <div class="buttons">
                                                    <a class="button h-button is-primary is-raised is-hidden-mobile" href="{{env('APP_URL')}}/su_admin/pengaturan_web/timeline">Ubah</a>
                                                        
                                                    <a class="button h-button is-primary is-raised is-hidden-desktop is-hidden-tablet" href="{{env('APP_URL')}}/su_admin/pengaturan_web/timeline">Ubah</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--List Item-->
                                    @foreach($events as $event_delete)
                                    <div class="list-view-item">
                                        <div class="list-view-item-inner">
                                            <div class="meta-left">
                                                <h3>
                                                    <span>{{ $event_delete->event_name }}</span>
                                                </h3>
                                            </div>
                                            <div class="meta-right">
                                                <div class="buttons">
                                                    <form action="{{env('APP_URL')}}/su_admin/delete_event/{{ $event_delete->event_code }}" id="event_code_{{ $event_delete->event_code }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <a class="button h-button is-danger is-raised is-hidden-mobile" onclick="initConfirm('Hapus Kompetisi/Event', 'Apakah anda yakin? kompetisi/event yang sudah di hapus tidak dapat di kembalikan', false, false, 'Hapus', 'Batal', function (closeEvent) {$('#event_code_{{ $event_delete->event_code }}').submit();})">Hapus</a>
                                                        
                                                    <a class="button h-button is-danger is-raised is-hidden-desktop is-hidden-tablet" onclick="initConfirm('Hapus Kompetisi/Event', 'Apakah anda yakin? kompetisi/event yang sudah di hapus tidak dapat di kembalikan', false, false, 'Hapus', 'Batal', function (closeEvent) {$('#event_code_{{ $event_delete->event_code }}').submit();})" style="width: 100%!important;">Hapus</a>
                                                </div>
                                            </div>
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

    <!-- modal -->
    <div id="edit-event-modal" class="modal h-modal is-large">
        <div class="modal-background h-modal-close"></div>
        <div class="modal-content">
            <form class="modal-card" action="{{env('APP_URL')}}/su_admin/edit-event" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <header class="modal-card-head">
                    <h3>Ubah Kompetisi</h3>
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
                                        <label>ID Event</label>
                                        <div class="control">
                                            <input type="text" class="input" name="event_code" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-12">
                                    <div class="field">
                                        <label>Nama Kompetisi</label>
                                        <div class="control">
                                            <input type="text" class="input @error('event_name') is-validate @enderror" name="event_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="field">
                                        <label>Mulai Pendataran Kompetisi</label>
                                        <div class="control">
                                            <input step="1" type="datetime-local" class="input @error('start_regis') is-validate @enderror" name="start_regis">                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="field">
                                        <label>Tutup Pendaftaran Kompetisi</label>
                                        <div class="control">
                                            <input step="1" type="datetime-local" class="input @error('start_regis') is-validate @enderror" name="close_regis">                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="field">
                                        <label>Jenis Kompetisi</label>
                                        <div class="control">
                                            <div class="h-select">
                                                <div class="select-box">
                                                    <span id="current_type"></span>
                                                </div>
                                                <div class="select-icon">
                                                    <i data-feather="chevron-down"></i>
                                                </div>
                                                <div class="select-drop has-slimscroll-sm">
                                                    <div class="drop-inner">
                                                        <div class="option-row">
                                                            <input type="radio" value="Tim" name="event_type">
                                                            <div class="option-meta">
                                                                <span>Tim</span>
                                                            </div>
                                                        </div>
                                                        <div class="option-row">
                                                            <input type="radio" value="solo" name="event_type">
                                                            <div class="option-meta">
                                                                <span>Solo</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="field">
                                        <label>Jumlah Anggota Tim</label>
                                        <div class="control">
                                            <input type="number" class="input @error('max_member') is-validate @enderror" name="max_member">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-12">
                                    <div class="field">
                                        <label>Ganti Avatar Kompetisi</label>
                                        <label for="choose-file" class="column is-12 input custom-file-upload dark-inverted dark-text has-text-centered" id="choose-file-label">
                                            <i class="fa fa-cloud-upload-alt"></i>
                                            Pilih Gambar
                                        </label>
                                        <input name="image_event" type="file" id="choose-file" style="display: none;" />
                                    </div>
                                </div>
                                <div class="column is-12">
                                    <div class="field">
                                        <label>Harga Pendaftaran</label>
                                        <div class="control">
                                            <input class="input @error('price') is-validate @enderror" type="text" name="price" id="price"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-12">
                                    <div class="field">
                                        <label>Deskripsi Kompetisi</label>
                                        <div class="control">
                                            <textarea class="textarea @error('description') is-validate @enderror" name="description" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-12">
                                    <div class="field">
                                        <label>Coming Soon</label>
                                        <div class="control">
                                            <div class="h-select">
                                                <div class="select-box">
                                                    <span id="current_status"></span>
                                                </div>
                                                <div class="select-icon">
                                                    <i data-feather="chevron-down"></i>
                                                </div>
                                                <div class="select-drop has-slimscroll-sm">
                                                    <div class="drop-inner">
                                                        <div class="option-row">
                                                            <input type="radio" value="1" name="cm_soon">
                                                            <div class="option-meta">
                                                                <span>Aktif</span>
                                                            </div>
                                                        </div>
                                                        <div class="option-row">
                                                            <input type="radio" value="0" name="cm_soon">
                                                            <div class="option-meta">
                                                                <span>Tidak Aktif</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-12">
                                    <p>
                                        N.B: Kosongkan jumlah anggota tim jika jenis lomba solo & untuk donor darah jangan ubah selain tanggal.
                                    </p>
                                </div>
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

    <script>
        $(document).on("click", "#edit-event", function () {
            var event = $(this).data('event');
            if(event.cm_soon == 1){
                var status = "Aktif";
            }else{
                var status = "Tidak Aktif";
            }
            var start_regis = new Date(event.start_regis);
            var close_regis = new Date(event.close_regis);
            var dateTimeLocalValue_start = (new Date(start_regis.getTime() - start_regis.getTimezoneOffset() * 60000).toISOString()).slice(0, -1);
            var dateTimeLocalValue_close = (new Date(close_regis.getTime() - close_regis.getTimezoneOffset() * 60000).toISOString()).slice(0, -1);
            $('input[name="event_code"]').val(event.event_code);
            $('input[name="event_name"]').val(event.event_name);
            $('input[name="start_regis"]').val(dateTimeLocalValue_start);
            $('input[name="close_regis"]').val(dateTimeLocalValue_close);
            $('textarea[name="description"]').val(event.description);
            $('#current_type').text(event.event_type);
            $('input[name="max_member"]').val(event.max_member);
            $('input[name="price"]').val(event.price);
            $('#current_status').text(status);
        });

        $(document).ready(function () {
            $('#choose-file').change(function () {
                var i = $(this).prev('label').clone();
                var file = $('#choose-file')[0].files[0].name;
                $(this).prev('label').text(file);
            }); 
        });

        var rupiah = document.getElementById('price');
        rupiah.addEventListener('keyup', function(e){
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
        
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split    = number_string.split(','),
                sisa     = split[0].length % 3,
                rupiah     = split[0].substr(0, sisa),
                ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
    @if(session('notif'))
        <script>
            $(document).ready(function () {
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
                });
                notyf.success("{{ session('notif') }}");
            });
        </script>
    @endif
</x-layouts.app>