<form action="{{ route('category.store_detail', ['id' => $data->id]) }}" method="post" id="form">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Detail {{ $data->name }}</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label">KETERANGAN</label>
            <input type="text" class="form-control input-sm square"
                   name="name" value="{{ old('name') }}"
                   data-validetta="required"
                   autocomplete="off"
                   autofocus>
        </div>
        <div class="form-group">
            <label class="control-label">DATA HARUS DIISI</label>
            <div class="radio">
                <label>
                    <input type="radio" name="required" value="1" checked="">Ya
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="required" value="0" >Tidak, Data boleh kosong
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">DATA BERUPA FILE</label>
            <div class="radio">
                <label>
                    <input type="radio" name="file" value="1" >Ya
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="file" value="0" checked="">Tidak, Data bentuk isian
                </label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>