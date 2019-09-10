<form action="{{ route('reminder.store') }}" method="post" id="form">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Reminder</h4>
    </div>
    <div class="modal-body">
        <label>Setiap</label>
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control"
                       name="angka" value="{{ $angka }}"
                       data-validetta="required"
                       autocomplete="off">
            </div>
            <div class="col-md-8">
                <select name="satuan" class="form-control">
                    <option value="{{ $satuan }}">{{ $satuan }}</option>
                    <option value="days">days</option>
                    <option value="weeks">weeks</option>
                    <option value="months">months</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>