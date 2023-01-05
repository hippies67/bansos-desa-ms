<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\RefDivisi;
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

    	if ($request->ajax()) {
    		$view = view('front.team.load_team', $data)->render();
            return response()->json(['html'=>$view]);
        }

        return view('front.team.index', $data);
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
        $ref_divisi = RefDivisi::where('status', '=', 'Y')->get();

        // return json_encode($ref_divisi);

        $team = Team::all();
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
            
            $wrap[] = [$data->fullname, Storage::url($data->photo), $data->ref_divisi->nama, $data->ref_divisi->id, $data];
            // $team_name = $data->fullname;
            // $induk_name = $data->ref_divisi->nama;
            // $induk_id = $data->ref_divisi->id_induk;
        }

        $final = [$wrap, $ref_divisi];
        return json_encode($final);

    }
}
