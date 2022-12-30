<div class="row">
    @foreach($blog as $data)
    <div class="col-md-4 d-flex align-items-stretch">
        <a href="{{ url('blog', $data->slug) }}">
            <div class="card" style="width: 22rem;">
                <div class="img-box" style="overflow: hidden;">
                    <img src="{{ asset('artikel/'. $data->thumbnail) }}" class="card-img-top image-hover">
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <img src="http://127.0.0.1:8000/tahu.png" class="author" width="35" height="35" alt="author">
                        <small style="text-decoration: none; color: #acacac; padding-top: 5px; padding-left: 10px !important;">ADMIN</small>
                        <small style="text-decoration: none; color: #acacac; padding-top: 5px; padding-left: 10px !important;">&#8226;</small>
                        <small style="text-decoration: none; color: #acacac; padding-top: 5px; padding-left: 10px !important">{{ $data->updated_at->format('d M Y')}}</small>
                    </div>
                    <h4 class="mt-4">{{ Str::limit($data->judul, 43) }}</h4>
                    <p>{!! strip_tags(Str::limit($data->konten, 300)) !!}</p>
                    {{-- <p class="card-text">{{ $data->user->nama_lengkap }} <br> {{ $data->updated_at->format('d M Y')}}</p> --}}
                </div>
              </div>
        </a>
    </div>
    @endforeach
</div>
