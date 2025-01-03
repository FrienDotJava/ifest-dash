<nav class="navbar mobile-navbar no-shadow is-hidden-desktop is-hidden-tablet" aria-label="main navigation">
    <div class="container">
        <!-- Brand -->
        <div class="navbar-brand">
            <!-- Mobile menu toggler icon -->
            <div class="brand-start">
                <div class="navbar-burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <a class="navbar-item is-brand" href="/">
                <img class="light-image" src="{{ asset('images/ifest.png') }}" alt="">
                <img class="dark-image" src="{{ asset('images/ifest.png') }}" alt="">
            </a>

            <div class="brand-end">
                <div class="navbar-item has-dropdown is-notification is-hidden-tablet is-hidden-desktop">
                    <a class="navbar-link is-arrowless" href="javascript:void(0);">
                        <i data-feather="bell"></i>
                        @if(count($notification) > 0)
                            <span class="new-indicator pulsate"></span>
                        @endif
                    </a>
                    <div class="navbar-dropdown is-boxed is-right">
                        <div class="heading">
                            <div class="heading-left">
                                <h6 class="heading-title">Notifikasi</h6>
                            </div>
                        </div>
                        <div class="inner has-slimscroll">

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
                <div class="dropdown is-right is-spaced dropdown-trigger user-dropdown">
                    <div class="is-trigger" aria-haspopup="true">
                        <div class="profile-avatar">
                            <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="{{ asset('storage/'.Auth::user()->foto) }}" alt="">
                        </div>
                    </div>
                    <div class="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <div class="dropdown-head">
                                <div class="h-avatar is-large">
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="{{ asset('storage/'.Auth::user()->foto) }}" alt="">
                                </div>
                                <div class="meta">
                                    <span>{{ Auth::user()->fullname }}</span>
                                    <span>{{ Auth::user()->user_type }}</span>
                                </div>
                            </div>
                            <a href="{{env('APP_URL')}}/su_admin/profil" class="dropdown-item is-media">
                                <div class="icon">
                                    <i class="lnil lnil-user-alt"></i>
                                </div>
                                <div class="meta">
                                    <span>Profil</span>
                                    <span>Lihat profil</span>
                                </div>
                            </a>
                            @if(Auth::user()->user_type == 'superuser')
                            <a href="{{env('APP_URL')}}/su_admin/pengaturan_web" class="dropdown-item is-media">
                                <div class="icon">
                                    <i class="lnil lnil-cog"></i>
                                </div>
                                <div class="meta">
                                    <span>Pengaturan</span>
                                    <span>Pengaturan Web</span>
                                </div>
                            </a>
                            @endif
                            <div class="dropdown-item is-button">
                                <button class="button h-button is-primary is-raised is-fullwidth logout-button" onclick="$('#logout').submit()">
                                    <span class="icon is-small">
                                            <i data-feather="log-out"></i>
                                        </span>
                                    <span>Keluar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>
<div class="mobile-main-sidebar">
    <div class="inner">
        <ul class="icon-side-menu">
            <li>
                <a href="{{env('APP_URL')}}/su_admin/dashboard" id="home-sidebar-menu-mobile" data="dashboard">
                    <i data-feather="home"></i>
                </a>
            </li>
            <li>
                <a href="{{env('APP_URL')}}/su_admin/i2c" id="i2c-sidebar-menu-mobile" data="i2c" class="hint--info hint--bubble hint--top" data-hint="I2C">
                    <div class="h-icon is-info is-rounded">
                        <i data-feather="users"></i>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{env('APP_URL')}}/su_admin/wdc" id="wdc-sidebar-menu-mobile" data="wdc" class="hint--primary hint--bubble hint--top" data-hint="WDC">
                    <div class="h-icon is-purple is-rounded">
                        <i data-feather="users"></i>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{env('APP_URL')}}/su_admin/muc" id="muc-sidebar-menu-mobile" data="muc" class="hint--success hint--bubble hint--top" data-hint="muc">
                    <div class="h-icon is-success is-rounded">
                        <i data-feather="users"></i>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{env('APP_URL')}}/su_admin/donor_darah" id="dcr-sidebar-menu-mobile" data="dcr" class="hint--error hint--bubble hint--top" data-hint="dcr">
                    <div class="h-icon is-danger is-rounded">
                        <i data-feather="users"></i>
                    </div>
                </a>
            </li>
            @if(Auth::user()->user_type == 'superuser' && Auth::user()->email != 'adminph@gmail.com')
            <li>
                <a href="{{env('APP_URL')}}/su_admin/users" id="users-sidebar-menu-mobile" data="users" class="hint--default hint--bubble hint--top" data-hint="USER">
                    <i class="sidebar-svg" data-feather="users"></i>
                </a>
            </li>
            @endif
        </ul>

        <ul class="bottom-icon-side-menu">
            <li>
                <a href="javascript:" class="right-panel-trigger" data-panel="search-panel">
                    <i data-feather="search"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<div id="circular-menu" class="circular-menu">

    <a class="floating-btn" onclick="document.getElementById('circular-menu').classList.toggle('active');">
        <i class="fas fa-bars"></i>
        <i class="fas fa-times"></i>
    </a>

    <div class="items-wrapper">
        <div class="menu-item is-flex">
            <label class="dark-mode">
                <input type="checkbox" checked>
                <span></span>
            </label>
        </div>
        <a class="menu-item is-flex right-panel-trigger" data-panel="activity-panel">
            <i data-feather="grid"></i>
        </a>
        <a class="menu-item is-flex">
            <i data-feather="bell"></i>
        </a>
    </div>

</div>
<div class="main-sidebar">
    <div class="sidebar-brand">
        <a href="/">
            <img class="light-image" src="{{ asset('images/ifest.png') }}" alt="">
            <img class="dark-image" src="{{ asset('images/ifest.png') }}" alt="">
        </a>
    </div>
    <div class="sidebar-inner">

        <div class="naver"></div>

        <ul class="icon-menu">
            <li>
                <a href="{{env('APP_URL')}}/su_admin/dashboard" id="home-sidebar-menu">
                    <i class="sidebar-svg" data-feather="home"></i>
                </a>
            </li>
            <li>
                <a href="{{env('APP_URL')}}/su_admin/i2c" id="i2c-sidebar-menu" data="i2c" class="hint--info hint--bubble hint--top" data-hint="I2C">
                    <div class="h-icon is-info is-rounded">
                        <i data-feather="users"></i>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{env('APP_URL')}}/su_admin/wdc" id="wdc-sidebar-menu" data="wdc" class="hint--primary hint--bubble hint--top" data-hint="WDC">
                    <div class="h-icon is-purple is-rounded">
                        <i data-feather="users"></i>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{env('APP_URL')}}/su_admin/muc" id="muc-sidebar-menu" data="muc" class="hint--success hint--bubble hint--top" data-hint="MUC">
                    <div class="h-icon is-success is-rounded">
                        <i data-feather="users"></i>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{env('APP_URL')}}/su_admin/donor_darah" id="dcr-sidebar-menu" data="dcr" class="hint--error hint--bubble hint--top" data-hint="Donor Darah">
                    <div class="h-icon is-danger is-rounded">
                        <i data-feather="users"></i>
                    </div>
                </a>
            </li>
            @if(Auth::user()->user_type == 'superuser' && Auth::user()->email != 'adminph@gmail.com')
            <li>
                <a href="{{env('APP_URL')}}/su_admin/users" id="users-sidebar-menu" data="users" class="hint--default hint--bubble hint--top" data-hint="USER">
                    <i class="sidebar-svg" data-feather="users"></i>
                </a>
            </li>
            @endif
        </ul>

        <!-- User account -->
        <ul class="bottom-menu">
            <!-- Notifications -->
            <li class="right-panel-trigger" data-panel="search-panel">
                <a href="javascript:void(0);" id="open-search"><i class="sidebar-svg" data-feather="search"></i></a>
                <a href="javascript:void(0);" id="close-search" class="is-hidden is-inactive"><i class="sidebar-svg" data-feather="x"></i></a>
            </li> 
            <!-- Profile -->
            <li id="user-menu">
                <div id="profile-menu" class="dropdown profile-dropdown dropdown-trigger is-spaced is-up">
                    <img src="https://via.placeholder.com/150x150" data-demo-src="{{ asset('storage/'.Auth::user()->foto) }}" alt="">
                    <span class="status-indicator"></span>

                    <div class="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <div class="dropdown-head">
                                <div class="h-avatar is-large">
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="{{ asset('storage/'.Auth::user()->foto) }}" alt="">
                                </div>
                                <div class="meta">
                                    <span>{{ Auth::user()->fullname }}</span>
                                    <span>{{ lcfirst(Auth::user()->user_type) }}</span>
                                </div>
                            </div>
                            <a href="{{env('APP_URL')}}/su_admin/profil" class="dropdown-item is-media">
                                <div class="icon">
                                    <i class="lnil lnil-user-alt"></i>
                                </div>
                                <div class="meta">
                                    <span>Profil</span>
                                    <span>Lihat profil</span>
                                </div>
                            </a>
                            @if(Auth::user()->user_type == 'superuser')
                            <a href="{{env('APP_URL')}}/su_admin/pengaturan_web" class="dropdown-item is-media">
                                <div class="icon">
                                    <i class="lnil lnil-cog"></i>
                                </div>
                                <div class="meta">
                                    <span>Pengaturan</span>
                                    <span>Pengaturan Web</span>
                                </div>
                            </a>
                            @endif
                            <div class="dropdown-item is-button">
                                <button class="button h-button is-primary is-raised is-fullwidth logout-button" onclick="$('#logout').submit()">
                                    <span class="icon is-small">
                                            <i data-feather="log-out"></i>
                                        </span>
                                    <span>Keluar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>



        </ul>
    </div>
</div>

@if(Auth::user()->user_type == 'superuser')
<div id="activity-panel" class="right-panel-wrapper is-activity">
    <div class="panel-overlay"></div>

    <div class="right-panel">
        <div class="right-panel-head">
            <h3>Aktifitas</h3>
            <a class="close-panel">
                <i data-feather="chevron-right"></i>
            </a>
        </div>
        <div class="tabs-wrapper is-triple-slider is-squared">
            <div class="tabs-inner">
                <div class="tabs">
                    <ul>
                        <li data-tab="team-side-tab" class="is-active"><a><span>Staff</span></a></li>
                        <li data-tab="schedule-side-tab"><a><span>Aktifitas</span></a></li>
                        <li class="tab-naver"></li>
                    </ul>
                </div>
            </div>

            <div class="right-panel-body">
                <div id="team-side-tab" class="tab-content is-active">
                    <!-- Staff Member-->
                    @foreach($staffs as $staff)
                    <div class="team-card">
                        <div class="h-avatar">
                            <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="{{ asset('storage/'.$staff->foto) }}" alt="">
                        </div>
                        <div class="meta">
                            <span>{{ $staff->fullname }}</span>
                            <span>
                                {{ $staff->email }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div id="schedule-side-tab" class="tab-content">
                    <!--Timeline-->
                    <div class="icon-timeline">
                        <!--Timeline item-->
                        @foreach($activity as $act)
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i data-feather="{{ $act->icon }}"></i>
                            </div>
                            <div class="timeline-content">
                                <p>@php print_r($act->activity) @endphp</p>
                                <span>{{ $act->admin_staff->fullname }}</span>
                                <span>{{ $act->created_at }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>
@endif
<div id="search-panel" class="right-panel-wrapper is-search is-left">
    <div class="panel-overlay"></div>

    <div class="right-panel">
        <div class="right-panel-head">
            <img class="light-image" src="{{ asset('images/ifest.png') }}" alt="" />
            <img class="dark-image" src="{{ asset('images/ifest.png') }}" alt="" />
            <a class="close-panel">
                <i data-feather="chevron-left"></i>
            </a>
        </div>
        <div class="right-panel-body has-slimscroll">
            <div class="field">
                <div class="control has-icon">
                    <input type="text" class="input is-rounded search-input" placeholder="Cari...">
                    <div class="form-icon">
                        <i data-feather="search"></i>
                    </div>
                    <div class="search-results has-slimscroll"></div>
                </div>
            </div>

            <div class="recent">
                <h4>Terakhir kali dilihat</h4>
                <div class="recent-block">
                    <a class="media-flex-center history-link">
                        <div class="h-icon is-info is-rounded is-small">
                            <i data-feather="chrome"></i>
                        </div>
                        <div class="flex-meta">
                            <span class="history"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    initSearch();
function initSearch(){
  $('.search-input').each(function () {
    $(this).on('keyup', function () {
      var $container = $(this).closest('.control');
      var searchQuery = $(this).val();
      var expression = new RegExp(searchQuery, "i");
      $.getJSON('{{ asset("public_/data/event.json") }}', function (data) {
        $container.find('.search-results .search-result, .search-results .placeholder-wrap').remove();
        $.each(data, function (key, value) {
          if (value.name_event.search(expression) != -1) {
              var template = "\n<a href=\""+ value.link +"\"class=\"search-result\">\n<div class=\"h-avatar is-small\">\n<img class='avatar' src=\"" + value.pic + "\" alt=\"\">\n</div>\n<div class=\"meta\">\n<span>" + value.name_event + "</span>\n<span>"+ value.des +"</span>\n</div>\n</a>\n                                ";
              $container.find('.search-results').append(template);
          }
        });

        if ($('.search-result').length === 0) {
          var placeholder = "\n<div class=\"placeholder-wrap\">\n<div class=\"placeholder-content has-text-centered\">\n<h3 class=\"dark-inverted\">Tidak dapat menemukan hasil yang cocok</h3>\n<p>Sepertinya kami tidak dapat menemukan hasil yang cocok untukistilah pencarian yang Anda masukkan. Silakan coba istilah atau kriteria pencarian yang berbeda .</p>\n</div>\n</div>\n";
          $container.find('.search-results').append(placeholder);
        }
      });

      if (searchQuery === '') {
        $container.find('.search-results').removeClass('is-active');
      } else {
        $container.find('.search-results').addClass('is-active');
      }
    });
  });
}
</script>