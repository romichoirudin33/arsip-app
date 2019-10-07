@if(request()->session()->get('status'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ request()->session()->get('status') }}</strong>
    </div>
@endif