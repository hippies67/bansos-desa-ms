@php
    $user_auth_info = App\Models\UserAuthInfo::where('user_id', $user->id)->first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $user->nama_lengkap }}</title>

    <style>
        body {
            color: black !important;
        }
    </style>
</head>

<body>
    <div style="max-width:600px;margin:0 auto"><div>

    </div><table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin:auto">

      <tbody><tr>

          <td align="left" style="padding:24px 20px;background-color:#ffffff;text-align:left">
            <i class="bi bi-egg-fill" style="color: #f4cf00; font-size: 55px;"></i>
        </td>

      </tr>

    </tbody></table>



    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin:auto;font-family:Helvetica,Arial,sans-serif;font-size:14px;color:#393d42">
        <tbody><tr>
            <td style="padding:8px 20px 16px;background-color:#ffffff">
                <div style="margin-bottom:14"><strong>Hallo {{ ucwords($user->nama_lengkap) }}</strong></div>
                <br>
                <div style="/* font-weight:bold; */font-size: 16px;">
                    Kami telah mendeteksi adanya <b>anomali</b> login pada akun Anda.
                  
                    <br>

                    Detail:
                    <br>
                    <br>
                    <span>Browser: <b>{{ $user_auth_info->browser }}</b></span> <br>
                    <span>Device: <b>{{ $user_auth_info->device }}</b></span> <br>
                    <span>Alamat IP: <b>{{ $user_auth_info->ip_address }}</b></span> <br>

                    {{-- <br>
                    <span>Untuk melakukan aksi seperti menambah, memperbaharui, menghapus data, Anda dapat memasukkan kode berikut ini :</span> <br>
                    <br>
                    <span>Kode : <b>1664484</b></span> <br>
                    <br> --}}

                    {{-- <div style="text-align:center">
                        <a href="{{ route('activity.index') }}" style="
                            display: inline-block;
                            font-weight: 400;
                            line-height: 1.5;
                            color: #67757c;
                            text-align: center;
                            text-decoration: none;
                            vertical-align: middle;
                            cursor: pointer !important;
                            user-select: none;
                            background-color: #15435A;
                            border: 1px solid #15435A;
                            display: block !important;
                            width: 100% !important;
                            box-shadow: none;
                            color: #fff;
                            padding: 8px 14px;
                            cursor: pointer;
                            font-size: 0.9375rem;
                            border-radius: 4px;
                            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                        ">Detail</a>
                    </div> --}}
                </div>
            </td>
        </tr>
    </tbody></table>  

    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin:auto">
        <tbody>
      <tr>

          <td style="padding:0 20px;background:#ffffff;font-family:sans-serif;font-size:12px;line-height:18px;color:#393d43">

          </td>

      </tr>
      <tr>
          <td style="padding:24px 20px 0;background:#ffffff">
              <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top:1px solid #e5e7e9">
                  <tbody><tr>
                      <td style="padding:24px 0;font-family:sans-serif;font-size:12px;line-height:18px;color:#bdbec0;text-align:center">
                          <p style="margin:0">Bansos Desa Ms</p>
                      </td>
                  </tr>
              </tbody></table>
          </td>
      </tr>
    </tbody></table><div class="yj6qo"></div><div class="adL">
  </div></div>
</body>
</html>