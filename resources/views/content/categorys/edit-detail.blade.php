<form action="{{ route('category.update_detail', ['id' => $data->id]) }}" method="post" id="form">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Ubah Detail</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label">KETERANGAN</label>
            <input type="text" class="form-control input-sm square"
                   name="name" value="{{ $data->name }}"
                   data-validetta="required"
                   autocomplete="off"
                   autofocus>
        </div>
        <div class="form-group">
            <label class="control-label">DATA HARUS DIISI</label>
            <div class="radio">
                <label>
                    <input type="radio" name="required" value="1" {{ $data->required == '1' ? 'checked' : '' }}>Ya
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="required" value="0" {{ $data->required == '0' ? 'checked' : '' }}>Tidak, Data boleh kosong
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">DATA BERUPA FILE</label>
            <div class="radio">
                <label>
                    <input type="radio" name="file" value="1" {{ $data->file == '1' ? 'checked' : '' }}>Ya
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="file" value="0" {{ $data->file == '0' ? 'checked' : '' }}>Tidak, Data bentuk isian
                </label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="" class="btn btn-danger" data-toggle="tooltip"
           data-placement="top"
           title="Hapus"
           onclick="if (confirm('Anda yakin akan menghapus data ini ?')){
                   event.preventDefault();
                   document.getElementById('delete-detail-{{ $data->id }}').submit();
                   };">
            <span class="fa fa-trash"></span> Hapus
        </a>
        <button type="submit" class="btn btn-primary">
            <span class="fa fa-save"></span>
            Update
        </button>
    </div>
</form>

<form id="delete-detail-{{ $data->id }}"
      action="{{ route('category.destroy_detail', ['id'=>$data->id]) }}"
      method="post">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
</form>
