@section('title', 'Detail')
<x-layouts.app>
    <form action="{{ route('logout') }}" method="post" class="is-hidden" id="logout">@csrf</form>
    <div id="ifst-app" class="app-wrapper">

        <div class="app-overlay"></div>
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        @include('admin_/slice_/sidehead')

        <div class="view-wrapper" data-naver-offset="214" data-menu-item="#i2c-sidebar-menu" data-mobile-item="#i2c-sidebar-menu-mobile">
            <div class="page-content-wrapper">
                <div class="page-content is-relative">
                    <div class="page-title has-text-centered">
                        
                        <a href="{{env('APP_URL')}}/su_admin/i2c" class="menu-toggle has-chevron">
                            <span class="icon-box-toggle active">
                                <span class="rotate">
                                    <i class="icon-line-top"></i>
                                    <i class="icon-line-center"></i>
                                    <i class="icon-line-bottom"></i>
                                </span>
                            </span>
                        </a>
                        <div class="title-wrap">
                            <h1 class="title is-4">I2C - Detail Tim</h1>
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
                                        <li data-tab="team-tab" class="is-active"><a><span>Tim</span></a></li>
                                        <li data-tab="tasks-tab"><a><span>Tasks</span></a></li>
                                        <li class="tab-naver"></li>
                                    </ul>
                                </div>
                            </div>


                            <div id="team-tab" class="tab-content is-active">
                                <div class="columns project-details-inner">
                                    <div class="column is-8">
                                        <div class="project-details-card">
                                            <div class="card-head">
                                                <div class="title-wrap">
                                                    <h3>{{ $data_team->team_name }}</h3>
                                                    <p>{{ $data_team->asal_ins }}</p>
                                                </div>
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
                                                                <span>{{ $data_team->owner->fullname }}</span>
                                                            </div>
                                                            <div class="dropdown is-spaced is-dots is-right end-action">
                                                                <div class="is-trigger h-modal-trigger modal-member" data-modal="modal-member-view" data-member="{{ $data_team->owner }}">
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
                                                                <span>{{ $data_team->asal_ins }}</span>
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
                                                                <span>{{ $data_team->alamat_ins }}</span>
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
                                                                    @if($data_team->status == '1')
                                                                        Terverifikasi
                                                                    @elseif($data_team->status == '0')
                                                                        Belum Terverifikasi
                                                                    @else
                                                                        Mengundurkan Diri/Blacklist
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <div class="dropdown is-spaced is-dots is-right end-action">
                                                                <div class="is-trigger">
                                                                    @if($data_team->status == '1')
                                                                        <i data-feather="check-circle"></i>
                                                                    @elseif($data_team->status == '0')
                                                                        <i data-feather="help-circle"></i>
                                                                    @else
                                                                        <i data-feather="slash"></i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if(Auth::user()->user_type == 'staff')
                                                        <div class="column is-hidden-mobile">
                                                            <div class="buttons">
                                                                @if($data_team->status == '0')
                                                                    <a href="{{env('APP_URL')}}/su_admin/i2c/team/verifikasi/{{ $data_team->team_id }}" class="button h-button is-success is-rounded">
                                                                        <span class="icon">
                                                                            <i class="fas fa-check"></i>
                                                                        </span>
                                                                        <span>Verifikasi</span>
                                                                    </a>
                                                                @elseif($data_team->status == '1')
                                                                    <a href="{{env('APP_URL')}}/su_admin/i2c/team/batal_verif/{{ $data_team->team_id }}" class="button h-button is-info is-rounded">
                                                                        <span class="icon">
                                                                            <i class="fas fa-times"></i>
                                                                        </span>
                                                                        <span>Batal Verifikasi</span>
                                                                    </a>
                                                                @endif
                                                                @if($data_team->status != 'bl')
                                                                    <a href="{{env('APP_URL')}}/su_admin/i2c/team/blacklist/{{ $data_team->team_id }}" class="button h-button is-danger is-rounded">
                                                                        <span class="icon">
                                                                            <i class="fas fa-ban"></i>
                                                                        </span>
                                                                        <span>Blacklist</span>
                                                                    </a>
                                                                @else
                                                                    <a href="{{env('APP_URL')}}/su_admin/i2c/team/batal_bl/{{ $data_team->team_id }}" class="button h-button is-info is-rounded">
                                                                        <span class="icon">
                                                                            <i class="fas fa-ban"></i>
                                                                        </span>
                                                                        <span>Batal Blacklist</span>
                                                                    </a>
                                                                @endif
                                                                <a href="{{env('APP_URL')}}/su_admin/i2c/team/hapus/{{ $data_team->team_id }}" class="button h-button is-danger is-rounded">
                                                                    <span class="icon">
                                                                        <i class="fas fa-times"></i>
                                                                    </span>
                                                                    <span>Hapus</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="column is-12 is-hidden-table is-hidden-desktop">
                                                            <div class="buttons">
                                                                @if($data_team->status == '0')
                                                                    <a href="{{env('APP_URL')}}/su_admin/i2c/team/verifikasi/{{ $data_team->team_id }}" class="button h-button is-success is-rounded" style="width: 100%">
                                                                        <span class="icon">
                                                                            <i class="fas fa-check"></i>
                                                                        </span>
                                                                        <span>Verifikasi</span>
                                                                    </a>
                                                                @elseif($data_team->status == '1')
                                                                    <a href="{{env('APP_URL')}}/su_admin/i2c/team/batal_verif/{{ $data_team->team_id }}" class="button h-button is-info is-rounded" style="width: 100%">
                                                                        <span class="icon">
                                                                            <i class="fas fa-times"></i>
                                                                        </span>
                                                                        <span>Batal Verifikasi</span>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="column is-12 is-hidden-table is-hidden-desktop">
                                                            <div class="buttons">
                                                                @if($data_team->status != 'bl')
                                                                    <a href="{{env('APP_URL')}}/su_admin/i2c/team/blacklist/{{ $data_team->team_id }}" class="button h-button is-danger is-rounded" style="width: 100%">
                                                                        <span class="icon">
                                                                            <i class="fas fa-ban"></i>
                                                                        </span>
                                                                        <span>Blacklist</span>
                                                                    </a>
                                                                @else
                                                                    <a href="{{env('APP_URL')}}/su_admin/i2c/team/batal_bl/{{ $data_team->team_id }}" class="button h-button is-info is-rounded" style="width: 100%">
                                                                        <span class="icon">
                                                                            <i class="fas fa-ban"></i>
                                                                        </span>
                                                                        <span>Batal Blacklist</span>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="column is-12 is-hidden-table is-hidden-desktop">
                                                            <div class="buttons">
                                                                <a href="{{env('APP_URL')}}/su_admin/i2c/team/hapus/{{ $data_team->team_id }}" class="button h-button is-danger is-rounded" style="width: 100%">
                                                                    <span class="icon">
                                                                        <i class="fas fa-times"></i>
                                                                    </span>
                                                                    <span>Hapus</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <div class="column is-4">
                                    <div class="side-card">
                                        <h4>Anggota Tim</h4>
                                        <div class="media-flex-center">
                                            <div class="h-avatar is-small dark-inverted">
                                                <i data-feather="user"></i>
                                            </div>
                                            <div class="flex-meta">
                                                <span>{{$data_team->owner->fullname}}</span>
                                                <span>( Pemimpin Tim )</span>
                                                <span style="font-family: 'Roboto',sans-serif;color: #a2a5b9;font-size: .9rem">{{$data_team->owner->no_telpon}}</span>
                                            </div>
                                            <div class="dropdown is-spaced is-dots is-right end-action is-hidden-mobile" style="right: 70px!important;position: absolute;">
                                                <div class="is-trigger h-modal-trigger modal-member" data-modal="modal-member-view" data-member="{{ $data_team->owner }}">
                                                    <i data-feather="eye"></i>
                                                </div>
                                            </div>
                                            <div class="dropdown is-spaced is-dots is-right end-action is-hidden-tablet is-hidden-dekstop" style="right: 40px!important;position: absolute;">
                                                <div class="is-trigger h-modal-trigger modal-member" data-modal="modal-member-view" data-member="{{ $data_team->owner }}">
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
                                        @endif
                                    </div>

                                    <div class="side-card">
                                        <h4>Pendamping</h4>
                                        <div class="media-flex-center">
                                            <div class="h-avatar is-small dark-inverted">
                                                <i data-feather="user"></i>
                                            </div>
                                            <div class="flex-meta">
                                                <span>{{ $data_team->nama_pendamping }}</span>
                                                <span>{{ $data_team->no_hp }}</span>
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
                                        <div class="filter">
                                            <span>Filter by</span>
                                            <div class="control">
                                                <div class="h-select">
                                                    <div class="select-box">
                                                        <span>Semua Task</span>
                                                    </div>
                                                    <div class="select-icon">
                                                        <i data-feather="chevron-down"></i>
                                                    </div>
                                                    <div class="select-drop has-slimscroll-sm">
                                                        <div class="drop-inner">
                                                            <div class="option-row">
                                                                <input type="radio" onclick="filterSelection('all')" name="task_select" checked>
                                                                <div class="option-meta">
                                                                    <span>Semua</span>
                                                                </div>
                                                            </div>
                                                            <div class="option-row">
                                                                <input type="radio" onclick="filterSelection('nt')" name="task_select">
                                                                <div class="option-meta">
                                                                    <span>Belum dikumpul</span>
                                                                </div>
                                                            </div>
                                                            <div class="option-row">
                                                                <input type="radio" onclick="filterSelection('ss')" name="task_select">
                                                                <div class="option-meta">
                                                                    <span>Sudah dikumpul</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="columns is-multiline">
                                        <!--Task-->
                                        @foreach($task_type as $all_task)
                                        @php
                                            $attachments = [];
                                        @endphp
                                        <div class="column is-4 filterDiv @foreach($task_team as $taskget) @php array_push($attachments, $taskget->task_id) @endphp @if($taskget->task_id === $all_task->task_id) ss @endif @endforeach @if(!in_array($all_task->task_id, $attachments))nt @endif
                                        ">
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
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    @foreach ($task_type as $task_detail)
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
                                        <p>@php print_r($task_detail->task_description) @endphp<br>Batas pengumpulan task: <b>{{ $task_detail->close_task }}<b></p>
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
                                                    <span class="hint--primary hint--bubble hint--top" data-hint="{{$dt_task->task_name}}">
                                                        @if(strlen($dt_task->task_name) > 30)
                                                            {{ substr($dt_task->task_name, 0, 30) }}...
                                                        @else
                                                            {{ $dt_task->task_name }}
                                                        @endif
                                                    </span>
                                                    <span>{{substr(filesize('storage/'.$dt_task->task_location.'/'.$dt_task->task_name)/1048576, 0, 5)}} MB</span>
                                                </div>
                                                <div class="dropdown is-spaced is-dots is-right dropdown-trigger end-action">
                                                    <div class="is-trigger" aria-haspopup="true">
                                                        <i data-feather="more-vertical"></i>
                                                    </div>
                                                    <div class="dropdown-menu" role="menu">
                                                        <div class="dropdown-content">
                                                            <a href="{{ asset('storage/task_i2c/'.$dt_task->team_id.'/'.str_replace('#', '%23', $dt_task->task_name)) }}" class="dropdown-item is-media">
                                                                <div class="icon">
                                                                    <i class="lnil lnil-cloud-download"></i>
                                                                </div>
                                                                <div class="meta">
                                                                    <span>Unduh</span>
                                                                    <span>Unduh file</span>
                                                                </div>
                                                            </a>
                                                            <a href="{{ asset('storage/task_i2c/'.$dt_task->team_id.'/'.str_replace('#', '%23', $dt_task->task_name)) }}" target="_blank" class="dropdown-item is-media">
                                                                <div class="icon">
                                                                    <i class="lnil lnil-checkmark-circle"></i>
                                                                </div>
                                                                <div class="meta">
                                                                    <span>Lihat Task</span>
                                                                    <span>Lihat file</span>
                                                                </div>
                                                            </a>
                                                            @if(Auth::user()->user_type == 'staff')
                                                            <hr class="dropdown-divider">
                                                            <form action="{{env('APP_URL')}}/su_admin/i2c/team/{{$data_team->team_id}}/delete_task/{{ $dt_task->task_id }}" method="post" id="task_code_{{$dt_task->task_id}}">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <a onclick="initConfirm('Hapus Task', 'Apakah anda yakin? Task tim yang sudah di hapus tidak dapat di kembalikan', false, false, 'Hapus', 'Batal', function (closeEvent) {$('#task_code_{{ $dt_task->task_id }}').submit();})" class="dropdown-item is-media">
                                                                <div class="icon">
                                                                    <i class="lnil lnil-trash-can-alt-1"></i>
                                                                </div>
                                                                <div class="meta">
                                                                    <span>Hapus</span>
                                                                    <span>Hapus file</span>
                                                                </div>
                                                            </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                    @if(!in_array($task_detail->task_id, $attachments))
                                        <p class="has-text-centered">Task yang diupload belum ada.</p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div> 
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>

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
                                    <input type="text" name="nama_anggota" class="input" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label>Nomor Identitas</label>
                                <div class="control">
                                    <input type="number" name="no_iden" class="input" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label>Email</label>
                                <div class="control">
                                    <input type="email" name="email" class="input" disabled>    
                                </div>
                            </div>
                            <div class="field">
                                <label>Tanggal Lahir</label>
                                <div class="control">
                                    <input type="date" name="tgl_lahir" class="input" disabled>    
                                </div>
                            </div>
                            <div class="field">
                                <label>Nomor Handphone</label>
                                <div class="control">
                                    <input type="number" name="no_telp" class="input" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label>ID Line</label>
                                <div class="control">
                                    <input type="text" name="id_line" class="input" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label>Instagram</label>
                                <div class="control">
                                    <input type="text" name="instagram" class="input" disabled>
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
                $('input[name="nama_anggota"]').val(data_detail.fullname);
                $('input[name="no_iden"]').val(data_detail.nomor_id);
                $('input[name="email"]').val(data_detail.email);
                $('input[name="tgl_lahir"]').val(data_detail.tgl_lahir);
                $('input[name="no_telp"]').val(data_detail.no_telpon);
                $('input[name="id_line"]').val(data_detail.id_line);
                $('input[name="instagram"]').val(data_detail.instagram);
            }else{
                $('.detail_text').text('Detail Anggota');
                $('input[name="nama_anggota"]').val(data_detail.nama_anggota);
                $('input[name="no_iden"]').val(data_detail.no_iden);
                $('input[name="email"]').val(data_detail.email);
                $('input[name="tgl_lahir"]').val(data_detail.tgl_lahir);
                $('input[name="no_telp"]').val(data_detail.no_telp);
                $('input[name="id_line"]').val(data_detail.id_line);
                $('input[name="instagram"]').val(data_detail.instagram);
            }
        })
        var hash = location.hash.substr(1);
        if(hash == 'task-tab'){
            $('[data-tab=team-tab]').removeClass('is-active');
            $("#tasks-tab").addClass('is-active');
            $("#team-tab").removeClass('is-active');
            $('[data-tab=tasks-tab]').addClass('is-active');
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

    <script>
        filterSelection("all")
        function filterSelection(c) {
            var x = document.getElementsByClassName("filterDiv");
            if(c == 'ss'){
                $('.ss').fadeIn()
                $('.nt').fadeOut()
            }else if(c == 'nt'){
                $('.nt').fadeIn()
                $('.ss').fadeOut() 
            }else{
                $('.nt').fadeIn()
                $('.ss').fadeIn() 
            }
        }
    </script>
</x-layouts.app>