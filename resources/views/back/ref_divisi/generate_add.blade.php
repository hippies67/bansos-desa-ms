<div class="mb-3 mt-3 period-add">
    <label for="fullname">Name</label>
    <input type="text" class="form-control " name="nama" id="nama_tambah"
        placeholder="Nama Division">
</div>
<div class="mb-3 period-add">
    <label for="fullname">Level</label>
    <select class="form-control" name="level" id="level_tambah"
        onchange="levelGet(this.value, 'tambah', {{ $ref_periode->id }})">
        <option value="1"> 1 </option>
        <option value="2"> 2 </option>
        <option value="3"> 3 </option>
        <option value="4"> 4 </option>
        <option value="5"> 5 </option>
    </select>
</div>
<div class="mb-3" id="induk_tambah" style="display: none">
    <label for="fullname">Induk Division</label>
    <select class="form-control" name="id_induk" id="id_induk_tambah">
    </select>
</div>

<div class="mb-3 period-add">
    <label for="fullname">Status</label>
    <select class="form-control" name="status" id="status_tambah">
        <option value="Y">Aktif</option>
        <option value="T">Tidak Aktif</option>
    </select>
</div>