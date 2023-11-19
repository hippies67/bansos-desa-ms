<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <title>Bansos Desa Ms - Login</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('bansos_desa_ms.png') }}">
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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
                  <div class="text-center">
                    <i class="bi bi-egg-fill" style="color: #f4cf00; font-size: 55px;"></i>
                  {{-- <span class="brand-title" style="font-weight: bold; color: rgb(150, 155, 160);">BANSOS DESA MS</span> --}}
                    <br>
                    <h5 class="login-heading mt-3">LOIN BANSOS DESA MS</h5>
                  </div>
  
                  <form action="{{ route('login.store') }}" method="POST" class="mt-5">
                    @csrf
                    <div class="form-outline mb-4">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email"/>
                    </div>
  
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example22">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Password" />
                    </div>
  
                    <div class="d-grid">
                      <button class="btn btn-primary" type="submit">Log in</button>
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

</body>

</html>
