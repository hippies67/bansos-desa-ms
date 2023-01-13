<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RefDivisi;
use App\Models\RefPeriode;

class RefDivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if(RefDivisi::with('children')->where('level', 1)->exists()) {
            $ref_periode = RefPeriode::where(function($q) {
                $q->where('tahun_mulai', Date('Y'))
                  ->orWhere('tahun_akhir', Date('Y'));
            })->first();
            $data['list'] = RefDivisi::with('children')->where('level', 1)->where('ref_periode_id', $ref_periode->id)->get();
            $data['ref_periode'] = RefPeriode::orderBy('tahun_mulai')->get();
        } else {
            $ref_periode = RefPeriode::where(function($q) {
                $q->where('tahun_mulai', Date('Y'))
                  ->orWhere('tahun_akhir', Date('Y'));
            })->first();
            $data['list'] = RefDivisi::where('ref_periode_id', $ref_periode->id)->get();
            $data['ref_periode'] = RefPeriode::orderBy('tahun_mulai')->get();
        }
        // dd($data['list']);die;
        return view('back.ref_divisi.index', $data);
    }

    public function generateDivisi(Request $request)
    {
        if(RefDivisi::with('children')->where('level', 1)->exists()) {
            $data['list'] = RefDivisi::with('children')->where('level', 1)->where('ref_periode_id', $request->ref_periode_id)->get();
        } else {
            $data['list'] = RefDivisi::where('ref_periode_id', $request->ref_periode_id)->get();
        }

        return view('back.ref_divisi.generate', $data);
    }

    public function generateAddModal(Request $request)
    {
        $data['ref_periode'] = RefPeriode::where('id', $request->ref_periode_id)->first();

        return view('back.ref_divisi.generate_add', $data);
    }

    public function generateEditModal(Request $request)
    {
        $data['ref_periode_all'] = RefPeriode::orderBy('tahun_mulai')->get();
        $data['ref_periode'] = RefPeriode::where('id', $request->ref_periode_id)->first();
        $data['ref_divisi'] = RefDivisi::where('id', $request->ref_divisi_id)->first();
        $data['induk'] = RefDivisi::where('id', $data['ref_divisi']->id_induk)->get();

        return view('back.ref_divisi.generate_edit', $data);
    }

    public function RefDivisiInduk($id, $ref_periode_id)
    {
        $data = RefDivisi::where('level', $id)->where('ref_periode_id', $ref_periode_id)->get();
        return json_encode($data);
    }

    public function RefDivisiStore(Request $request)
    {

       $request->validate([
           'nama' => 'required',
           'level' => 'required',
           'status' => 'required'
       ]);

       $insert = new RefDivisi([
           'nama' => $request->nama,
           'level' => $request->level,
           'id_induk' => $request->id_induk,
           'status' => $request->status,
           'ref_periode_id' => $request->ref_periode_id
           
       ]);

       if ($insert->save()) {
            return response()->json([
                'status' => 'success',
                'data' => $insert
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);

        }
    }

    public function RefDivisiDetail($id)
    {
        $detail = RefDivisi::findOrFail($id);

        if ($detail) {
             return response()->json([
                 'status' => 'success',
                 'data' => $detail
             ]);
         }else{
             return response()->json([
                 'status' => 'error'
             ]);
 
         }
    }

    public function RefDivisiUpdate(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'level' => 'required',
            'status' => 'required'
        ]);

        $update = RefDivisi::findOrFail($request->id);
        $update->nama = $request->nama;
        $update->level = $request->level;
        $update->id_induk = $request->id_induk;
        $update->status = $request->status;
        
        if ($update->save()) {
             return response()->json([
                 'status' => 'success',
                 'data' => $update
             ]);
         }else{
             return response()->json([
                 'status' => 'error'
             ]);
 
         }
    }

    public function RefDivisiDelete(Request $request)
    {
        $delete = RefDivisi::findOrFail($request->id);
 
        if ($delete->delete()) {
             return response()->json([
                 'status' => 'success',
                 'data' => $delete
             ]);
         }else{
             return response()->json([
                 'status' => 'error'
             ]);
 
         }
    }
}
