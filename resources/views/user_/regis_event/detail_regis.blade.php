@section('title', $data_tim->team_name)
<x-layouts.app>
    <form action="{{ route('logout') }}" method="post" class="is-hidden" id="logout">@csrf</form>
    <div id="ifst-app" class="app-wrapper">

        <div class="app-overlay"></div>
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        @include('user_/slice_/sidehead')

        <div class="view-wrapper" data-naver-offset="274" data-menu-item="#regis_event-sidebar-menu" data-mobile-item="#regis_event-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">

                        <div class="title-wrap">
                            <h1 class="title is-4">Detail Tim</h1>
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

                    <div class="page-content-inner project-details">

                        <div class="tabs-wrapper  is-triple-slider">
                            <div class="tabs-inner">
                                <div class="tabs">
                                    <ul>
                                        <li data-tab="project-tab" class="is-active"><a><span>Tim</span></a></li>
                                        @if($data_tim->id_event == 'i2c')
                                            @if($data_tim->team_member()->count() == ($event_dt->max_member - 1))
                                                <li data-tab="tasks-tab"><a><span>Tasks</span></a></li>
                                            @else
                                                <style>
                                                    .pj-tab{
                                                        width: 100%!important;
                                                    }
                                                    .tabs-wrapper.is-triple-slider .tabs li, .tabs-wrapper-alt.is-triple-slider .tabs li.tab-naver{
                                                        width: 100%!important;
                                                    }
                                                </style>
                                            @endif
                                        @else
                                            <li data-tab="tasks-tab"><a><span>Tasks</span></a></li>
                                        @endif
                                        <li class="tab-naver"></li>
                                    </ul>
                                </div>
                            </div>


                            <div id="project-tab" class="tab-content is-active">
                                <div class="columns project-details-inner">
                                    <div class="column is-8">
                                        <div class="project-details-card">
                                            <div class="card-head">
                                                <div class="title-wrap">
                                                    <h3>{{ $data_tim->team_name }}</h3>
                                                    <p>{{ $data_tim->event->event_name }}</p>
                                                </div>
                                                @if($data_tim->status == '0' && $count_task == count($task_team))
                                                <div class="dropdown is-spaced is-dots is-right">
                                                    <span class="dark-inverted hint--top hint--rounded hint--bounce" id="mn-verif" aria-label="Minta Verifikasi Tim" data-id_team="{{ $data_tim->team_id }}" data-id_event="{{ $data_tim->id_event }}" data-message="Tim meminta verifikasi!">
                                                        <i data-feather="send"></i>
                                                    </span>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="project-files">
                                                <h4>Detail Tim</h4>
                                                <div class="columns is-multiline">
                                                    <div class="column is-12">
                                                        <div class="file-box">
                                                            <span class="dark-inverted">
                                                                <i data-feather="user"></i>
                                                            </span>
                                                            <div class="meta">
                                                                <span>Nama Pemimpin Tim</span>
                                                                <span>{{ $data_tim->owner->fullname }}</span>
                                                            </div>
                                                            <div class="dropdown is-spaced is-dots is-right end-action">
                                                                <div class="is-trigger h-modal-trigger modal-member" data-modal="modal-member-view" data-member="{{ $data_tim->owner }}">
                                                                    <i data-feather="eye"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column is-12">
                                                        <div class="file-box">
                                                            <span class="dark-inverted">
                                                                <i data-feather="map-pin"></i>
                                                            </span>
                                                            <div class="meta">
                                                                <span>Asal Institusi</span>
                                                                <span>{{ $data_tim->asal_ins }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column is-12">
                                                        <div class="file-box">
                                                            <span class="dark-inverted">
                                                                <i data-feather="navigation"></i>
                                                            </span>
                                                            <div class="meta">
                                                                <span>Alamat Institusi</span>
                                                                <span>{{ $data_tim->alamat_ins }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column is-12">
                                                        <div class="file-box">
                                                            <span class="dark-inverted">
                                                                <i data-feather="clock"></i>
                                                            </span>
                                                            <div class="meta">
                                                                <span>Status Tim</span>
                                                                <span>
                                                                    @if($data_tim->status == '1')
                                                                        Terverifikasi
                                                                    @elseif($data_tim->status == '0')
                                                                        Belum Terverifikasi
                                                                    @else
                                                                        Mengundurkan Diri/Blacklist
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <div class="dropdown is-spaced is-dots is-right end-action">
                                                                <div class="is-trigger">
                                                                    @if($data_tim->status == '1')
                                                                        <i data-feather="check-circle"></i>
                                                                    @elseif($data_tim->status == '0')
                                                                    <span class="hint--default hint--rounded hint--top" data-hint="Status diperbarui 1x24 jam.">
                                                                        <i data-feather="help-circle"></i>
                                                                    </span>
                                                                    @else
                                                                        <i data-feather="slash"></i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="column is-4">
                                        <div class="side-card">
                                            <h4 @if($data_tim->id_event == 'wdc')class="hint--default hint--rounded hint--top" data-hint="Kompetisi ini diperbolehkan sendiri ataupun tim." @endif>Anggota Tim</h4>
                                            <div class="media-flex-center">
                                                <div class="h-avatar is-small dark-inverted">
                                                    <i data-feather="user"></i>
                                                </div>
                                                <div class="flex-meta">
                                                    <span>{{$data_tim->owner->fullname}}</span>
                                                    <span>( Pemimpin Tim )</span>
                                                    <span style="font-family: 'Roboto',sans-serif;color: #a2a5b9;font-size: .9rem">{{$data_tim->owner->no_telpon}}</span>
                                                </div>
                                                <div class="dropdown is-spaced is-dots is-right end-action is-hidden-mobile" style="right: 70px!important;position: absolute;">
                                                    <div class="is-trigger h-modal-trigger modal-member" data-modal="modal-member-view" data-member="{{ $data_tim->owner }}">
                                                        <i data-feather="eye"></i>
                                                    </div>
                                                </div>
                                                <div class="dropdown is-spaced is-dots is-right end-action is-hidden-tablet is-hidden-dekstop" style="right: 40px!important;position: absolute;">
                                                    <div class="is-trigger h-modal-trigger modal-member" data-modal="modal-member-view" data-member="{{ $data_tim->owner }}">
                                                        <i data-feather="eye"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(count($anggota_team)>0)
                                            @foreach($anggota_team as $anggota)
                                                <div class="media-flex-center">
                                                    <div class="h-avatar is-small dark-inverted">
                                                        <i data-feather="user"></i>
                                                    </div>
                                                    <div class="flex-meta">
                                                        <span>{{$anggota->nama_anggota}}</span>
                                                        <span>{{$anggota->no_telp}}</span>
                                                    </div>
                                                    <div class="dropdown is-spaced is-dots is-right end-action is-hidden-mobile" style="right: 70px!important;position: absolute;">
                                                        <div class="is-trigger h-modal-trigger modal-member" data-modal="modal-member-view" data-member="{{ $anggota }}">
                                                            <i data-feather="eye"></i>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown is-spaced is-dots is-right end-action is-hidden-tablet is-hidden-dekstop" style="right: 40px!important;position: absolute;">
                                                        <div class="is-trigger h-modal-trigger modal-member" data-modal="modal-member-view" data-member="{{ $anggota }}">
                                                            <i data-feather="eye"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @else
                                                <p class="has-text-centered">Anggota Tim Belum Ada.<br>@if($data_tim->id_event == 'wdc' || $data_tim->id_event == 'muc') (Kompetisi ini diperbolehkan sendiri) @endif</p>
                                            @endif
                                            @if(count($anggota_team) < ($data_tim->event->max_member - 1))
                                                <a data-modal="tambah-anggota-tim" class="button button-h is-primary h-modal-trigger m-t-10" style="width: 100%;">
                                                    <i data-feather="plus"></i>
                                                    Tambah Anggota Tim
                                                </a>
                                            @endif
                                        </div>

                                        <div class="side-card">
                                            <h4>Pendamping Tim</h4>
                                            <div class="media-flex-center">
                                                <div class="h-avatar is-small dark-inverted">
                                                    <i data-feather="user"></i>
                                                </div>
                                                <div class="flex-meta">
                                                    <span>{{ $data_tim->nama_pendamping }}</span>
                                                    <span>{{ $data_tim->no_hp }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tasks-tab" class="tab-content">
                                <div class="project-details-inner">
                                    <div class="task-grid">

                                        <div class="grid-header">
                                            <h3>Tasks</h3>
                                        </div>

                                        <div class="columns is-multiline">
                                            <!--Task-->
                                            @foreach($task_type as $all_task)
                                                @php
                                                    $attachments = [];
                                                @endphp
                                                @foreach($task_team as $taskget)
                                                    @php array_push($attachments, $taskget->task_id) @endphp
                                                @endforeach
                                                @if(now() <= $all_task->close_task)
                                                    @if($data_tim->status == "1" && $all_task->condition_task == "Terverifikasi")
                                                        <div class="column is-4">
                                                            <div class="task-card right-panel-trigger" data-panel="task-panel-{{ $all_task->task_id }}">
                                                                <a href="#" class="title-wrap">
                                                                    <h3>{{ $all_task->task_name }}</h3>
                                                                </a>
                                                                <div class="content-wrap">
                                                                    <div class="left">
                                                                        <div class="attachments">
                                                                            <i class="lnil lnil-paperclip"></i>
                                                                            @foreach($task_team as $taskget)
                                                                                @if($taskget->task_id === $all_task->task_id)
                                                                                <span>1 attachments</span>
                                                                                @endif
                                                                            @endforeach
                                                                            @if(!in_array($all_task->task_id, $attachments))
                                                                                <span>0 attachments</span>
                                                                            @endif
                                                                            </div>
                                                                    </div>
                                                                    <div class="right">
                                                                        <div class="circle-chart-wrapper is-info" data-completion="0">
                                                                            <svg class="circle-chart" viewBox="0 0 45 45" width="60" height="60" xmlns="http://www.w3.org/2000/svg">
                                                                                <circle class="circle-chart__background" stroke-width="5" fill="none" cx="50%" cy="50%" r="15.91549431" />
                                                                                <circle class="circle-chart__circle" stroke-width="5" stroke-dasharray="
                                                                                @foreach($task_team as $taskget)
                                                                                    @if($taskget->task_id === $all_task->task_id)
                                                                                    100
                                                                                    @endif
                                                                                @endforeach
                                                                                @if(!in_array($all_task->task_id, $attachments))
                                                                                    0
                                                                                @endif
                                                                                ,100" stroke-linecap="round" fill="none" cx="50%" cy="50%" r="15.91549431" />
                                                                            </svg> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif($all_task->condition_task == null)
                                                        <div class="column is-4">
                                                            <div class="task-card right-panel-trigger" data-panel="task-panel-{{ $all_task->task_id }}">
                                                                <a href="#" class="title-wrap">
                                                                    <h3>{{ $all_task->task_name }}</h3>
                                                                </a>
                                                                <div class="content-wrap">
                                                                    <div class="left">
                                                                        <div class="attachments">
                                                                            <i class="lnil lnil-paperclip"></i>
                                                                            @foreach($task_team as $taskget)
                                                                                @if($taskget->task_id === $all_task->task_id)
                                                                                <span>1 attachments</span>
                                                                                @endif
                                                                            @endforeach
                                                                            @if(!in_array($all_task->task_id, $attachments))
                                                                                <span>0 attachments</span>
                                                                            @endif
                                                                            </div>
                                                                    </div>
                                                                    <div class="right">
                                                                        <div class="circle-chart-wrapper is-info" data-completion="0">
                                                                            <svg class="circle-chart" viewBox="0 0 45 45" width="60" height="60" xmlns="http://www.w3.org/2000/svg">
                                                                                <circle class="circle-chart__background" stroke-width="5" fill="none" cx="50%" cy="50%" r="15.91549431" />
                                                                                <circle class="circle-chart__circle" stroke-width="5" stroke-dasharray="
                                                                                @foreach($task_team as $taskget)
                                                                                    @if($taskget->task_id === $all_task->task_id)
                                                                                    100
                                                                                    @endif
                                                                                @endforeach
                                                                                @if(!in_array($all_task->task_id, $attachments))
                                                                                    0
                                                                                @endif
                                                                                ,100" stroke-linecap="round" fill="none" cx="50%" cy="50%" r="15.91549431" />
                                                                            </svg> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    @foreach ($task_type as $task_detail)
                    @if(now() <= $task_detail->close_task)
                    <div id="task-panel-{{ $task_detail->task_id }}" class="right-panel-wrapper is-task">
                        <div class="panel-overlay"></div>

                        <div class="right-panel">
                            <div class="right-panel-head">
                                <h3>Task Details</h3>
                                <a class="close-panel">
                                    <i data-feather="chevron-right"></i>
                                </a>
                            </div>
                            <div class="right-panel-body has-slimscroll">

                                <div class="task-group task-overview">

                                    <h3>Overview</h3>

                                    <div class="task-description">
                                        <h4>{{ $task_detail->task_name }}</h4>
                                        <p>@php print_r($task_detail->task_description) @endphp (Batas maksimal ukuran file {{ $task_detail->size }}MB)<br>Batas pengumpulan task: <b>{{ $task_detail->close_task }}<b></p>
                                        @foreach($task_team as $dt_task)
                                            @if($dt_task->task_id === $task_detail->task_id)
                                                <p>Diunggah pada {{ $dt_task->created_at }}</p>
                                                <p>Diupdate pada {{ $dt_task->updated_at }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="task-group" style="border-bottom: none">
                                    <h3>Files</h3>
                                    @foreach($task_team as $dt_task)
                                        @if($dt_task->task_id === $task_detail->task_id)
                                            <div class="task-files">
                                                <div class="file-box">
                                                    <img src="{{ asset('public_/img/icons/files/doc.svg') }}" alt="">
                                                    <div class="meta">
                                                        <span>{{ $dt_task->task_name }}</span>
                                                        <span>{{substr(filesize('storage/'.$dt_task->task_location.'/'.$dt_task->task_name)/1048576, 0, 5)}} MB</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{env('APP_URL')}}/user/regis_event/{{ $data_tim->id_event }}/delete_task" id="delete_task_{{ $dt_task->task_id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="task_id" value="{{ $dt_task->task_id }}">
                                                <input type="hidden" name="team_id" value="{{ $data_tim->team_id }}">
                                            </form>
                                            <button onclick="$('#delete_task_{{ $dt_task->task_id }}').submit()" class="button button-h is-danger m-t-10" style="width: 100%;">
                                                Hapus File
                                            </button>
                                        @endif
                                    @endforeach
                                    @if(!in_array($task_detail->task_id, $attachments))
                                        <p class="has-text-centered">Belum Ada Task Yang Diupload</p>
                                        <form action="{{env('APP_URL')}}/user/regis_event/{{ $data_tim->id_event }}/save_task" method="post">
                                            @csrf
                                            <input type="hidden" name="team_id" value="{{ $data_tim->team_id }}">
                                            <input type="hidden" name="task_id" value="{{ $task_detail->task_id }}">
                                            <div class="control">
                                                <input type="file" class="task_file_{{$task_detail->task_id}} m-t-10" name="task_file" id="task_file_{{$task_detail->task_id}}"
                                                    data-allow-reorder="true" data-max-file-size="{{ $task_detail->size }}MB" data-max-files="1" accepted-file-types="{{ $task_detail->format }}" required>
                                            </div>
                                            <script>
                                                FilePond.registerPlugin(FilePondPluginFileValidateSize)
                                                FilePond.registerPlugin(FilePondPluginFileValidateType);
                                                var pond = FilePond.create(document.querySelector('.task_file_{{$task_detail->task_id}}'),
                                                {
                                                    fileValidateTypeDetectType: (source, type) =>
                                                    new Promise((resolve, reject) => {
                                                        resolve(type);
                                                    }),
                                                    onaddfilestart: (file) => { 
                                                        $('#upload_task_kp_{{ $task_detail->task_id }}').attr("disabled", "disabled");
                                                    },
                                                    onprocessfile: (files) => { 
                                                        $('#upload_task_kp_{{ $task_detail->task_id }}').attr("disabled", "disabled");
                                                        if(files == null){
                                                            $('#upload_task_kp_{{ $task_detail->task_id }}').removeAttr("disabled");
                                                        }
                                                     }
                                                });
                                                FilePond.setOptions({
                                                    server: {
                                                        url: '{{env("APP_URL")}}/user/regis_event/{{ $data_tim->id_event }}',
                                                        headers: {
                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                        },
                                                        process: '/upload_task',
                                                        revert: '/delete_task_tmp',
                                                    }
                                                })
                                            </script>
                                            <button type="submit" id="upload_task_kp_{{ $task_detail->task_id }}" class="button button-h is-primary m-t-5" style="width: 100%;">
                                                Upload File
                                            </button>
                                        </form>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div> 
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @if(count($anggota_team) <= 3)
    <div id="tambah-anggota-tim" class="modal h-modal is-small">
        <div class="modal-background h-modal-close"></div>
        <div class="modal-content">
            <form class="modal-card"  id="add_member_{{ $data_tim->team_id }}" action="{{env('APP_URL')}}/user/regis_event/{{ $data_tim->id_event }}/add_team_member" method="post">
                <header class="modal-card-head">
                    <h3>Tambah Anggota Tim</h3>
                    <a class="h-modal-close ml-auto" aria-label="close">
                        <i data-feather="x"></i>
                    </a>
                </header>
                <div class="modal-card-body">
                    <div class="inner-content">
                        <p class="danger-text">Data yang telah ditambah tidak bisa diubah, jadi pastikan data yang dimasukkan telah benar.</p>
                        <div class="modal-form">
                            @csrf
                            <input type="hidden" name="team_id" value="{{ $data_tim->team_id }}">
                            <div class="field">
                                <label>Nama Lengkap</label>
                                <div class="control">
                                    <input type="text" name="nama_anggota" class="input @error('nama_anggota') is-validate @enderror" value="{{old('nama_anggota')}}" placeholder="Masukkan Nama Lengkap" required>
                                </div>
                                @error('nama_anggota')
                                    <div class="danger-text">Nama Lengkap anggota tim wajib diisi!</div>
                                @enderror
                            </div>
                            <div class="field">
                                <label>Nomor Identitas</label>
                                <div class="control">
                                    <input type="number" name="no_iden" class="input @error('no_iden') is-validate @enderror" value="{{old('no_iden')}}" placeholder="Masukkan Nomor Identitas" required>
                                </div>
                                @error('no_iden')
                                    <div class="danger-text">Nomor Identitas anggota tim wajib diisi!</div>
                                @enderror
                            </div>
                            <div class="field">
                                <label>Email</label>
                                <div class="control">
                                    <input type="email" name="email" class="input @error('email') is-validate @enderror" value="{{old('email')}}" placeholder="Masukkan Email" required>    
                                </div>
                                @error('email')
                                    <div class="danger-text">Email anggota tim wajib diisi!</div>
                                @enderror
                            </div>
                            @if($data_tim->id_event == 'wdc')
                            <div class="field">
                                <label>Asal Institusi</label>
                                <div class="control">
                                    <input type="text" name="asal_ins" class="input @error('asal_ins') is-validate @enderror" value="{{old('asal_ins')}}" placeholder="Masukkan Asal Institusi">    
                                </div>
                                <p>Kosongkan asal institusi jika satu institusi.</p>
                            </div>
                            <div class="field">
                                <label>Alamat Institusi</label>
                                <div class="control">
                                    <textarea name="alamat_ins" class="textarea">{{old('asal_ins')}}</textarea>    
                                </div>
                                <p>Kosongkan asal institusi jika satu institusi.</p>
                            </div>
                            @endif
                            <div class="field">
                                <label>Tanggal Lahir</label>
                                <div class="control">
                                    <input type="date" name="tgl_lahir" class="input @error('tgl_lahir') is-validate @enderror" value="{{old('tgl_lahir')}}" required>    
                                </div>
                                @error('tgl_lahir')
                                    <div class="danger-text">Tanggal Lahir anggota tim wajib diisi!</div>
                                @enderror
                            </div>
                            <div class="field">
                                <label>Nomor Handphone</label>
                                <div class="control">
                                    <input type="number" name="no_telp" class="input @error('no_telp') is-validate @enderror" value="{{old('no_telp')}}" placeholder="Masukkan Nomor Handphone" required>
                                </div>
                                @error('no_telp')
                                    <div class="danger-text">Nomor Handphone anggota tim wajib diisi!</div>
                                @enderror
                            </div>
                            <div class="field">
                                <label>ID Line</label>
                                <div class="control">
                                    <input type="text" name="id_line" class="input @error('id_line') is-validate @enderror" value="{{old('id_line')}}" placeholder="Masukkan ID Line" required>
                                </div>
                                @error('id_line')
                                    <div class="danger-text">ID Line anggota tim wajib diisi!</div>
                                @enderror
                            </div>
                            <div class="field">
                                <label>Instagram</label>
                                <div class="control">
                                    <input type="text" name="instagram" class="input @error('instagram') is-validate @enderror" value="{{old('instagram')}}" placeholder="Masukkan Instagram" required>
                                </div>
                                @error('instagram')
                                    <div class="danger-text">Instagram anggota tim wajib diisi!</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-card-foot is-end">
                    <a class="button h-button is-rounded h-modal-close">Batal</a>
                    <button type="submit" class="button h-button is-primary is-raised is-rounded">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    @endif
    
    <!-- view member -->
    <div id="modal-member-view" class="modal h-modal is-small">
        <div class="modal-background h-modal-close"></div>
        <div class="modal-content">
            <div class="modal-card">
                <header class="modal-card-head">
                    <h3 class="detail_text"></h3>
                    <button class="h-modal-close ml-auto" aria-label="close">
                        <i data-feather="x"></i>
                    </button>
                </header>
                <div class="modal-card-body">
                    <div class="inner-content">
                        <div class="modal-form">
                            <div class="field">
                                <label>Nama Lengkap</label>
                                <div class="control">
                                    <input type="text" name="nama_anggota_detail" class="input" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label>Nomor Identitas</label>
                                <div class="control">
                                    <input type="number" name="no_iden_detail" class="input" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label>Email</label>
                                <div class="control">
                                    <input type="email" name="email_detail" class="input" disabled>    
                                </div>
                            </div>
                            @if($data_tim->id_event == 'wdc')
                            <div class="field asal-ins">
                                <label>Asal Insitusi</label>
                                <div class="control">
                                    <input type="text" name="asal_ins_detail" class="input" disabled>    
                                </div>
                            </div>
                            <div class="field alamat-ins">
                                <label>Alamat Institusi</label>
                                <div class="control">
                                    <textarea name="alamat_ins_detail" class="textarea" disabled></textarea>    
                                </div>
                            </div>
                            @endif
                            <div class="field">
                                <label>Tanggal Lahir</label>
                                <div class="control">
                                    <input type="date" name="tgl_lahir_detail" class="input" disabled>    
                                </div>
                            </div>
                            <div class="field">
                                <label>Nomor Handphone</label>
                                <div class="control">
                                    <input type="number" name="no_telp_detail" class="input" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label>ID Line</label>
                                <div class="control">
                                    <input type="text" name="id_line_detail" class="input" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label>Instagram</label>
                                <div class="control">
                                    <input type="text" name="instagram_detail" class="input" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-card-foot is-end">
                    <a class="button h-button is-rounded h-modal-close">Tutup</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on("click", ".modal-member", function () {
            var data_detail = $(this).data('member');
            if(data_detail.nomor_id != null && data_detail.no_telpon != null){
                $('.detail_text').text('Detail Ketua/Pemimpin');
                $('.asal-ins').hide();
                $('.alamat-ins').hide();
                $('input[name="nama_anggota_detail"]').val(data_detail.fullname);
                $('input[name="no_iden_detail"]').val(data_detail.nomor_id);
                $('input[name="email_detail"]').val(data_detail.email);
                $('input[name="tgl_lahir_detail"]').val(data_detail.tgl_lahir);
                $('input[name="no_telp_detail"]').val(data_detail.no_telpon);
                $('input[name="id_line_detail"]').val(data_detail.id_line);
                $('input[name="id_line_detail"]').val(data_detail.id_line);
                $('input[name="instagram_detail"]').val(data_detail.instagram);
            }else{
                $('.detail_text').text('Detail Anggota');
                $('.asal-ins').show();
                $('.alamat-ins').show();
                $('input[name="nama_anggota_detail"]').val(data_detail.nama_anggota);
                $('input[name="no_iden_detail"]').val(data_detail.no_iden);
                $('input[name="email_detail"]').val(data_detail.email);
                $('input[name="asal_ins_detail"]').val(data_detail.asal_ins);
                $('textarea[name="alamat_ins_detail"]').val(data_detail.alamat_ins);
                $('input[name="tgl_lahir_detail"]').val(data_detail.tgl_lahir);
                $('input[name="no_telp_detail"]').val(data_detail.no_telp);
                $('input[name="id_line_detail"]').val(data_detail.id_line);
                $('input[name="instagram_detail"]').val(data_detail.instagram);
            }
        })
        
        $('#add_member_{{ $data_tim->team_id }}').submit(function() {
            $(this).find("button[type='submit']").prop('disabled',true);
            $(this).find("button[type='submit']").addClass('is-loading');
        });
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

    @if($errors->any())
        <script>
            $('#tambah-anggota-tim').toggleClass('is-active');
        </script>
    @endif
    @if(session('danger'))
        <script>
            $(document).ready(function () {
                notyf = new Notyf({
                    duration: 3000,
                    position: {
                    x: 'right',
                    y: 'bottom'
                    },
                    types: [{
                    type: 'error',
                    background: themeColors.error,
                    icon: {
                        className: 'fas fa-exclamation-triangle',
                        tagName: 'i',
                        text: ''
                    }
                    }]
                });
                notyf.open({
                    type: "error",
                    message: "{{ session('danger') }}"
                });
            });
        </script>
    @endif
    <script>
        $('#mn-verif').click(function() {
            var message = $(this).data('message');
            var id_team = $(this).data('id_team');
            var id_event = $(this).data('id_event');
            $.ajax({
                url: "{{env('APP_URL')}}/user/regis_event/{{ $data_tim->id_event }}/request/verif",
                type: "POST",
                data: {
                    id_team: id_team,
                    id_event: id_event,
                    message: message,
                    _token: "{{ csrf_token() }}"
                },
                success: function (data) {
                    if(data == 200){
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
                        notyf.success("Permintaan verifikasi berhasil dikirim");
                    }else if(data == "invalid"){
                        notyf = new Notyf({
                            duration: 3000,
                            position: {
                            x: 'right',
                            y: 'bottom'
                            },
                            types: [{
                            type: 'error',
                            background: themeColors.error,
                            icon: {
                                className: 'fas fa-exclamation-triangle',
                                tagName: 'i',
                                text: ''
                            }
                            }]
                        });
                        notyf.open({
                            type: "error",
                            message: "Permintaan verifikasi sudah dikirim!"
                        });
                    }else{
                        notyf = new Notyf({
                            duration: 3000,
                            position: {
                            x: 'right',
                            y: 'bottom'
                            },
                            types: [{
                            type: 'error',
                            background: themeColors.error,
                            icon: {
                                className: 'fas fa-exclamation-triangle',
                                tagName: 'i',
                                text: ''
                            }
                            }]
                        });
                        notyf.open({
                            type: "error",
                            message: "Permintaan verifikasi gagal dikirim"
                        });
                    }
                }
            });
        })
    </script>
</x-layouts.app>