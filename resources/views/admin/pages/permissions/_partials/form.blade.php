@include('admin.pages.alerts.errors')
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$permission->name  ??  old('name') }}">

</div>
<div class="form-group">
    <label for="description"> descricao</label>
    <input type="text" class="form-control" name="description" id="description" value="{{$permission->description  ??  old('description') }}">

</div>





