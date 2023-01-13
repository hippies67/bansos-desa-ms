
<input type="hidden" name="id" id="id_edit" value="{{ $ref_divisi->id }}">

<div class="mb-3 mt-3 period-edit">
    <label for="fullname">Nama Division</label>
    <input type="text" class="form-control " name="nama" id="nama_edit" value="{{ $ref_divisi->nama }}" placeholder="Nama Division">
</div>
<div class="mb-3 period-edit">
    <label for="fullname">Level Division</label>
    <select class="form-control" name="level" id="level_edit" onchange="levelGet(this.value, 'edit', {{ $ref_periode->id }})">
        <option value="1" {{ $ref_divisi->level == '1' ? 'selected' : '' }}> 1 </option>
        <option value="2" {{ $ref_divisi->level == '2' ? 'selected' : '' }}> 2 </option>
        <option value="3" {{ $ref_divisi->level == '3' ? 'selected' : '' }}> 3 </option>
        <option value="4" {{ $ref_divisi->level == '4' ? 'selected' : '' }}> 4 </option>
        <option value="5" {{ $ref_divisi->level == '5' ? 'selected' : '' }}> 5 </option>
    </select>
</div>

@if($ref_divisi->level != '1')
<div class="mb-3 period-edit" id="induk_edit">
    <label for="fullname">Induk Division</label>
    <select class="form-control" name="id_induk" id="id_induk_edit">
        @foreach($induk as $data)
            <option value="{{ $data->id }}" {{ $data->id == $ref_periode->id_induk ? 'selected' : '' }}>{{ $data->nama }}</option>
        @endforeach
    </select>
</div>
@endif
<div class="mb-3 period-edit">
    <label for="fullname">Status</label>
    <select class="form-control" name="status" id="status_edit">
        <option value="Y" {{ $ref_divisi->status == 'Y' ? 'selected' : '' }}>Aktif</option>
        <option value="T" {{ $ref_divisi->status == 'T' ? 'selected' : '' }}>Tidak Aktif</option>
    </select>
</div>