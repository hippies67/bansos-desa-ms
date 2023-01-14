<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Alert;
use Storage;

class ProjectBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['project'] = Project::latest()->paginate(6);
        $data['allProject'] = Project::latest()->get();
        return view('back.project.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function searchProject(Request $request)
    {
        $search_val = $request->search;
        if($request->ajax()){
            $project_result = Project::where('name','LIKE',"%{$search_val}%")->limit(6)->get();
            return view('back.project.search', compact('project_result'))->render();
        }
    }

    function projectPagination(Request $request)
    {
        if($request->ajax()) {
            $project = Project::latest()->paginate(6);
            return view('back.project.pagination', compact('project'))->render();
        }
    }

    public function checkProjectName(Request $request) 
    {
        if($request->Input('project_name')){
            $project_name = Project::where('name',$request->Input('project_name'))->first();
            if($project_name){
                return 'false';
            }else{
                return  'true';
            }
        }

        if($request->Input('edit_project_name')){
            $edit_project_name = Project::where('name',$request->Input('edit_project_name'))->first();
            if($edit_project_name){
                return 'false';
            }else{
                return  'true';
            }
        }
    }

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
        $image = ($request->project_image) ? $request->file('project_image')->store("/public/input/projects") : null;
        
        $data = [
            'name' => $request->project_name,
            'description' => $request->project_description,
            'link' => $request->project_link,
            'image' => $image,
        ];

        Project::create($data)
        ? Alert::success('Berhasil', 'Produk telah berhasil ditambahkan!')
        : Alert::error('Error', 'Produk gagal ditambahkan!');
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
        $project = Project::findOrFail($id);
        if($request->hasFile('edit_project_image')) {
            if(Storage::exists($project->image) && !empty($project->image)) {
                Storage::delete($project->image);
            }

            $edit_image = $request->file("edit_project_image")->store("/public/input/projects");
        }
        $data = [
            'name' => $request->edit_project_name ? $request->edit_project_name : $project->name,
            'description' => $request->edit_project_description ? $request->edit_project_description : $project->description,
            'link' => $request->edit_project_link ? $request->edit_project_link : $project->link,
            'image' => $request->hasFile('edit_project_image') ? $edit_image : $project->image,
           
        ];

        $project->update($data)
        ? Alert::success('Berhasil', "Project telah berhasil diubah!")
        : Alert::error('Error', "Project gagal diubah!");

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
        $project = Project::find($request->id);

        $project->delete();

        return 'true';
    }
}
