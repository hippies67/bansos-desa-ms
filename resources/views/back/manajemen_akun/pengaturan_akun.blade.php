@extends('back.layouts.data')

@section('title')
    Pengaturan Profil
@endsection
@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

    <style>
        .cke_chrome {
            border: 1px solid #e3eaef !important;
        }
    </style>
@endsection

@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile Akun</a></li>
        </ol>
    </div>
    <!-- start form -->
    <!-- start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Anda</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user-setting.update', Auth::user()->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap<span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                                value="{{ Auth::user()->nama_lengkap }}" placeholder="Masukkan Nama Lengkap">
                        </div>

                        <div class="form-group">
                            <label for="username">Username<span class="text-danger">*</span></label>
                            <input type="text" name="username" class="form-control" id="username"
                                value="{{ Auth::user()->username }}" placeholder="Masukkan Username">
                        </div>

                        <div class="form-group">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" id="email"
                                value="{{ Auth::user()->email }}" placeholder="Masukkan Email">
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="number" name="no_hp" class="form-control" id="no_hp"
                                value="{{ Auth::user()->no_hp }}" placeholder="Masukkan No Hp">
                        </div>

                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir"
                                value="{{ Auth::user()->tgl_lahir }}" placeholder="Masukkan No Hp">
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control form-control-lg" id="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki_laki"
                                    {{ Auth::user()->jenis_kelamin == 'laki_laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="perempuan"
                                    {{ Auth::user()->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="5"
                                placeholder="Masukkan Alamat">{{ Auth::user()->alamat }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Gunakan Pemulihan Akun ?</label>
                            <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pemulihanAkun1" name="pemulihan_akun" class="custom-control-input"
                                    value="Ya">
                                <label class="custom-control-label" for="pemulihanAkun1">Ya</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pemulihanAkun2" name="pemulihan_akun" class="custom-control-input"
                                    value="Tidak">
                                <label class="custom-control-label" for="pemulihanAkun2">Tidak</label>
                            </div>
                        </div>

                        <div class="form-group" id="takeCameraWrap" style="display: none;">
                            <label for="">Anda akan mengambil gambar yang nantinya akan digunakan untuk pemulihan
                                akun.</label>
                            <video id="video" class="mt-3" style="display: none;width: 300px;border-radius: 20px;"
                                autoplay playsinline></video>
                            <canvas id="canvas" class="mt-3" style="display: none; width: 300px;"></canvas>
                            <br>
                            <button id="start-camera" class="start-camera btn btn-sm btn-outline-success mt-3">
                                Mengambil Foto <sup class="text-danger">*</sup> </button>
                            <button id="click-photo" style="display: none"
                                class="btn btn-sm btn-outline-success mt-4">Klik untuk mendapatkan foto</button>
                            <button id="toggle-camera" class="btn btn-sm btn-outline-secondary mt-4" type="button">
                                Ganti Kamera</button>
                            <br><br>
                            <br><br>
                            <small class="text-danger" style="margin-top: 10px !important;" id="foto_validation"></small>
                        </div>


                        @if (!App\Models\UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', Illuminate\Support\Facades\Request::ip())->exists())
                            <div class="form-group d-flex justify-content-end mt-5">
                                <button class="btn btn-md btn-primary waves-effect waves-light mr-2" type="button"
                                    onclick="loginAnomalyAlert()"><i class="fa fa-save mr-1"></i> Simpan
                                    Perubahan</button>
                            </div>
                        @else
                            <div class="form-group d-flex justify-content-end mt-5">
                                <button class="btn btn-md btn-primary waves-effect waves-light mr-2" type="submit"><i
                                        class="fa fa-save mr-1"></i> Simpan Perubahan</button>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>

    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <script>
        document.addEventListener('change', function() {
            var selectedRadio = document.querySelector('input[name="pemulihan_akun"]:checked');

            if (selectedRadio) {
                var selectedValue = selectedRadio.value;

                if (selectedValue === "Ya") {
                    $("#takeCameraWrap").css('display', 'block');
                } else if (selectedValue === "Tidak") {
                    $("#takeCameraWrap").css('display', 'none');
                }
            }
        });
    </script>

    <script>
        let camera_button_all = document.querySelector(".start-camera");
        let camera_button = document.querySelector("#start-camera");
        let video_play = document.querySelector("#video");
        let click_button = document.querySelector("#click-photo");
        let canvas = document.querySelector("#canvas");
        let img_base64 = '';
        let streamReference = null;
        let isFrontCamera = true; // Flag to track the active camera

        async function startCamera() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia(constraints);
                handleSuccessCamera(stream);
                camera_button.disabled = true;
            } catch (e) {
                handleErrorCamera(e);
            }
        }

        const constraints = {
            audio: false,
            video: {
                facingMode: isFrontCamera ? 'user' : 'environment' // Use the front or back camera
            }
        };

        camera_button_all.addEventListener('click', function(e) {
            $(this).prop('disabled', true);
            $(this).html('<i class="fa fa-spinner fa-spin"></i>');
            e.preventDefault();

            if (img_base64) {
                canvas.style.display = 'none';
                click_button.style.display = 'inline';
                camera_button.style.display = 'inline';
            }

            stopStream(); // Stop the current stream
            startCamera(); // Start a new stream
        });

        document.getElementById('toggle-camera').addEventListener('click', function() {
            isFrontCamera = !isFrontCamera;
            stopStream();
            constraints.video.facingMode = isFrontCamera ? 'user' : 'environment';
            startCamera(); // Start a new stream
        });

        function handleSuccessCamera(stream) {
            video_play.style.display = 'inline';
            let videoTracks = stream.getVideoTracks();
            streamReference = stream; // Store the stream reference
            camera_button.style.display = 'none';
            click_button.style.display = 'inline';
            click_button.style.margin = 'auto';
            video.srcObject = stream;
        }

        function handleErrorCamera(error) {
            if (error.name === 'OverconstrainedError') {
                errorMsgCamera(`The resolution is not supported by your device.`);
            } else if (error.name === 'NotAllowedError') {
                errorMsgCamera('Permissions have not been granted to use your camera and ' +
                    'microphone, you need to allow the page access to your devices in ' +
                    'order for the demo to work.');
            }
            errorMsgCamera(`getUserMedia error: ${error.name}`, error);
        }

        click_button.addEventListener('click', function(e) {
            e.preventDefault();

            // Set specific values for positioning the canvas
            const offsetX = 0; // Set the desired X-coordinate
            const offsetY = 0; // Set the desired Y-coordinate

            // Calculate the aspect ratio of the video stream
            const videoAspectRatio = video.videoWidth / video.videoHeight;

            // Calculate the dimensions for the captured image
            let captureWidth, captureHeight;
            if (canvas.width / canvas.height > videoAspectRatio) {
                captureHeight = canvas.height;
                captureWidth = captureHeight * videoAspectRatio;
            } else {
                captureWidth = canvas.width;
                captureHeight = captureWidth / videoAspectRatio;
            }

            // Set the canvas size to match the captured image dimensions
            canvas.width = captureWidth;
            canvas.height = captureHeight;

            // Draw the video frame on the canvas with the calculated dimensions and specified offsets
            canvas.getContext('2d').drawImage(video, offsetX, offsetY, captureWidth, captureHeight);

            // Set the border radius dynamically
            canvas.style.borderRadius = '20px';

            let image_data_url = canvas.toDataURL('image/jpeg');
            if (image_data_url) {
                video_play.style.display = 'none';
                canvas.style.display = 'inline';
                click_button.style.display = 'none';
                camera_button.innerHTML = 'Ambil Kembali';
                camera_button.style.display = 'inline';
                camera_button.disabled = false; // Enable the button
                img_base64 = image_data_url;
            }
        });

        function stopStream() {
            if (!streamReference) return;
            streamReference.getVideoTracks().forEach(function(track) {
                track.stop();
            });
            streamReference = null;
        }

        // Initial start of the camera
        startCamera();
    </script>

    <script>
        function loginAnomalyAlert() {
            Swal.fire({
                title: "Peringatan!",
                html: `Kami telah mendeteksi adanya <b>anomali</b> login pada akun Anda! Silahkan cek email untuk konfirmasi akun Anda.`,
                type: "info",
                showCancelButton: false,
                confirmButtonColor: "rgb(11, 42, 151)",
                confirmButtonText: "Ok",
            })
        }
    </script>
@endsection
