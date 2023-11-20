<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestInfo;
use Jenssegers\Agent\Facades\Agent;
use App\Models\User;
use App\Models\UserAuthInfo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginAnomalyMail;
use Alert;
use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.login.data');
    }

    public function login() 
    {
        return view('back.login.data');
    }

    public function verifikasi_mfa() 
    {
        if(!UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', RequestInfo::ip())->exists()) {
            // if(Auth::user()->mfa_objek != "") {
            //     return redirect()->route('login.verifikasi-mfa');
            // }
        } else {
            return redirect()->route('dashboard.index');
        }


        return view('back.login.verifikasi_mfa');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $remember = $request->remember ? true : false;
        
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

            if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']), $remember)) {
               
                // Get browser information
                $browser = Agent::browser();

                // Get device information
                $device = Agent::device();

                // Accessing browser and device information
                $browserName = $browser ?: 'Unknown Browser';
                $deviceType = $device ?: 'Unknown Device';
                $ipAddress = RequestInfo::ip();

                if(!UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', "!=", null)->where('status', '=', 'verified')->exists()) {
                   
                    UserAuthInfo::create([
                        'user_id' => Auth::user()->id,
                        'browser' => $browserName,
                        'device' => $deviceType,
                        'ip_address' => $ipAddress,
                        'status' => 'verified',
                    ]);

                    return redirect()->route('dashboard.index');

                } else {
                        $user_auth_info = UserAuthInfo::where('user_id', Auth::user()->id)->first();

                        if(!UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', RequestInfo::ip())->exists()) {
                            if(Auth::user()->mfa_objek != "") {
                        
                                Alert::html('Peringatan', 'Kami telah mendeteksi adanya <b>anomali</b> login pada akun Anda! Silahkan verifikasi akun melalui <b>multi-factor authentication<b>.', 'info')
                                ->autoclose(false);
        
                                return redirect()->route('login.verifikasi-mfa');
                            } else {
                                try {
                                    $user = User::where('id', Auth::user()->id)->first();
            
                                    Mail::to(Auth::user()->email)->queue(new LoginAnomalyMail($user));
    
                                    Auth::logout();
                                    
                                    Alert::html('Peringatan', 'Kami telah mendeteksi adanya <b>anomali</b> login pada akun Anda! Silahkan cek email untuk konfirmasi akun Anda.', 'info')
                                    ->autoclose(false);
    
                                    return redirect()->back();
    
                                } catch (Throwable $e) {
                                    Alert::error('Error', 'Terdapat error pada sistem! anda dapat mencoba untuk login kembali.');
                                    return redirect()->back();
                                }
                            }
                        }  else {
                            return redirect()->route('dashboard.index');
                        }
                }
            
            } else {
                Alert::error('Error', 'Email atau Password salah!');
                return redirect()->back();
            }

    }

    public function verifikasi_mfa_store(Request $request)
    {
        // Get browser information
        $browser = Agent::browser();

        // Get device information
        $device = Agent::device();

        // Accessing browser and device information
        $browserName = $browser ?: 'Unknown Browser';
        $deviceType = $device ?: 'Unknown Device';
        $ipAddress = RequestInfo::ip();

        UserAuthInfo::create([
            'user_id' => Auth::user()->id,
            'browser' => $browserName,
            'device' => $deviceType,
            'ip_address' => $ipAddress,
            'status' => 'verified',
        ]);

        return response()->json('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout()
    {
       
        Auth::logout();
        
        return redirect()->route('login.index');
    }
    
}
