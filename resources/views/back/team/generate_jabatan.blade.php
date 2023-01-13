<div class="form-group">
    <label for="position">Jabatan</label>
    <select name="ref_divisi_id" class="form-control">
        <option value="">Pilih Jabatan</option>
        @foreach($ref_divisi as $data)
        <option value="{{ $data->id }}">{{ $data->nama }}</option>
        @endforeach
    </select>
</div>