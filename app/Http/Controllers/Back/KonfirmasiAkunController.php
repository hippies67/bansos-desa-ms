<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAuthInfo;
use Illuminate\Support\Facades\Request as RequestInfo;
use Jenssegers\Agent\Facades\Agent;
use Alert;
use Auth;

class KonfirmasiAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function konfirmasi_akun($user_id) 
    {
        // Get browser information
        $browser = Agent::browser();

        // Get device information
        $device = Agent::device();

        // Accessing browser and device information
        $browserName = $browser ?: 'Unknown Browser';
        $deviceType = $device ?: 'Unknown Device';
        $ipAddress = RequestInfo::ip();

        if(!UserAuthInfo::where('user_id', $user_id)->where('ip_address', $ipAddress)->where('status', '=', 'verified')->exists()) {

            $data = [
                'user_id' => $user_id,
                'browser' => $browserName,
                'device' => $deviceType,
                'ip_address' => $ipAddress,
                'status' => 'verified',
            ];

            UserAuthInfo::create($data);

            Alert::success('Berhasil!', 'Akun telah berhasil di verifikasi, silahkan login kembali untuk masuk ke halaman dashboard.')->autoclose(false);
      
        }

        if (Auth::check()) {
            Auth::logout();
        }

        return redirect()->route('login.index');
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
        //
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
}
