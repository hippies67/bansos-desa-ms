<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RefPeriode;
use RealRashid\SweetAlert\Facades\Alert;

class RefPeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ref_periode'] = RefPeriode::all();
        return view('back.ref_periode.index', $data);
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
            'tahun_mulai' => $request->tahun_mulai,
            'tahun_akhir' => $request->tahun_akhir,
            'status' => $request->status
        ];

        RefPeriode::create($data)
        ? Alert::success('Sukses', "Ref Periode berhasil ditambahkan.")
        : Alert::error('Error', "Ref Periode gagal ditambahkan!");

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
        $ref_periode = RefPeriode::find($id);
       
        $data = [
            'tahun_mulai' => $request->edit_tahun_mulai ? $request->edit_tahun_mulai : $ref_periode->tahun_mulai,
            'tahun_akhir' => $request->edit_tahun_akhir ? $request->edit_tahun_akhir : $ref_periode->tahun_akhir,
            'status' => $request->edit_status ? $request->edit_status : $ref_periode->status,
        ];

        $ref_periode->update($data)
            ? Alert::success('Sukses', "Ref Periode telah berhasil diubah.")
            : Alert::error('Error', "Ref Periode telah gagal diubah!");

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
        $ref_periode = RefPeriode::find($id);

        $ref_periode->delete()
        ? Alert::success('Sukses', "Ref Periode berhasil dihapus.")
        : Alert::error('Error', "Ref Periode gagal dihapus!");

        return redirect()->back();
    }

    function checkTahunMulai(Request $request)
    {
        if($request->Input('tahun_mulai')){
            $tahun_mulai = RefPeriode::where('tahun_mulai',$request->Input('tahun_mulai'))->first();
            if($tahun_mulai){
                return 'false';
            }else{
                return  'true';
            }
        }

        if($request->Input('edit_tahun_mulai')){
            $edit_tahun_mulai = RefPeriode::where('tahun_mulai',$request->Input('edit_tahun_mulai'))->first();
            if($edit_tahun_mulai){
                return 'false';
            }else{
                return  'true';
            }
        }
    }

    function checkTahunAkhir(Request $request)
    {
        if($request->Input('tahun_akhir')){
            $tahun_akhir = RefPeriode::where('tahun_akhir',$request->Input('tahun_akhir'))->first();
            if($tahun_akhir){
                return 'false';
            }else{
                return  'true';
            }
        }

        if($request->Input('edit_tahun_akhir')){
            $edit_tahun_akhir = RefPeriode::where('tahun_akhir',$request->Input('edit_tahun_akhir'))->first();
            if($edit_tahun_akhir){
                return 'false';
            }else{
                return  'true';
            }
        }
    }
}
