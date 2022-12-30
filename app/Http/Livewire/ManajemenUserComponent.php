<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Carbon\Caron;
use Livewire\WithPagination;

class ManajemenUserComponent extends Component
{
    use WithPagination;
    // public $comments;

    public $newComment;
    public $nama_lengkap;
    public $email;
    public $password;
    public $password_confirmation;
    public $no_telp;
    public $alamat;
    public $tgl_lahir;
    public $jenis_kelamin;
    // public $image;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }


    public function mount()
    {
        // $initialComments = Comment::latest()->paginate(5);
        // $this->comments = $initialComments;
    }
    
    public function updated($field)
    {
        $this->validateOnly($field, [
            'newComment' => 'required|max:255'
        ]); 
    }

    public function userStore()
    {
       
        $this->validate([
            'nama_lengkap' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        $this->nama_lengkap = "";
    }

    public function storeImage()
    {
        if(!$this->image) return null;
    }

    public function remove($userId)
    {
        $user = User::find($userId);
        $user->delete();
        
        session()->flash('message', 'User telah berhasil dihapus.');
    
    }
    
    public function render()
    {
        return view('livewire.manajemen-user-component', [
            'users' => User::latest()->paginate(3)
        ])->extends('back.layouts.data')->section('content');
        
    }
}
