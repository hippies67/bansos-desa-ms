@extends('back.layouts.data')

@section('title')
    Ubah MFA
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Profile Akun</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Ubah MFA</a></li>
        </ol>
    </div>
    <!-- start form -->
    <!-- start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah Multi-Factor Authentication (MFA)</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user-setting.pengaturan-mfa.update', Auth::user()->id) }}" method="POST" id="updateMFAForm">
                        @csrf


                        <input type="hidden" name="mfa_objek_edit" id="mfaObjekValueEdit" value="">

                        <div class="form-group mt-4" id="pengaturanMFA">
                            <label for="jenis_kelamin" data-toggle="tooltip" data-placement="top"
                                title="Tooltip on top">Apakah Anda akan menggunakan lagi <b
                                    style="cursor: pointer; text-decoration: underline;" data-container="body"
                                    data-toggle="popover" data-placement="top"
                                    data-content="Multi-Factor Authentication (MFA) adalah suatu metode keamanan yang menggunakan lebih dari satu cara untuk mengonfirmasi identitas pengguna saat mencoba mengakses sistem atau layanan. Tujuan dari MFA adalah untuk meningkatkan tingkat keamanan dengan menambahkan lapisan keamanan tambahan di luar kata sandi saja."
                                    title="" data-original-title="Multi Factor Authentication"
                                    aria-describedby="popover638747">Multi Factor Authentication (MFA)</b> ?</label>
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

                        <span class="text-danger" id="pemulihanAkunValidation" style="display: none;">Pilihan tidak boleh kosong!</span>

                        <div class="form-group" id="takeCameraWrap" style="display: none;">

                            <video id="video" class="mt-3" style="display: none;width: 300px;border-radius: 20px;"
                                autoplay playsinline></video>
                            <canvas id="canvas" class="mt-3" style="display: none; width: 300px;"></canvas>
                            <br>
                            <h5 id="prediksi" class="mt-3" style="display: none;"></h5>

                            <button id="start-camera" class="start-camera btn btn-sm btn-outline-success mt-2">
                                Mengambil Foto<sup class="text-danger">*</sup> </button>


                            <button id="click-photo" style="display: none" type="button"
                                class="btn btn-sm btn-outline-success mt-4">Klik untuk mendapatkan foto</button>

                            <br><br>
                            <br><br>
                        </div>


                        {{-- 
                        <div class="form-group" id="takeCameraWrapEdit">

                            <video id="videoEdit" class="mt-3" style="display: none;width: 300px;border-radius: 20px;"
                                autoplay playsinline></video>
                            <canvas id="canvasEdit" class="mt-3" style="display: none; width: 300px;"></canvas>
                            <br>
                            <h5 id="prediksiEdit" class="mt-3" style="display: none;"></h5>

                            <button id="start-camera-edit" class="start-camera-edit btn btn-sm btn-outline-success mt-2">
                                Mengambil Foto<sup class="text-danger">*</sup> </button>


                            <button id="click-photo-edit" style="display: none" type="button"
                                class="btn btn-sm btn-outline-success mt-4">Klik untuk mendapatkan foto</button>

                            <br><br>
                            <br><br>
                        </div> --}}

                        <div class="form-group d-flex justify-content-end" id="simpanPerubahanButton">
                            <button class="btn btn-md btn-primary waves-effect waves-light mr-2" type="button" onclick="submitButton()"><i
                                    class="fa fa-save mr-1"></i> Simpan Perubahan</button>
                        </div>

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
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet"></script>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        })
    </script>

    <script>
        function submitButton() {
            if($("#mfaObjekValueEdit").val() != "") {
                $("#updateMFAForm").submit();
            } else {
                $("#pemulihanAkunValidation").css('display', 'block');
            }
        }
    </script>
    <script>
        document.addEventListener('change', function() {
            var selectedRadio = document.querySelector('input[name="pemulihan_akun"]:checked');

            if (selectedRadio) {
                var selectedValue = selectedRadio.value;

                if (selectedValue === "Ya") {
                    $("#takeCameraWrap").css('display', 'block');
                } else if (selectedValue === "Tidak") {
                    $("#takeCameraWrap").css('display', 'none');
                    $("#mfaObjekValueEdit").val('None');
                }
            }
        });
    </script>

    {{-- KONFIRMASI MFA --}}

    <script>
        function preprocessImage(image) {
            // Resize image to match model input size
            const expandedImage = image.expandDims(2) // Add extra dimension
            const resizedImage = tf.image
                .resizeBilinear(expandedImage, [150, 150])
                .toFloat()

            // Normalize image values to the range [0, 1]
            const normalizedImage = resizedImage.div(tf.scalar(255.0))

            // Add batch dimension
            const batchedImage = normalizedImage.expandDims(0)

            return batchedImage
        }

        let camera_button_all = document.querySelector(".start-camera");
        let camera_button = document.querySelector("#start-camera");
        let video_play = document.querySelector("#video");
        let click_button = document.querySelector("#click-photo");
        let canvas = document.querySelector("#canvas");
        let img_base64 = '';
        let streamReference = null;
        let mfa_objek_auth = "{{ Auth::user()->mfa_objek }}";

        async function loadModel() {
            const baseUrl = window.location.origin;

            model = await tf.loadLayersModel(baseUrl + "/tfjs_model/model.json");
        }

        const constraints = {
            audio: false,
            video: true
        };

        camera_button_all.addEventListener('click', async function(e) {
            $("#prediksi").css('display', 'none');
            $("#click-photo").css('display', 'none');

            $(this).prop('disabled', true);
            $(this).html(
                '<span>Proses Data Berlangsung, Mohon Sabar</span> <i class="fa fa-spinner fa-spin" style="margin-left: 5px !important;"></i>'
            );

            e.preventDefault();
            if (img_base64) {
                canvas.style.display = 'none';
                // click_button.style.display = 'inline';
                camera_button.style.display = 'inline';
            }
            try {
                await loadModel();

                const stream = await navigator.mediaDevices.getUserMedia(constraints);
                handleSuccessCamera(stream);
                camera_button.disabled = true;


            } catch (e) {
                handleErrorCamera(e);
            }
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

            const image = tf.browser.fromPixels(canvas).mean(2) // Convert to grayscale
            const processedImage = preprocessImage(image)

            const result = model.predict(processedImage)

            const classIndex = result.argMax(-1).dataSync()[0]
            const classNames = ["Buku", "Gelas", "Handphone"] // Replace with your class labels

            $("#prediksi").css('display', 'block');
            $("#prediksi").html(`Prediksi Objek Pada Foto : ${classNames[classIndex]}`);

            $("#mfaObjekValueEdit").val(classNames[classIndex]);

            let image_data_url = canvas.toDataURL('image/jpeg');
            if (image_data_url) {
                video_play.style.display = 'none';
                canvas.style.display = 'inline';
                click_button.style.display = 'none';
                camera_button.innerHTML = 'Ambil Foto Kembali';
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
