<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\LogActivity;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UserAuthInfo;
use Illuminate\Support\Facades\Request as RequestInfo;
use Auth;

class PendudukController extends Controller
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
        
        $data['penduduk'] = Penduduk::all();

        if(!UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', RequestInfo::ip())->exists()) {
            $data_log_activity = [
                'user_id' => Auth::user()->id,
                'page_title' => 'Penduduk',
                'url' => URL::current(),
            ];

            LogActivity::create($data_log_activity);
        }
        
        return view('back.penduduk.index', $data);
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
        $data = [
            'nama' => $request->nama,
            'no_ktp' => $request->no_ktp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat
        ];

        Penduduk::create($data)
        ? Alert::success('Sukses', "Data Penduduk berhasil ditambahkan.")
        : Alert::error('Error', "Data Penduduk gagal ditambahkan!");

        return redirect()->back();
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
        $penduduk = Penduduk::find($id);
       
        $data = [
            'nama' => $request->edit_nama ? $request->edit_nama : $penduduk->nama,
            'no_ktp' => $request->edit_no_ktp ? $request->edit_no_ktp : $penduduk->no_ktp,
            'jenis_kelamin' => $request->edit_jenis_kelamin ? $request->edit_jenis_kelamin : $penduduk->jenis_kelamin,
            'tanggal_lahir' => $request->edit_tanggal_lahir ? $request->edit_tanggal_lahir : $penduduk->tanggal_lahir,
            'alamat' => $request->edit_alamat ? $request->edit_alamat : $penduduk->alamat,
        ];

        $penduduk->update($data)
            ? Alert::success('Sukses', "Data Penduduk telah berhasil diubah.")
            : Alert::error('Error', "Data Penduduk telah gagal diubah!");

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penduduk = Penduduk::find($id);

        $penduduk->delete()
        ? Alert::success('Sukses', "Data Penduduk berhasil dihapus.")
        : Alert::error('Error', "Data Penduduk gagal dihapus!");

        return redirect()->back();
    }

    function checkNoKtp(Request $request)
    {
        if($request->Input('no_ktp')){
            $no_ktp = Penduduk::where('no_ktp',$request->Input('no_ktp'))->first();
            if($no_ktp){
                return 'false';
            }else{
                return  'true';
            }
        }

        if($request->Input('edit_no_ktp')){
            $edit_no_ktp = Penduduk::where('no_ktp',$request->Input('edit_no_ktp'))->first();
            if($edit_no_ktp){
                return 'false';
            }else{
                return  'true';
            }
        }
    }
}
