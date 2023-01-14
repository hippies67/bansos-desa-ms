<div class="form-group">
    <label for="edit_ref_divisi_id">Jabatan</label>
    <select name="edit_ref_divisi_id" class="form-control" id="editRefDivisiId">
        <option value="">Pilih Jabatan</option>
        @foreach($ref_divisi as $data)
        <option value="{{ $data->id }}" {{ $data->id == $choosed_ref_divisi_id ? 'selected' : '' }}>{{ $data->nama }}</option>
        @endforeach
    </select>
</div>