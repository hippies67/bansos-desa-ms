    <div class="row">
        @foreach ($project_result as $project)
        <div class="col-md-4">
            <div class="card" id="thisIs">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <span class="badge badge-primary">{{ Str::limit($project->name, 30) }}</span>
                    </div>
                    <br>
                    <img src="{{ Storage::url($project->image) }}" alt="" class="img-fluid rounded mt-1"
                        style="width:100%; height:200px; object-fit:cover;">
                    <div class="btn-group text-center buttonGroup mt-3" id="buttonGroup">
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                            data-target="#editProject{{ $project->id }}"><i class="far fa-edit"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteProject({{$project->id}})"><i
                                class="far fa-trash-alt"></i></button>
                        <button type="button" class="btn btn-sm btn-dark" data-toggle="modal"
                            data-target="#more{{ $project->id }}">More</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>