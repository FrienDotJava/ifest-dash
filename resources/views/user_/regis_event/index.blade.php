@section('title', 'Kompetisi Yang Diikuti')
<x-layouts.app>
    <form action="{{ route('logout') }}" method="post" class="is-hidden" id="logout">@csrf</form>
    <div id="ifst-app" class="app-wrapper">

        <div class="app-overlay"></div>
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        @include('user_/slice_/sidehead')
        <!-- Content Wrapper -->
        <div class="view-wrapper" data-naver-offset="274" data-menu-item="#regis_event-sidebar-menu" data-mobile-item="#regis_event-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">

                        <div class="title-wrap">
                            <h1 class="title is-4">Kompetisi Yang Diikuti</h1>
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

                    <div class="user-grid-toolbar">
                        <div class="control has-icon">
                            <input class="input custom-text-filter" placeholder="Search..." data-filter-target=".column">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <div class="user-grid user-grid-v4">

                            <!--List Empty Search Placeholder -->
                            <div class="page-placeholder custom-text-filter-placeholder is-hidden">
                                <div class="placeholder-content">
                                    <h3>Kami tidak dapat menemukan hasil yang cocok.</h3>
                                    <p class="is-larger">Sepertinya kami tidak dapat menemukan hasil yang cocok untuk
                                         istilah pencarian yang Anda masukkan. Silakan coba istilah atau kriteria pencarian yang berbeda .</p>
                                </div>
                            </div>

                            <div class="columns is-multiline">

                                @foreach($event_regis as $row)
                                <!--Grid item-->
                                <div class="column is-3">
                                    <div class="grid-item">
                                        <div class="h-avatar is-big">
                                            <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="{{ asset('storage/'.$row->event->image_event) }}" alt="">
                                        </div>
                                        <h3 class="dark-inverted" data-filter-match>{{ $row->event->event_name }}</h3>
                                        <p data-filter-match>{{ $row->team_name }}</p>
                                        <div class="button-wrap has-text-centered">
                                            @if($row->team_member()->count() < ($row->event->max_member - 1))
                                                <button class="button h-button is-primary h-modal-trigger tambah-anggota-tim" data-modal="tambah-anggota-tim" data-id_team="{{ $row->team_id }}" data-id_event="{{ $row->id_event }}">Tambah Anggota Tim</button>
                                            @endif
                                            <div>
                                                <a href="{{env('APP_URL')}}/user/regis_event/{{ $row->event->event_code }}/detail_tim" class="dark-inverted-hover">Lihat Tim</a>
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

    <!-- tambah anggota tim -->
    <div id="tambah-anggota-tim" class="modal h-modal is-small">
        <div class="modal-background h-modal-close"></div>
        <div class="modal-content">
            <form class="modal-card" id="add_member">
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
                            <input type="hidden" name="team_id">
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
                            <div class="field email-after">
                                <label>Email</label>
                                <div class="control">
                                    <input type="email" name="email" class="input @error('email') is-validate @enderror" value="{{old('email')}}" placeholder="Masukkan Email" required>    
                                </div>
                                @error('email')
                                    <div class="danger-text">Email anggota tim wajib diisi!</div>
                                @enderror
                            </div>
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

    <script>
        $(document).on("click", ".tambah-anggota-tim", function () {
            var team_id = $(this).data('id_team');
            var id_event = $(this).data('id_event');
            var check_asalins = document.getElementsByClassName('asal-ins');
            var check_alamatins = document.getElementsByClassName('alamat-ins');
            if(id_event === "wdc"){
                if(check_asalins.length == 0 && check_alamatins.length == 0){
                    $('<div class="field asal-ins"><label>Asal Institusi</label><div class="control"><input type="text" name="asal_ins" class="input @error("asal_ins") is-validate @enderror" value="{{old("asal_ins")}}" placeholder="Masukkan Asal Institusi"></div><p>Kosongkan asal institusi jika satu institusi.</p></div><div class="field alamat-ins"><label>Alamat Institusi</label><div class="control"><textarea name="alamat_ins" class="textarea">{{old("asal_ins")}}</textarea></div><p>Kosongkan asal institusi jika satu institusi.</p></div>').insertAfter('.email-after');
                }
            }else{
                $('.asal-ins').remove();
                $('.alamat-ins').remove();
            }
            $("input[name='team_id']").val( team_id );
            $("#add_member").attr('action', '{{env("APP_URL")}}/user/regis_event/'+ id_event +'/add_team_member' );
            $("#add_member").attr('method', 'POST' );
        });
        
        $('#add_member').submit(function() {
            $(this).find("button[type='submit']").prop('disabled',true);
            $(this).find("button[type='submit']").addClass('is-loading');
        });
        
    </script>
    @if($errors->any())
        <script>
            $('#tambah-anggota-tim').toggleClass('is-active');
        </script>
    @endif
    
    @if(session('notif_danger'))
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
                    type: 'error',
                    background: themeColors.error,
                    icon: {
                        className: 'fas fa-times',
                        tagName: 'i',
                        text: ''
                    }
                    }]
                }); //Notyf Toasts Demos
                notyf.open({
                    type: "error",
                    message: "{{ session('notif_danger') }}"
                });
            });
        </script>
    @endif
</x-layouts.app>