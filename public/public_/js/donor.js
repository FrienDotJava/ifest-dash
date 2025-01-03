$('#confirm-step-1').on('click', function () {
    var get_check = $('#confirm-step-1-checkbox').prop('checked');
    if(get_check == 1){
        var $this = $(this);
        $this.addClass('is-loading');
        setTimeout(function () {
            $this.removeClass('is-loading');
            $('.signup-steps').removeClass('is-hidden');
            $('#signup-step-1, #signup-step-2').toggleClass('is-hidden');
            $('.step-icon:nth-child(2)').removeClass('is-inactive').addClass('is-active');
            $('.progress').prop('value', 50);
        }, 1000);
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
            message: "Silahkan menyetujui persyaratan dan ketentuan"
        });
    }
});

$('#confirm-step-2').on('click', function () {
    var $this = $(this);
    var get_nama = $('#nama_lengkap').val();
    var get_email = $('#email').val();
    var get_no_hp = $('#no_hp').val();

    get_nama == '' ? $('.nama-control').addClass('has-error') : $('.nama-control').removeClass('has-error').addClass('has-success');
    get_email == '' ? $('.email-control').addClass('has-error') : $('.email-control').removeClass('has-error').addClass('has-success');
    get_no_hp == '' ? $('.no_hp-control').addClass('has-error') : $('.no_hp-control').removeClass('has-error').addClass('has-success');

    if(get_nama != '' && get_email != '' && get_no_hp != ''){
        $this.addClass('is-loading');
        setTimeout(function () {
            $this.removeClass('is-loading');
            $('#signup-step-2, #signup-step-3').toggleClass('is-hidden');
        }, 1000);
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
            message: "Silahkan mengisi data dengan benar"
        });
    }
});

$('#back-signup-1').on('click', function () {
    var $this = $(this);
    $this.addClass('is-loading');
    setTimeout(function () {
        $this.removeClass('is-loading');
        $('#signup-step-3, #signup-step-2').toggleClass('is-hidden');
    }, 1000);
});

$('#back-signup-2').on('click', function () {
    var $this = $(this);
    $this.addClass('is-loading');
    setTimeout(function () {
        $this.removeClass('is-loading');
        $('#signup-step-4, #signup-step-3').toggleClass('is-hidden');
    }, 1000);
});

$('#confirm-step-3').on('click', function () {
    var $this = $(this);
    var get_umur = $('#umur').val();
    var get_berat_badan = $('#berat_badan').val();
    var get_golongan_darah = $('#golongan_darah').val();

    get_umur == '' || get_umur < 18 ? $('.umur-control').addClass('has-error') : $('.umur-control').removeClass('has-error').addClass('has-success');
    get_berat_badan == '' || get_berat_badan < 45 ? $('.berat_badan-control').addClass('has-error') : $('.berat_badan-control').removeClass('has-error').addClass('has-success');
    get_golongan_darah == '' ? $('.golongan_darah-control').addClass('has-error') : $('.golongan_darah-control').removeClass('has-error').addClass('.has-success');

    if(get_umur != '' && get_berat_badan != '' && get_golongan_darah != '' && get_umur >= 18 && get_berat_badan >= 45){
        $this.addClass('is-loading');
        setTimeout(function () {
            $this.removeClass('is-loading');
            $('#signup-step-3, #signup-step-4').toggleClass('is-hidden');
        }, 1000);
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
            message: "Silahkan mengisi data dengan benar"
        });
    }
});

$('#finish-signup').on('click', function () {
    var $this = $(this);
    $('.hal-control .error-text').remove();
    var hal = document.querySelectorAll('input[name="hal"]');
    var halControl = document.querySelector('.hal-control');
    var halError = document.createElement('small');
    halError.classList.add('error-text');
    halError.textContent = 'Silahkan centang semua persyaratan';
    halControl.appendChild(halError);
    halError.style.display = 'none';
    var checked = 0;
    for (var i = 0; i < hal.length; i++) {
        if (hal[i].checked) {
            checked++;
        }
    }
    if (checked == hal.length) {
        halError.style.display = 'none';
        var get_hari = $("input[name='hari']:checked").val();
        get_hari == 'default' ? $('.hari-control').addClass('has-error') : $('.hari-control').removeClass('has-error').addClass('.has-success');
        if(get_hari != 'default' && checked == hal.length){
            $this.addClass('is-loading');
            var url = window.location.origin + '/'+window.location.pathname.split('/')[1];
            $.ajax({
                url: "/daftar_donor_darah",
                type: "POST",
                data: {
                    _token: $('input[name="_token"]').val(),
                    nama: $('#nama_lengkap').val(),
                    npm: $('#npm').val() == '' ? '-' : $('#npm').val(),
                    email: $('#email').val(),
                    no_hp: $('#no_hp').val(),
                    umur: $('#umur').val(),
                    berat_badan: $('#berat_badan').val(),
                    golongan_darah: $('#golongan_darah').val(),
                    hal: "Lengkap Sesuai Persyaratan",
                    hari: $("input[name='hari']:checked").val(),
                    send_mail: $("#send-email").is(':checked') ? 1 : 0,
                },
                success: function (response) {
                    if (response.status == 'success') {
                        notyf = new Notyf({
                            duration: 3000,
                            position: {
                            x: 'right',
                            y: 'bottom'
                            },
                            types: [{
                            type: 'success',
                            background: themeColors.success,
                            icon: {
                                className: 'fas fa-check',
                                tagName: 'i',
                                text: ''
                            }
                            }]
                        }); 
                        notyf.open({
                            type: "success",
                            message: "Berhasil mendaftar"
                        });
                        setTimeout(function () {
                            $this.removeClass('is-loading');
                            $('#signup-step-4, #signup-step-5').toggleClass('is-hidden');
                            $('.step-icon:nth-child(3)').removeClass('is-inactive').addClass('is-active');
                            $('.progress').prop('value', 100);
                            $('#nama-suc').html($('#nama_lengkap').val());
                            $('#npm-suc').html($('#npm').val() == '' ? '-' : $('#npm').val());
                            $('#email-suc').html($('#email').val());
                            $('#no_hp-suc').html($('#no_hp').val());
                            $('#umur-suc').html($('#umur').val());
                            $('#berat_badan-suc').html($('#berat_badan').val());
                            $('#gol_darah-suc').html($('#golongan_darah').val());
                            $('#hal-suc').html($('#hal').val());
                            $('#hari-suc').html($("input[name='hari']:checked").val());
                        }, 1000);
                    } else {
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
                            message: response.message
                        });
                        setTimeout(function () {
                            $this.removeClass('is-loading');
                        }, 1000);
                    }
                },
                error: function (response) {
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
                        message: "Gagal mendaftar",
                        detail: response.responseJSON.message
                    });
                    setTimeout(function () {
                        $this.removeClass('is-loading');
                    }, 1000);
                }
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
                message: "Silahkan mengisi data dengan benar"
            });
        }
    } else {
        halError.style.display = 'block';
    }

});