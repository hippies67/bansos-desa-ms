<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Hash;
use Alert;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data['users'] = User::all();
        return view('back.manajemen_akun.user', $data);
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
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'password' => Hash::make($request->password)
        ];

        User::create($data)
        ? Alert::success('Sukses', "User berhasil ditambahkan.")
        : Alert::error('Error', "User gagal ditambahkan!");

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

    public function edit_password($id) 
    {
        $data['user'] = User::find($id);   
        return view('back.manajemen_akun.update_password', $data);
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
        $user = User::find($id);
       
        $data = [
            'nama_lengkap' => $request->edit_nama_lengkap ? $request->edit_nama_lengkap : $user->nama_lengkap,
            'email' => $request->edit_email ? $request->edit_email : $user->email,
            'no_telp' => $request->edit_no_telp ? $request->edit_no_telp : $user->no_telp,
            'alamat' => $request->edit_alamat ? $request->edit_alamat : $user->alamat,
            'jenis_kelamin' => $request->edit_jenis_kelamin ? $request->edit_jenis_kelamin : $user->jenis_kelamin,
            'tgl_lahir' => $request->edit_tgl_lahir ? $request->edit_tgl_lahir : $user->tgl_lahir
        ];

        $user->update($data)
            ? Alert::success('Sukses', "User telah berhasil diubah.")
            : Alert::error('Error', "User telah gagal diubah!");

        return redirect()->back();
    }

    public function update_password(Request $request, $id) 
    {
            $user = User::find($id);

            $this->validate($request, [
           
                // 'password_lama' => ['required', new MatchOldPassword],
                'password_baru' => 'required',
                'konfirmasi_password_baru' => 'same:password_baru',
            ],
            [
                'password_lama.required' => 'Password Lama harus di isi.',
                'password_baru.required' => 'Password Baru harus di isi.',
                'konfirmasi_password_baru.same' => 'Konfirmasi Password Baru tidak sama.',
            ]);
        
        
        $data = [
            'password' => Hash::make($request->password_baru)
        ];

        $user->update($data)
            ? Alert::success('Sukses', "User telah berhasil diubah.")
            : Alert::error('Error', "User gagal diubah!");

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
        $users = User::find($id);

        $users->delete()
        ? Alert::success('Sukses', "User berhasil dihapus.")
        : Alert::error('Error', "User gagal dihapus!");

        return redirect()->back();
    }

    function checkEmail(Request $request)
    {
        if($request->Input('email')){
            $email = User::where('email',$request->Input('email'))->first();
            if($email){
                return 'false';
            }else{
                return  'true';
            }
        }

        if($request->Input('edit_email')){
            $checkEmail = User::where('email',$request->Input('edit_email'))->first();
            if($checkEmail){
                return 'false';
            }else{
                return  'true';
            }
        }
    }
}
