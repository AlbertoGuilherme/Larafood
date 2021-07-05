@include('admin.pages.alerts.errors')
<div class="form-group">
    <label for="name">Identificação</label>
    <input type="text" class="form-control" name="identify" id="name" value="{{$table->name  ??  old('identify') }}">
</div>

<div class="form-group">
    <label for="description">Descricao</label>
        <textarea class="form-control" name="description" id="description" cols="15" rows="5" >{{$table->description  ??  old('description') }}</textarea>
</div>






