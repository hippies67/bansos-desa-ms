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
            $data['list'] = RefDivisi::with('children')->where('level', 1)->get();
            $data['ref_periode'] = RefPeriode::all();
        } else {
            $data['list'] = RefDivisi::all();
            $data['ref_periode'] = RefPeriode::all();
        }
        // dd($data['list']);die;
        return view('back.ref_divisi.index', $data);
    }

    public function RefDivisiInduk($id)
    {
        $data = RefDivisi::where('level', $id)->get();
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
           'status' => $request->status
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
