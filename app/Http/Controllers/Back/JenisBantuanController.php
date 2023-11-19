<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisBantuan;
use App\Models\LogActivity;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UserAuthInfo;
use Illuminate\Support\Facades\Request as RequestInfo;
use Auth;

class JenisBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jenis_bantuan'] = JenisBantuan::all();

        if(!UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', RequestInfo::ip())->exists()) {
            $data_log_activity = [
                'user_id' => Auth::user()->id,
                'page_title' => 'Jenis Bantuan',
                'url' => URL::current(),
            ];

            LogActivity::create($data_log_activity);
        }
        
        return view('back.jenis_bantuan.index', $data);
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
            'nama_jenis_bantuan' => $request->nama_jenis_bantuan,
            'status' => $request->status
        ];

        JenisBantuan::create($data)
        ? Alert::success('Sukses', "Data Jenis Bantuan berhasil ditambahkan.")
        : Alert::error('Error', "Data Jenis Bantuan gagal ditambahkan!");

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
        $penduduk = JenisBantuan::find($id);
       
        $data = [
            'nama_jenis_bantuan' => $request->edit_nama_jenis_bantuan ? $request->edit_nama_jenis_bantuan : $penduduk->nama_jenis_bantuan,
            'status' => $request->edit_status ? $request->edit_status : $penduduk->status,
        ];

        $penduduk->update($data)
            ? Alert::success('Sukses', "Data Jenis Bantuan telah berhasil diubah.")
            : Alert::error('Error', "Data Jenis Bantuan telah gagal diubah!");

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
        $penduduk = JenisBantuan::find($id);

        $penduduk->delete()
        ? Alert::success('Sukses', "Data Jenis Bantuan berhasil dihapus.")
        : Alert::error('Error', "Data Jenis Bantuan gagal dihapus!");

        return redirect()->back();
    }
}