<div class="row text-center">
    @foreach($team as $data)
        <div class="col-md-3" data-bs-toggle="modal" data-bs-target="#team{{ $data->id }}">
            <div class="card" style="border: none;">
                <img src="{{ Storage::url($data->photo) }}" class="card-img-top" style="margin: auto;height : 300px; object-fit: contain;"
                    alt="...">
                <div class="card-body">
                    <h4 class="text-center">{{ $data->fullname }}</h4>
                    <p class="card-text text-center">{{ $data->position }}</p>
                </div>
            </div>
        </div>

        <!-- Modal Adnan -->
        <div class="modal fade" id="team{{ $data->id }}" tabindex="-1" aria-labelledby="team" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="modal-img text-center mb-3">
                                    <img src="{{ Storage::url($data->photo) }}" alt="">
                                </div>
                                <h3 class="text-img" style="color: #ffd800;">{{ $data->fullname }}</h3>
                                <p class="card-text-dialog-box text-img text-white">{{ $data->position }}</p>
                            </div>
                            <div class="col-md-8">
                                <div class="modal-text py-2 px-5 text-start">
                                    <h3 class="text-white fw-bold">{{ $data->fullname }}</h3>
                                    <p class="card-text-dialog-box text-white">{{ $data->position }}</p>
                                    <p class="text-white">We are young and creative people who are trying to find
                                        and develop our
                                        talents. We can only do small things on our own, but together we can do
                                        extraordinary things.
                                        <br><br> We are young and creative people who are trying to find and develop
                                        our
                                        talents. We can only do small things on our own, but together we can do
                                        extraordinary things. We
                                        are young and creative people who are trying to find and develop our
                                        talents. We can only do small things on our own, but together we can do
                                        extraordinary things.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>