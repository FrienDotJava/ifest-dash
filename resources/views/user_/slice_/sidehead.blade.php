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
                            <a href="{{env('APP_URL')}}/user/profil" class="dropdown-item is-media">
                                <div class="icon">
                                    <i class="lnil lnil-user-alt"></i>
                                </div>
                                <div class="meta">
                                    <span>Profil</span>
                                    <span>Lihat profil</span>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
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
                <a href="{{env('APP_URL')}}/user/dashboard" id="home-sidebar-menu-mobile" data="dashboard">
                    <i data-feather="home"></i>
                </a>
            </li>
            <li>
                <a href="{{env('APP_URL')}}/user/events" id="event-sidebar-menu-mobile" data="event">
                    <div class="h-icon is-info is-rounded">
                        <i data-feather="edit"></i>
                    </div>
                </a>
            </li>
            <!--<li>-->
            <!--    <a href="#" id="info-sidebar-menu-mobile" data="info">-->
            <!--        <div class="h-icon is-purple is-rounded">-->
            <!--            <i data-feather="bell"></i>-->
            <!--        </div>-->
            <!--    </a>-->
            <!--</li>-->
            <li>
                <a href="{{env('APP_URL')}}/user/regis_event" id="regis_event-sidebar-menu-mobile" data="regis_event">
                    <div class="h-icon is-success is-rounded">
                        <i data-feather="clipboard"></i>
                    </div>
                </a>
            </li>
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
                <a href="{{env('APP_URL')}}/user/dashboard" id="home-sidebar-menu">
                    <i class="sidebar-svg" data-feather="home"></i>
                </a>
            </li>
            <li>
                <a href="{{env('APP_URL')}}/user/events" id="event-sidebar-menu" data="event">
                    <div class="h-icon is-info is-rounded">
                        <i data-feather="edit"></i>
                    </div>
                </a>
            </li>
            <!--<li>-->
            <!--    <a href="#" id="info-sidebar-menu" data="info">-->
            <!--        <div class="h-icon is-purple is-rounded">-->
            <!--            <i data-feather="bell"></i>-->
            <!--        </div>-->
            <!--    </a>-->
            <!--</li>-->
            <li>
                <a href="{{env('APP_URL')}}/user/regis_event" id="regis_event-sidebar-menu" data="regis_event">
                    <div class="h-icon is-success is-rounded">
                        <i data-feather="clipboard"></i>
                    </div>
                </a>
            </li>
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
                            <a href="{{env('APP_URL')}}/user/profil" class="dropdown-item is-media">
                                <div class="icon">
                                    <i class="lnil lnil-user-alt"></i>
                                </div>
                                <div class="meta">
                                    <span>Profil</span>
                                    <span>Lihat profil</span>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            </a>
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
              var template = "\n<a href=\"#\"class=\"search-result\">\n<div class=\"h-avatar is-small\">\n<img class='avatar' src=\"" + value.pic + "\" alt=\"\">\n</div>\n<div class=\"meta\">\n<span>" + value.name_event + "</span>\n<span>"+ value.des +"</span>\n</div>\n</a>\n                                ";
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