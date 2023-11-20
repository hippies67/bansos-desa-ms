<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogActivity;
use Illuminate\Support\Facades\URL;
use App\Models\Admin;
use App\Models\User;
use App\Models\UserAuthInfo;
use Illuminate\Support\Facades\Request as RequestInfo;
use Alert;
use Auth;

class ManajemenUserController extends Controller
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

    public function user()
    {
        if(!UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', RequestInfo::ip())->exists()) {
            if(Auth::user()->mfa_objek != "") {
                return redirect()->route('login.verifikasi-mfa');
            }
        }

        if(!UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', RequestInfo::ip())->exists()) {

            $data_log_activity = [
                'user_id' => Auth::user()->id,
                'page_title' => 'Manajemen Akun',
                'url' => URL::current(),
            ];

            LogActivity::create($data_log_activity);
        }

        $data['user'] = User::all();
        return view('back.manajemen_akun.admin', $data);
    }

    public function user_setting()
    {
        if(!UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', RequestInfo::ip())->exists()) {
            if(Auth::user()->mfa_objek != "") {
                return redirect()->route('login.verifikasi-mfa');
            }
        }

        $data_log_activity = [
            'user_id' => Auth::user()->id,
            'page_title' => 'Pengaturan Profil',
            'url' => URL::current(),
        ];

        LogActivity::create($data_log_activity);
        
        return view('back.manajemen_akun.pengaturan_akun');
    }

    public function pengaturan_mfa() 
    {

        if(!UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', RequestInfo::ip())->exists()) {
            if(Auth::user()->mfa_objek != "") {
                return redirect()->route('login.verifikasi-mfa');
            }
        }

        return view('back.manajemen_akun.pengaturan_mfa');
    }

    public function edit_mfa() 
    {
        if(!UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', RequestInfo::ip())->exists()) {
            if(Auth::user()->mfa_objek != "") {
                return redirect()->route('login.verifikasi-mfa');
            }
        } 

        return view('back.manajemen_akun.edit_mfa');
    }

    public function update_account(Request $request, $id)
    {
        // dd($request->username);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'mfa_objek' => $request->mfa_objek,
        ];

        User::where('id', $id)->first()->update($data);

        Alert::success('Success', 'Profil telah berhasil di perbaharui!');

        return redirect()->back();
    }

    public function update_mfa(Request $request, $id)
    {
        // dd($request->username);

        if($request->mfa_objek_edit == "None") {
            $data = [
                'mfa_objek' => null,
            ];
        } else {
            $data = [
                'mfa_objek' => $request->mfa_objek_edit,
            ];
        }
       

        User::where('id', $id)->first()->update($data);

        Alert::success('Success', 'MFA telah berhasil di perbaharui!');

        return redirect()->route('user-setting');
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
