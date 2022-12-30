<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use Hash;
use Alert;
use Str;
use File;
use Auth;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $data['artikel'] = Artikel::paginate(10);
        $data['artikel_published'] = Artikel::where('status', 'published')->paginate(10);
        $data['artikel_unpublished'] = Artikel::where('status', 'unpublished')->paginate(10);

        return view('back.artikel.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_thumbnail = $request->file('thumbnail');
        $nama_thubmnail = time()."_".$file_thumbnail->getClientOriginalName();
        $tujuan_upload = 'artikel';
        $file_thumbnail->move($tujuan_upload,$nama_thubmnail);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'thumbnail' => $nama_thubmnail,
            'konten' => $request->konten,
            'status' => $request->status,
            'user_id' => Auth::user()->id
        ];

        Artikel::create($data)
        ? Alert::success('Sukses', "Artikel berhasil ditambahkan.")
        : Alert::error('Error', "Artikel gagal ditambahkan!");

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
        $data['artikel'] = Artikel::find($id);

        return view('back.artikel.edit', $data);
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
        $artikel = Artikel::find($id);
        
        
        if ($request->file('edit_thumbnail')) {

            $tempatPenyimpanan = public_path("artikel/{$artikel->thumbnail}");

            if (File::exists($tempatPenyimpanan) && !empty($artikel->thumbnail)) {
                unlink($tempatPenyimpanan);
            }
        }
        
        if ($request->file('edit_thumbnail')) {
            $file_thumbnail = $request->file('edit_thumbnail');
            $nama_thubmnail = time()."_".$file_thumbnail->getClientOriginalName();
            $tujuan_upload = 'artikel';
            $file_thumbnail->move($tujuan_upload,$nama_thubmnail);
        }

        $data = [
            'judul' => $request->edit_judul ? $request->edit_judul : $artikel->judul,
            'slug' => $request->edit_judul ? Str::slug($request->edit_judul) : $artikel->slug,
            'thumbnail' => isset($nama_thubmnail) ? $nama_thubmnail : $artikel->thumbnail,
            'konten' => $request->edit_konten ? $request->edit_konten : $artikel->konten,
            'status' => $request->edit_status ? $request->edit_status : $artikel->status
        ];

        $artikel->update($data)
            ? Alert::success('Sukses', "Artikel telah berhasil diubah.")
            : Alert::error('Error', "Artikel telah gagal diubah!");

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $artikel = Artikel::where('id', $request->id)->first();

        $artikel->delete();

    }

    public function hapus(Request $request)
    {
        
        $artikel = Artikel::find($request->id);

        $artikel->delete();

        return 'true';
    }

    function checkJudul(Request $request)
    {
        if($request->Input('judul')){
            $judul = Artikel::where('judul',$request->Input('judul'))->first();
            if($judul){
                return 'false';
            }else{
                return  'true';
            }
        }

        if($request->Input('edit_judul')){
            $checkJudul = Artikel::where('judul',$request->Input('edit_judul'))->first();
            if($checkJudul){
                return 'false';
            }else{
                return  'true';
            }
        }
    }
}
