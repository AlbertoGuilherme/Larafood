@include('admin.pages.alerts.errors')
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$category->name  ??  old('name') }}">
</div>

<div class="form-group">
    <label for="description">Descricao</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10" >{{$category->description  ??  old('description') }}</textarea>
</div>






