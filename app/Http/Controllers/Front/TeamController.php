<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\RefDivisi;
use App\Models\RefPeriode;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTeam(Request $request)
    {
        $data['team'] = Team::paginate(20);
        $data['ref_periode'] = RefPeriode::orderBy('tahun_mulai')->get();

    	if ($request->ajax()) {
    		$view = view('front.team.load_team', $data)->render();
            return response()->json(['html'=>$view]);
        }

        return view('front.team.index', $data);
    }

    public function allTeam(Request $request)
    {
        $data['team'] = Team::groupBy('fullname')->get();
        $data['ref_periode'] = RefPeriode::orderBy('tahun_mulai')->get();

        if ($request->ajax()) {
    		$view = view('front.team.load_team', $data)->render();
            return response()->json(['html'=>$view]);
        }

        return view('front.team.all_team', $data);
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

    public function ref_divisi(Request $request)
    {

        if(isset($request->ref_periode_id)) {
                $ref_divisi = RefDivisi::where('status', '=', 'Y')->where('ref_periode_id', $request->ref_periode_id)->get();
                $team = Team::where('ref_periode_id', $request->ref_periode_id)->get();
        } else {
            if(RefPeriode::where(function($q) {
                $q->where('tahun_mulai', Date('Y'))
                  ->orWhere('tahun_akhir', Date('Y'));
            })->exists()) {
                $ref_periode = RefPeriode::where(function($q) {
                    $q->where('tahun_mulai', Date('Y'))
                      ->orWhere('tahun_akhir', Date('Y'));
                })->first();
    
                $ref_divisi = RefDivisi::where('status', '=', 'Y')->where('ref_periode_id', $ref_periode->id)->get();
                $team = Team::where('ref_periode_id', $ref_periode->id)->get();
            } else {
                $ref_divisi = RefDivisi::where('status', '=', 'Y')->get();
            }
        }

        

        // return json_encode($ref_divisi);

        $wrap = [];
        $team_name = null;
        $id_induk = null;
        $obj = null;

        foreach($team as $key => $data) {
            if($data->ref_divisi_id == '') {
                continue;
            }

            // if($key > 10) {
            //     break;
            // }
            
            $wrap[] = [$data->fullname, Storage::url($data->photo), $data->ref_divisi->nama, $data->ref_divisi->id, $data->ref_divisi->id_induk, $data->description];
            // $team_name = $data->fullname;
            // $induk_name = $data->ref_divisi->nama;
            // $induk_id = $data->ref_divisi->id_induk;
        }

        $final = [$wrap, $ref_divisi];
        return json_encode($final);

    }
}
