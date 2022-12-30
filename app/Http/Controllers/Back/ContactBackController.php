<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Alert;

class ContactBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['contact'] = Contact::paginate(6);
        return view('back.contact.index', $data);
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
            'name' => $request->name,
            'subject' => $request->subject,
            'email' => $request->email,
            'message' => $request->message
        ];

        Contact::create($data)
        ? Alert::success('Berhasil', 'Contact telah berhasil ditambahkan!')
        : Alert::error('Error', 'Contact gagal ditambahkan!');
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
        $data['contact'] = Contact::find($id);

        return view('back.contact.show', $data);
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
        $contact = Contact::findOrFail($id);
        
        $data = [
            'name' => $request->edit_name ? $request->edit_name : $contact->name,
            'subject' => $request->edit_subject ? $request->edit_subject : $contact->subject,
            'email' => $request->edit_email ? $request->edit_email : $contact->email,
            'message' => $request->edit_message ? $request->edit_message : $contact->message,
        ];

        $contact->update($data)
        ? Alert::success('Berhasil', "Contact telah berhasil diubah!")
        : Alert::error('Error', "Contact gagal diubah!");

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
        //
    }

    public function hapus(Request $request)
    {
        $contact = Contact::find($request->id);

        $contact->delete();

        return 'true';
    }
}
