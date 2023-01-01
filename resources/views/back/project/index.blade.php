@extends('back.layouts.data')
@section('title', 'Project')
@section('css')
<link href="{{ asset('vendor/owl-carousel/owl.carousel.css" rel="stylesheet') }}">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.min.css" integrity="sha512-Yn5Z4XxNnXXE8Y+h/H1fwG/2qax2MxG9GeUOWL6CYDCSp4rTFwUpOZ1PS6JOuZaPBawASndfrlWYx8RGKgILhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
  integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  .dropify-wrapper {
        border: 1px solid #e2e7f1;
        border-radius: .3rem;
        height: 150px;
        margin-bottom: 10px;
    }

    .cke_chrome {
        border: 1px solid #e2e7f1 !important;
        border-width: thin;
    }

    .ck-editor__editable {
        min-height: 300px;
        margin-bottom: 10px;
    }

    span.file-icon {
        font-size: 18px !important;
    }

  .card {
    border-radius: 10px;
  }

  label.error {
    color: #f1556c;
    font-size: 13px;
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.5;
    margin-top: 5px;
    padding: 0;
  }

  input.error {
    color: #f1556c;
    border: 1px solid #f1556c;
  }

  #buttonGroup {
    display: block;
  }

  @media screen and (max-width: 455px) {
    .desktop-search {
      display: none;
    }

    .mobile-search-card {
      display: block !important;
    }
  }
</style>

@endsection
@section('content')
<section class="section">
  <div class="section-header">
    <div class="page-titles">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Project</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('project-back.index') }}">Data Project</a></li>
      </ol>
    </div>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between w-100">
              <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahProject"><i
                  class="fas fa-plus-circle"></i></button>
              <div class="d-flex justify-content-between">
                <input type="search" class="form-control desktop-search" id="projectSearch"
                  placeholder="Cari Project..." autocomplete="off" style="margin-right: 20px;">
                <input type="checkbox" id="checkAll" autocomplete="off" style="margin-right: 20px; display:none;">
                <button class="btn btn-sm btn-danger" id="deleteAllButton" data-toggle="modal"
                  data-target="#deleteAllConfirm" style="margin-right: 20px; display:none;"><i
                    class="fas fa-trash"></i></button>
                {{-- <button class="btn btn-sm btn-secondary" onclick="setting()"><i class="fas fa-cog"></i></button> --}}
              </div>
            </div>
          </div>
        </div>
        @if (count($project))
        <div class="card mobile-search-card" style="display: none">
          <div class="card-header">
            <input type="search" class="form-control mobile-search" id="mobileProjectSearch"
              placeholder="Cari Project..." autocomplete="off">
          </div>
        </div>
        @endif
      </div>
    </div>
    <div id="searchResult">

    </div>
    <div id="projectData">
      @include('back.project.pagination')
    </div>

  </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="tambahProject">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('project-back.store') }}" method="post" id="tambahProjectForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="project_name" placeholder="Nama">
          </div>
          <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="project_description" id="project_description" class="form-control" placeholder="Deskripsi"
              style="height: 30vh;"></textarea>
          </div>
          <div class="form-group">
            <label for="link">Link Project</label>
            <input type="text" class="form-control" name="project_link" placeholder="Link Project">
          </div>
          <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" class="form-control dropify" name="project_image"
              data-allowed-file-extensions="png jpg jpeg" data-show-remove="false">
            <div id="errorImage">

            </div>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary" id="tambahButton">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach ($allProject as $projects)
<div class="modal fade" tabindex="-1" role="dialog" id="editProject{{$projects->id}}">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('project-back.update', $projects->id) }}" method="post" id="editProjectForm"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" id="checkProjectName" value="{{ $projects->name }}">
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="edit_project_name" id="editName" placeholder="Nama"
              value="{{ $projects->name }}">
          </div>
          <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="edit_project_description" id="edit_project_description" class="form-control"
              placeholder="Deskripsi" style="height: 30vh;">{{ $projects->description }}</textarea>
          </div>
          <div class="form-group">
            <label for="link">Link Project</label>
            <input type="text" class="form-control" name="edit_link" id="editLink"
              placeholder="Link Project" value="{{ $projects->link }}">
          </div>
          <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" class="form-control dropify" name="edit_project_image"
              data-allowed-file-extensions="png jpg jpeg" data-default-file="@if(!empty($projects->image) &&
                            Storage::exists($projects->image)){{ Storage::url($projects->image) }}@endif"
              data-show-remove="false">
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary" id="editButton">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

@foreach ($allProject as $projects)
<div class="modal fade" tabindex="-1" role="dialog" id="more{{$projects->id}}">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Rincian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>{{ $projects->name }}</p>
        @if(!empty($projects->image) && Storage::exists($projects->image))
        <img src="{{ Storage::url($projects->image) }}" alt="" class="img-fluid rounded mt-1"
          style="width:100%; height:200px; object-fit:cover;">
        @endif
        <br><br>
        <p>{{ $projects->description }}</p>
        @if (isset($projects->link))
        <input type="text" class="form-control" value="{{ $projects->link }}" readonly>
        @endif
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Kembali</button>
      </div>
    </div>
  </div>
</div>
@endforeach

<div class="modal fade" tabindex="-1" role="dialog" id="deleteConfirm">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('project-back.destroy', '') }}" method="post" id="deleteProjectForm">
        @csrf
        @method('delete')
        <div class="modal-body">
          Apakah anda yakin untuk <b>menghapus</b> project ini ?
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary" id="deleteModalButton">Ya, Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="deleteAllConfirm">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Semua</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk <b>menghapus semua</b> project ?
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Kembali</button>
        <button type="button" class="btn btn-primary" id="deleteAllModalButton">Ya, Hapus Semua</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/deznav-init.js') }}"></script>
<script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>

<!-- Chart piety plugin files -->
<script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.min.js" integrity="sha512-ISPBRsvggCFa1YHNMzuhaNqa4vMzTpmxyWhtt01JOmJlbh+nQwAxH49NhbMAGRYviTcH4sy1Wg8SIkBkLyOEGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
  integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  // 
</script>
<script>
  $(document).ready(function() {

  $(document).on('click', '.page-link', function(event) {
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      project_pagination(page);
  });

  function project_pagination(page)
  {
      var _token = $("input[name=_token]").val();
      $.ajax({
        url: "{{ route('projectPagination') }}",
        method: "POST",
        data: {_token:_token, page:page},
        success: function(data) {
            $("#projectData").html(data);
        }
      });
  }

  $("#mobileProjectSearch, #projectSearch").keyup(function() {
    var _token = $("input[name=_token]").val();
    var originSearch = $("#projectSearch").val();
    var mobileOriginSearch = $("#mobileProjectSearch").val();
    if(originSearch == "") {
      var search = $("#mobileProjectSearch").val();
    } else {
      var search = $("#projectSearch").val();
    }
        $.ajax({
            url:"{{ route('searchProject') }}",
            method:"POST",
            data:{_token:_token, search:search},
            success:function(data) {
                if(search == "") {
                  $('#searchResult').html("");
                  $("#projectData").css('display','block');
                } else {
                  $('#searchResult').html(data);
                  $("#projectData").css('display','none');
                }
            }
        });
  });
});
</script>

<script>
  $('.dropify').dropify();
</script>
<script>
  $(document).ready(function() {

  $.ajaxSetup({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  
  $("#tambahProjectForm").validate({
      rules: {
        project_name:{
              required: true,
              remote: {
                        url: "{{ route('checkProjectName') }}",
                        type: "post",
              }
          },
          project_description:{
              required: true,
          },
          project_image:{
              required: true,
          },
          project_date_start:{
              required: true,
          },
      },
      messages: {
          project_name: {
                required: "Nama harus di isi",
                remote: "Nama sudah tersedia"
          },
          project_description: {
                  required: "Deskripsi harus di isi",
          },
          project_image: {
                  required: "Gambar harus di isi",
          },
          project_date_start: {
                  required: "Tanggal Mulai harus di isi",
          }
      },
    
      errorPlacement: function(error, element) {
        if(element.attr("name") == "project_image") {
          error.appendTo("#errorImage");
          // $(".dropify-wrapper").css('border-color', '#f1556c');
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function(form) {
        $("#tambahButton").prop('disabled', true);
            form.submit();
      }
  });
});

  $("#editProjectForm").validate({
      rules: {
        edit_project_name:{
              required: true,
              remote: {
                        param: {
                              url: "{{ route('checkProjectName') }}",
                              type: "post",
                        },
                        depends: function(element) {
                          // compare name in form to hidden field
                          return ($(element).val() !== $('#checkProjectName').val());
                        },
                      }
          },
          edit_project_description:{
              required: true,
          },
          edit_project_date_start:{
              required: true,
          },
      },
      messages: {
        edit_project_name: {
                required: "Nama harus di isi",
                remote: "Nama sudah tersedia"
          },
          edit_project_description: {
                  required: "Deskripsi harus di isi",
          },
          edit_project_date_start: {
                  required: "Tanggal Mulai harus di isi",
          },
      },
      submitHandler: function(form) {
        $("#editButton").prop('disabled', true);
            form.submit();
      }
  });

$("#deleteAllModalButton").click(function() {
    $(this).attr('disabled', true); 
    // $("#destroyAllForm").submit();
});

  $("#setting").click(function() {
      $("#checkAllEmpty").toggle();  
      $("#deleteAllEmpty").toggle();
  });

  function setting() {
    $("input:checkbox").toggle();
    $("#deleteAllButton").toggle(); 
  }


  $("#deleteAllButton").attr('disabled', true); 

  $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
        if($(this).is(":checked")){
            $("#deleteAllButton").attr('disabled', false); 
            $(".checkbox").attr('disabled', false); 
        } else if($(this).is(":not(:checked)")) {
            $("#deleteAllButton").attr('disabled', true); 
            $(".checkbox").attr('disabled', true); 
        }
    });
</script>
<script>
  function deleteProject(dataId) {
        Swal.fire({
            title: "Hapus data project?",
            text: `Data project akan terhapus. Anda tidak akan dapat mengembalikan
                aksi ini!`,
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "rgb(11, 42, 151)",
            cancelButtonColor: "rgb(209, 207, 207)",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then(function(t) {
            if (t.value) {
                $.ajax({
                    url:"{{ route('project-back.hapus') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}", 
                        id: dataId
                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Project telah berhasil dihapus!',
                        }).then(function(){
                            location.reload();
                        });
                    }
                })
            }
        })
    }
</script>
@endsection