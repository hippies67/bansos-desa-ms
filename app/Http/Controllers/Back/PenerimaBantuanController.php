<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenerimaBantuan;
use App\Models\Penduduk;
use App\Models\Bantuan;
use RealRashid\SweetAlert\Facades\Alert;

class PenerimaBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['penerima_bantuan'] = PenerimaBantuan::all();
        $data['penduduk'] = Penduduk::all();
        $data['bantuan'] = Bantuan::all();

        return view('back.penerima_bantuan.index', $data);
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
            'penduduk_id' => $request->penduduk_id,
            'bantuan_id' => $request->bantuan_id,
            'jumlah_penerimaan' => $request->jumlah_penerimaan,
            'tanggal_penerimaan' => $request->tanggal_penerimaan
        ];

        PenerimaBantuan::create($data)
        ? Alert::success('Sukses', "Data Penerimaan Bantuan berhasil ditambahkan.")
        : Alert::error('Error', "Data Penerimaan Bantuan gagal ditambahkan!");

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
        $penduduk = PenerimaBantuan::find($id);
       
        $data = [
            'penduduk_id' => $request->edit_penduduk_id ? $request->edit_penduduk_id : $penduduk->penduduk_id,
            'bantuan_id' => $request->edit_bantuan_id ? $request->edit_bantuan_id : $penduduk->bantuan_id,
            'jumlah_penerimaan' => $request->edit_jumlah_penerimaan ? $request->edit_jumlah_penerimaan : $penduduk->jumlah_penerimaan,
            'tanggal_penerimaan' => $request->edit_tanggal_penerimaan ? $request->edit_tanggal_penerimaan : $penduduk->tanggal_penerimaan,
        ];

        $penduduk->update($data)
            ? Alert::success('Sukses', "Data Penerimaan Bantuan telah berhasil diubah.")
            : Alert::error('Error', "Data Penerimaan Bantuan telah gagal diubah!");

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
        $penduduk = PenerimaBantuan::find($id);

        $penduduk->delete()
        ? Alert::success('Sukses', "Data Penerimaan Bantuan  berhasil dihapus.")
        : Alert::error('Error', "Data Penerimaan Bantuan  gagal dihapus!");

        return redirect()->back();
    }
}