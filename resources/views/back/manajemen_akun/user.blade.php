
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Manajemen Akun</a></li>
    </ol>
</div>
<!-- row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data User</h4>
                <div class="button-list">
                    <button type="button" data-toggle="modal" data-target="#addUserModal" class="btn btn-primary btn-xs"
                        data-animation="slide" data-plugin="custommodal" data-overlaySpeed="200"
                        data-overlayColor="#36404a"><i class="fa fa-plus-circle mr-1"></i> Tambah</button>
                    {{-- <button type="button" class="btn btn-danger btn-xs"
                            id="clearAll"><i class="fa fa-trash-o mr-1"></i> Bersihkan</button> --}}
                </div>
            </div>
            <div class="card-body">
                <form class="my-4 flex" wire:submit.prevent="addComment">
                    <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2"
                        placeholder="What's in your mind." wire:model.debounce.500ms="newComment">
                    <div class="py-2">
                        <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}
<div class="modal fade" id="addUserModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('manajemen-akun-user.store') }}" method="post"
                    id="tambahUser">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <div class="col-12">
                            <label for="election">Nama Lengkap</label>
                            <input class="form-control mb-1 @error('nama_lengkap') is-invalid @enderror" type="text"
                                id="nama_lengkap" placeholder="Masukan Nama Lengkap" name="nama_lengkap"
                                value="{{ old('nama_lengkap') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="period">Email</label>
                            <input class="form-control mb-1 @error('email') is-invalid @enderror" minlength="3"
                                maxlength="35" type="email" id="email" placeholder="Masukan Email Anda" name="email"
                                value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="period">Password</label>
                            <div class="input-group mb-1">
                                <input class="form-control @error('password') is-invalid @enderror" type="password"
                                    name="password" id="passwordId" placeholder="Masukan Password Anda">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary fa fa-eye toggle-password tombol"
                                        type="button"></button>
                                </div>
                            </div>
                            <label for="passwordId" id="passwordV" generated="true" class="error"></label>
                            <script>
                                if (document.getElementById('passwordV').innerHTML == "") {
                                    document.getElementById('passwordV').style.display = "none";
                                }

                            </script>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="period">Password Confirmation</label>
                            <div class="input-group mb-1">
                                <input class="form-control" type="password" name="password_confirmation"
                                    id="passwordConfirm" placeholder="Masukan Konfirmasi Password Anda"
                                    value="{{ old('email') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary fa fa-eye toggle-password-confirm"
                                        type="button"></button>
                                </div>
                            </div>
                            <label for="passwordConfirm" id="password_confirm" generated="true" class="error"></label>
                            <script>
                                if (document.getElementById('password_confirm').innerHTML == "") {
                                    document.getElementById('password_confirm').style.display = "none";
                                }

                            </script>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="no_telp">Nomor Hp</label>
                            <input class="form-control mb-1 @error('no_telp') is-invalid @enderror" type="number"
                                id="no_telp" placeholder="Masukan Nomor Hp Anda" name="no_telp"
                                value="{{ old('no_telp') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="alamat">Alamat</label>
                            <input class="form-control mb-1 @error('alamat') is-invalid @enderror" type="text"
                                id="alamat" placeholder="Masukan Alamat Anda" name="alamat" value="{{ old('alamat') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input class="form-control mb-1 @error('tgl_lahir') is-invalid @enderror" type="date"
                                id="tgl_lahir" placeholder="Masukan Tanggal Lahir" name="tgl_lahir"
                                value="{{ old('tgl_lahir') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="tanggal_lahir">Jenis Kelamin</label>
                            <div class="dropdown bootstrap-select form-control form-control-lg">
                                <select name="jenis_kelamin" class="form-control form-control-lg" id="jenis_kelamin"
                                    tabindex="-98">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="laki_laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="tambahButton">Simpan Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editUserModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('manajemen-akun-user.update', '') }}" id="editUser"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="checkEmail">
                    <input type="hidden" id="checkEmail">

                    <div class="form-group">
                        <div class="col-12">
                            <label for="name">Nama Lengkap</label>
                            <input class="form-control mb-1 @error('edit_nama_lengkap') is-invalid @enderror"
                                type="text" id="Edit" placeholder="Masukkan Nama Lengkap" name="edit_nama_lengkap"
                                value="{{ old('edit_nama_lengkap') }}" required>

                            @error('edit_nama_lengkap')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input class="form-control mb-1 @error('edit_email') is-invalid @enderror" minlength="3"
                                maxlength="35" type="email" id="edit_email" placeholder="Masukkan Email"
                                name="edit_email" value="{{ old('edit_email') }}" required>
                            @error('edit_email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="edit_no_telp">Nomor Hp</label>
                            <input class="form-control mb-1" type="number" id="edit_no_telp"
                                placeholder="Masukkan No Hp" name="edit_no_telp" required>
                            @error('edit_no_telp')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="alamat">Alamat</label>
                            <input class="form-control mb-1 @error('edit_alamat') is-invalid @enderror" type="text"
                                id="edit_alamat" placeholder="Masukkan Alamat" name="edit_alamat"
                                value="{{ old('edit_alamat') }}" required>
                            @error('edit_alamat')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="edit_tgl_lahir">Tanggal Lahir</label>
                            <input class="form-control mb-1 @error('edit_tgl_lahir') is-invalid @enderror" type="date"
                                id="edit_tgl_lahir" placeholder="Masukan Tanggal Lahir" name="edit_tgl_lahir"
                                value="{{ old('edit_tgl_lahir') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="tanggal_lahir">Jenis Kelamin</label>
                            <div class="dropdown bootstrap-select form-control form-control-lg">
                                <select name="edit_jenis_kelamin" class="form-control form-control-lg"
                                    id="edit_jenis_kelamin" tabindex="-98">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="laki_laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="editButton">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   