<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Bansos Desa Ms - MFA Verification</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('bansos_desa_ms.png') }}">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

</head>

<body class="h-100">
    <section class="h-100 gradient-form" style="background-color: rgb(248, 248, 248);">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-6">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-left">
                                        <i class="bi bi-egg-fill" style="color: #f4cf00; font-size: 55px;"></i>
                                        {{-- <span class="brand-title" style="font-weight: bold; color: rgb(150, 155, 160);">BANSOS DESA MS</span> --}}
                                        <br>
                                        <h5 class="login-heading mt-3 text-left">Verifikasi Multi-Factor Authentication
                                        </h5>
                                    </div>

                                    <form action="{{ route('login.store') }}" method="POST" class="">
                                        <div class="form-group" id="takeCameraWrap">
                                            {{-- <label for="">Untuk mengubah pengaturan <b>Multi-Factor Authentication (MFA)</b>, harap
                          konfirmasikan terlebih dahulu dengan menyiapkan objek yang telah Anda gunakan pada saat
                          mengaktifkan fitur MFA untuk difoto.</label> --}}

                                            <video id="video" class="mt-3"
                                                style="display: none;width: 300px;border-radius: 20px;" autoplay
                                                playsinline></video>
                                            <canvas id="canvas" class="mt-3"
                                                style="display: none; width: 300px;"></canvas>
                                            <br>
                                            <h5 id="prediksi" class="mt-3" style="display: none;"></h5>

                                            <button id="start-camera"
                                                class="start-camera btn btn-sm btn-outline-success mt-2">
                                                Mengambil Foto Untuk Login<sup class="text-danger">*</sup> </button>


                                            <button id="click-photo" style="display: none" type="button"
                                                class="btn btn-sm btn-outline-success mt-4">Klik untuk mendapatkan
                                                foto</button>

                                            <br><br>
                                            <br><br>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('sweetalert::alert')

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet"></script>
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    {{-- <script>
      const baseUrl = window.location.origin;
      tf.loadLayersModel(baseUrl + "/tfjs_model/model.json");
    </script> --}}

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
                '<span>Memproses Kamera</span> <i class="fa fa-spinner fa-spin" style="margin-left: 5px !important;"></i>'
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
            $("#prediksi").css('display', 'none');

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

            if (mfa_objek_auth == classNames[classIndex]) {
                Swal.fire({
                    title: "Berhasil!",
                    html: `Akun telah berhasil di konfirmasi, anda akan di arahkan ke dashabord!`,
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "rgb(11, 42, 151)",
                    confirmButtonText: "Ok",
                }).then(function(t) {
                    if (t.value) {
                        $.ajax({
                            url: "{{ route('login.verifikasi-mfa-store') }}",
                            method: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(result) {
                              window.location.href = "{{ route('dashboard.index') }}";
                            }
                        });
                    }
                })
            } else {
                $("#prediksi").css('display', 'block');

                $("#prediksi").html(
                    `Konfirmasi Objek  : <span style="color: red"> ${classNames[classIndex]} </span> <i class="bi bi-x-circle" style="color: red;"></i>`
                );
            }

            $("#mfaObjekValue").val(classNames[classIndex]);

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

</body>

</html>
