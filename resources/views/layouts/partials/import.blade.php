<style>
    .file-upload {
        background-color: #ffffff;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: .5px dashed #999;
        border-radius: 10px;
        position: relative;
        height: 20em;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        border: .5px dashed #2196f3;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #999;
        padding: 60px 0;
        font-size: 10vh;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    @keyframes float {
        0% {
            transform: translatey(0px);
        }
        50% {
            transform: translatey(-20px);
        }
        100% {
            transform: translatey(0px);
        }
    }

    .animation {
        width: auto;
        height: auto;
        background-color: transparent !important;
        transform: translatey(0px);
        animation: float 1s ease-in-out infinite;
    }

    .search-animation {
        cursor: pointer;
        height: auto;
        margin-top: 35px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        background-color: rgb(255, 255, 255);
    }

    .icon {
        font-size: 55px;
        margin: 16px;
        color: #2196f3;
    }

    .handle {
        position: relative;
        height: auto;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
    }

    .center {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        width: 140px;
        height: 140px;
        border-radius: 100%;
        background-color: #fff;
        border: 9px solid #DEE1E4;
        overflow: hidden;
    }

    .handle::before {
        content: "";
        position: absolute;
        top: 210px;
        left: 26px;
        width: 100px;
        height: 32px;
        border-radius: 100%;
        background-color: rgba(222, 225, 228, 0.4);
    }

    .wrap {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
            -ms-flex-direction: row;
                flex-direction: row;
    }

    .handle-body::before {
        content: "";
        position: absolute;
        width: 50px;
        height: 6px;
        background-color: #DEE1E4;
        -webkit-transform: rotate(45deg);
                transform: rotate(45deg);
    }

    .handle-body::after {
        content: "";
        position: absolute;
        left: 30px;
        top: 20px;
        width: 36px;
        height: 12px;
        background-color: #DEE1E4;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        border-radius: 0 4px 4px 0;
    }

    .box-1 {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .box-2 {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    /* animation */

    @-webkit-keyframes rowup-1 {
        0% {
            -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
        }
        100% {
            -webkit-transform: translate3d(50%, 0, 0);
                    transform: translate3d(50%, 0, 0);
        }
    }

    @keyframes rowup-1 {
        0% {
            -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
        }
        100% {
            -webkit-transform: translate3d(50%, 0, 0);
                    transform: translate3d(50%, 0, 0);
        }
    }

    @-webkit-keyframes rowup-2 {
        0% {
            -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
        }
        100% {
            -webkit-transform: translate3d(50%, 0, 0);
                    transform: translate3d(50%, 0, 0);
        }
    }

    @keyframes rowup-2 {
        0% {
            -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
        }
        100% {
            -webkit-transform: translate3d(50%, 0, 0);
                    transform: translate3d(50%, 0, 0);
        }
    }

    @-webkit-keyframes cloud-loop {
        0% {
            -webkit-transform: translate(0, 15px);
            transform: translate(0, 15px);
        }
        100% {
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
        }
    }

    @-webkit-keyframes shadow-loop {
        0% {
            -webkit-transform: translate(0, -35px) scale(1.15, 0.25);
            transform: translate(0, -35px) scale(1.15, 0.25);
        }
        100% {
            -webkit-transform: translate(0, -35px) scale(1, 0.25);
            transform: translate(0, -35px) scale(1, 0.25);
        }
    }

    @keyframes shadow-loop {
        0% {
            -webkit-transform: translate(0, -35px) scale(1.15, 0.25);
            transform: translate(0, -35px) scale(1.15, 0.25);
        }
        100% {
            -webkit-transform: translate(0, -35px) scale(1, 0.25);
            transform: translate(0, -35px) scale(1, 0.25);
        }
    }

    .box-1 {
        -webkit-animation: 1s rowup-1 linear infinite normal;
                animation: 1s rowup-1 linear infinite normal;
    }

    .box-2 {
        -webkit-animation: 1s rowup-2 linear infinite normal;
                animation: 1s rowup-2 linear infinite normal;
    }

    .center {
        -webkit-animation-name: cloud-loop;
        animation-name: cloud-loop;
        -webkit-animation-duration: 0.7s;
        animation-duration: 0.7s;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-timing-function: ease;
        animation-timing-function: ease;
        -webkit-animation-direction: alternate;
        animation-direction: alternate;
    }

    .handle-body {
        position: relative;
        left: 112px;
        top: 60px;
        -webkit-animation-name: cloud-loop;
        animation-name: cloud-loop;
        -webkit-animation-duration: 0.7s;
        animation-duration: 0.7s;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-timing-function: ease;
        animation-timing-function: ease;
        -webkit-animation-direction: alternate;
        animation-direction: alternate;
    }

    .handle::before {
        -webkit-animation-name: shadow-loop;
        animation-name: shadow-loop;
        -webkit-animation-duration: 0.7s;
        animation-duration: 0.7s;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-timing-function: ease;
        animation-timing-function: ease;
        -webkit-animation-direction: alternate;
        animation-direction: alternate;
    }

    .dr {
        position: absolute;
        bottom: 16px; 
        right: 16px;
        width:100px;
    }
</style>
{!! Form::open(['id' => 'formImport']) !!}
    <div class="file-upload">
        <div class="image-upload-wrap">
            <input class="file-upload-input" id="file" type='file' onchange="readURL(this);"/>
            <input type="hidden" name="filename" id="filename">
            <div class="drag-text" onclick="$('#file').click()">
                <div class="search-animation">
                    <div class="handle">
                        <span class="handle-body"></span>
                        <div class="center">
                            <div class="wrap">
                                <div class="box-1 box">
                                    <i class="fas fa-file-code icon"></i>
                                    <i class="fas fa-file-code icon"></i>
                                </div>
                                <div class="box-2 box">
                                    <i class="fas fa-file-code icon"></i>
                                    <i class="fas fa-file-code icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center my-3" id="formUpload">
            <button class="btn btn-outline-primary btn-block" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Cari File</button>
        </div>
        <div class="file-upload-content">
            <h1 style="font-size: 15em" class="mb-3"><i class="fas fa-file"></i></h1>
            <b class="text-success file-upload-info"></b>
            <div class="image-title-wrap my-3">
                <button type="button" onclick="removeUpload()" class="btn btn-danger btn-block">Remove <b class="image-title">Uploaded Image</b></button>
            </div>
        </div>
    </div>
    <div class="text-right" id="formBtnProses">
        <button type="button" class="btn btn-outline-dark" onclick="bootbox.hideAll()">Batal</button>
        <button type="button" class="btn btn-primary" onclick="proses()">Proses</button>
    </div>
    <div id="formProgres">
        <div class="animation text-center">
            <h1 style="font-size: 15em"><i class="fas fa-cloud-upload-alt text-success"></i></h1>
        </div>
        <div class="progress progress-lg mb-5 rounded-pill" id="panelProgress" style="height: 5vh;">
            <div class="progress-bar progress-bar-striped bg-success" id="pregressBar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <table width="100%">
            <tr>
                <th>Informasi File</th>
            </tr>
            <tr>
                <th width="30%">Nama File</th>
                <th>:</th>
                <td class="file-title"></td>
            </tr>
            <tr>
                <th width="30%">Jumlah Baris</th>
                <th>:</th>
                <td class="file-total"></td>
            </tr>
            <tr>
                <th width="30%">Ukuran File</th>
                <th>:</th>
                <td class="filesize"></td>
            </tr>
            <tr class="hidden">
                <th width="30%">Data Yang Behasil di Import</th>
                <th>:</th>
                <td class="total-success-import text-success"></td>
            </tr>
            <tr class="hidden">
                <th width="30%">Data Yang Gagal di Import</th>
                <th>:</th>
                <td class="total-failed-import text-danger"></td>
            </tr>
        </table>
        <div class="text-danger showError mt-3" style="overflow-x: auto; max-height: 250px">
            <table class="table table-bordered table-condensed table-striped table-hover">
                <thead>
                    <tr>
                        <th width="1">Line</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody id="errors">
    
                </tbody>
            </table>
        </div>
        <div class="text-right mt-3" id="btnImport" >
            <button type="button" class="btn btn-outline-dark" onclick="back()">Kembali</button>
            <button type="button" class="btn btn-primary" id="buttonImport" onclick="storeImport(0)">Import</button>
        </div>
    </div>
{!! Form::close() !!}
<script>
    var dataPelanggan = [];
    var maxTimeOut = 600000;
    var inc = 100;
    var totalBaris = 0;
    var total = 0;
    var filesize = 0;

    $(function() {
        $('#formProgres').hide();
        $('.showError').hide();
        $('#panelProgress').hide();
        $('.hidden').hide();
    })
    
    function readURL(input) {
        totalBaris = 0;
        $('#formImport .alert').remove()
        if (input.files && input.files[0]) {
            var fd = new FormData();
            var files = $('#file')[0].files;
            fd.append('file', files[0]);
            $('#formImport').blockUI();
            $.ajax({
                url: '{{ route('partial.upload.import') }}',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.image-upload-wrap').hide();
                            $('#formUpload').hide();
                            $('.file-upload-content').show();
                            $('.image-title').html('('+input.files[0].name+')');
                            $('.file-upload-info').html(input.files[0].name+' ('+response.data.jumlah_baris+' baris) ('+response.data.filesize+')');
                            $('.file-title').html(input.files[0].name);
                            $('.file-total').html(response.data.jumlah_baris+' baris');
                            $('.filesize').html(response.data.filesize);
                            filesize = $('.filesize').html().split(' ')[0];
                            totalBaris += response.data.jumlah_baris;
                            $('#filename').val(response.data.filename);
                        }
                        reader.readAsDataURL(input.files[0]);
                    } else {
                        if (response.validation) {
                            $('#formImport').prepend(`
                            <div class="alert alert-danger alert-dismissible" style="max-height:200px; overflow:auto">
                                <button type="button" class="close mr-2" data-dismiss="alert" aria-hidden="true">&times;</button>
                                ${response.validation.file[0]}
                            </div>
                            `)
                        }
                    }
                }
            }).done(function() {
                $('#formImport').unblock();
            });
        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').val('')
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('#formUpload').show();
        $('.image-upload-wrap').show();
    }
    
    $('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });

    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
    });

    function proses() {
        if ($('#file').val() == '') {
            $('#formImport .alert').remove()
            $('#formImport').prepend(`
            <div class="alert alert-danger alert-dismissible" style="max-height:200px; overflow:auto">
                <button type="button" class="close mr-2" data-dismiss="alert" aria-hidden="true">&times;</button>
                file tidak boleh kosong
            </div>
            `)
        } else {
            $('#formBtnProses').hide()
            $('.file-upload').hide()
            $('#formProgres').show();
        }
    }

    function back() {
        i = 100;
        total = 0;
        filesize = 0;
        $('#formImport .alert').remove();
        $('#pregressBar').css('width', '0%')
        $('#pregressBar').html('0%')
        $('.showError tbody tr').html('');
        $('#formBtnProses').show()
        $('.file-upload').show()
        $('#formProgres').hide();
        $('.hidden').hide();
        $('#buttonImport').show();
        $('.showError').hide();
        $('#btnImport').show();
    }
</script>