    <div class="row">
        @foreach ($project as $projects)
        <div class="col-md-4">
            <div class="card" id="thisIs">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <span class="badge badge-primary">{{ Str::limit($projects->name, 30) }}</span>
                    </div>
                    <br>
                    <img src="{{ Storage::url($projects->image) }}" alt="" class="img-fluid rounded mt-1"
                        style="width:100%; height:200px; object-fit:cover;">
                    <div class="btn-group text-center buttonGroup mt-3" id="buttonGroup">
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                            data-target="#editProject{{ $projects->id }}"><i class="far fa-edit"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteProject({{$projects->id}})"><i
                                class="far fa-trash-alt"></i></button>
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                            data-target="#more{{ $projects->id }}"><i class="fas fa-eye"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
<div class="d-flex justify-content-center">
    {{ $project->links('vendor.pagination.custom') }}
</div>