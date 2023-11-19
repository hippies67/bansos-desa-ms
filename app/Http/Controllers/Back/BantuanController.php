<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisBantuan;
use App\Models\Bantuan;
use RealRashid\SweetAlert\Facades\Alert;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bantuan'] = Bantuan::all();
        $data['jenis_bantuan'] = JenisBantuan::where('status', 'Y')->get();

        return view('back.bantuan.index', $data);
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
            'jenis_bantuan_id' => $request->jenis_bantuan_id,
            'nama_bantuan' => $request->nama_bantuan,
            'keterangan' => $request->keterangan
        ];

        Bantuan::create($data)
        ? Alert::success('Sukses', "Data Bantuan berhasil ditambahkan.")
        : Alert::error('Error', "Data Bantuan gagal ditambahkan!");

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
        $penduduk = Bantuan::find($id);
       
        $data = [
            'jenis_bantuan_id' => $request->edit_jenis_bantuan_id ? $request->edit_jenis_bantuan_id : $penduduk->jenis_bantuan_id,
            'nama_bantuan' => $request->edit_nama_bantuan ? $request->edit_nama_bantuan : $penduduk->nama_bantuan,
            'keterangan' => $request->edit_keterangan ? $request->edit_keterangan : $penduduk->keterangan,
        ];

        $penduduk->update($data)
            ? Alert::success('Sukses', "Data Bantuan telah berhasil diubah.")
            : Alert::error('Error', "Data Bantuan telah gagal diubah!");

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
        $penduduk = Bantuan::find($id);

        $penduduk->delete()
        ? Alert::success('Sukses', "Data Bantuan  berhasil dihapus.")
        : Alert::error('Error', "Data Bantuan  gagal dihapus!");

        return redirect()->back();
    }
}