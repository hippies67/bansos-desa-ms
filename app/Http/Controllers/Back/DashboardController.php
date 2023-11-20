<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Penduduk;
use App\Models\JenisBantuan;
use App\Models\Bantuan;
use App\Models\PenerimaBantuan;
use App\Models\LogActivity;
use Illuminate\Support\Facades\URL;
use Auth;
use Analytics;
use App\Models\Contact;
use Spatie\Analytics\Period;
use Carbon\Carbon;
use App\Models\UserAuthInfo;
use Illuminate\Support\Facades\Request as RequestInfo;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        if(!UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', RequestInfo::ip())->exists()) {
            if(Auth::user()->mfa_objek != "") {
                return redirect()->route('login.verifikasi-mfa');
            }
        }

        $data['total_akun'] = User::count();
        $data['total_penduduk'] = Penduduk::count();
        $data['total_jenis_bantuan'] = JenisBantuan::count();
        $data['total_bantuan'] = Bantuan::count();
        $data['total_penerima'] = PenerimaBantuan::count();

        if(!UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', RequestInfo::ip())->exists()) {
            $data_log_activity = [
                'user_id' => Auth::user()->id,
                'page_title' => 'Dashboard',
                'url' => URL::current(),
            ];

            LogActivity::create($data_log_activity);
        }

        return view('back.dashboard.data', $data);
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
