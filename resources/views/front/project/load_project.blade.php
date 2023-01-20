<div class="row" id="projectAll">
    @foreach($project as $data)
    <div class="col-md-4">
      <div class="card" data-bs-toggle="modal" data-bs-target="#project{{ $data->id }}"">
        <img src="{{ Storage::url($data->image) }}" class="card-img-top img-desktop" style=" margin: auto; margin-top: 30px;"
          alt="...">
        <div class="card-body">
          <h4 class="text-center">{{ strtoupper($data->name) }}</h4>
          <p class="card-text">{!! strip_tags(Str::limit($data->description, 63)) !!}</p>
        </div>
      </div>
    </div>

    <div class="modal fade" id="project{{ $data->id }}" tabindex="-1" aria-labelledby="project" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="modal-img text-center mb-5">
              <img src="{{ Storage::url($data->image) }}" alt="">
            </div>
            <div class="modal-text py-2 px-5">
              <h3><span>{{ $data->name }}</span></h3>
              <p class="card-text-dialog-box text-white mt-4">{{ $data->description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    
  </div>

  <div class="row" id="projectTabletWrap" style="display: none;">
    @foreach($project as $data)
    <div class="col-md-6">
      <div class="card" data-bs-toggle="modal" data-bs-target="#projectTabletModal{{ $data->id }}">
        <img src="{{ Storage::url($data->image) }}" class="card-img-top img-desktop" style=" margin: auto; margin-top: 30px;"
          alt="...">
        <div class="card-body">
          <h4 class="text-center">{{ strtoupper($data->name) }}</h4>
          <p class="card-text">{!! strip_tags(Str::limit($data->description, 63)) !!}</p>
        </div>
      </div>
    </div>

    <div class="modal fade" id="projectTabletModal{{ $data->id }}" tabindex="-1" aria-labelledby="project" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="modal-img text-center mb-5">
              <img src="{{ Storage::url($data->image) }}" alt="">
            </div>
            <div class="modal-text py-2 px-5">
              <h3><span>{{ $data->name }}</span></h3>
              <p class="card-text-dialog-box text-white mt-4">{{ $data->description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    
  </div>