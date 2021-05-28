@include('admin.pages.alerts.errors')
@csrf
<div class="form-group">
    <label for="name">Nome do detalhe</label>
    <input type="text" name="name" id="name" class="form-control" value="{{$detail->name ?? old('name')}}">
    <button class="btn btn-info my-2">Enviar</button>
</div>
