<div class="row">
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

    {{-- <!-- Modal Lify -->
    <div class="modal fade" id="lify" tabindex="-1" aria-labelledby="lify" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="modal-img text-center mb-5">
              <img src="{{ asset('front/img/Lify.png') }}" alt="">
            </div>
            <div class="modal-text py-2 px-5">
              <h3><span>LIFY</span></h3>
              <p class="card-text-dialog-box text-white mt-4">Livy is a full-services digital marketing agencies and
                acts as a full-service provider to create the right setup and marketing mix for each product and
                brand to deliver measurable and sustainable results.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Modal -->

    <div class="col-md-4">
      <div class="card" data-bs-toggle="modal" data-bs-target="#diggie">
        <img src="{{ asset('front/img/Diggie.png') }}" alt="">
        <div class="card-body">
          <h4 class="text-center">DIGGIE</h4>
          <p class="card-text">Design web that promises to scale your business better and bigger. We will provide
            the best design for you and all the elements are here to provide what you want.</p>
        </div>
      </div>
    </div>

    <!-- Modal Diggie -->
    <div class="modal fade" id="diggie" tabindex="-1" aria-labelledby="diggie" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="modal-img text-center mb-5">
              <img src="{{ asset('front/img/Diggie.png') }}" alt="">
            </div>
            <div class="modal-text py-2 px-5">
              <h3><span>DIGGIE</span></h3>
              <p class="card-text-dialog-box text-white mt-4">Design web that promises to scale your business better
                and bigger. We will provide the best design for you and all the elements are here to provide what
                you want. will provide the design for you and all the elements are here to provide what you want.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Modal -->

    <div class="col-md-4">
      <div class="card" data-bs-toggle="modal" data-bs-target="#cuanhub">
        <img src="{{ asset('front/img/Cuanhub.png') }}" class="card-img-top img-desktop" style=" margin: auto; margin-top: 30px;"
          alt="...">
        <div class="card-body">
          <h4 class="text-center">CUANHUB</h4>
          <p class="card-text">Rumahbarang is a B2B Marketplace from Indonesia. Rumahbarang is here to solve the
            problem of a high factory MOQ (Minimum Order Quantity) mismatch with a relatively low demand for
            small-scale buyers.</p>
        </div>
      </div>
    </div>

    <!-- Modal CUANHUB -->
    <div class="modal fade" id="cuanhub" tabindex="-1" aria-labelledby="cuanhub" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="modal-img text-center mb-5">
              <img src="{{ asset('front/img/Cuanhub.png') }}" alt="">
            </div>
            <div class="modal-text py-2 px-5">
              <h3><span>CUANHUB</span></h3>
              <p class="card-text-dialog-box text-white mt-4">Rumahbarang is a B2B Marketplace from Indonesia.
                Rumahbarang is here to solve the problem of a high factory MOQ (Minimum Order Quantity) mismatch
                with a relatively low demand for small-scale buyers.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Modal --> --}}
    
  </div>