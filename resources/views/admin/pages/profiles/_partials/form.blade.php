@include('admin.pages.alerts.errors')
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$profile->name  ??  old('name') }}">

</div>
<div class="form-group">
    <label for="description"> descricao</label>
    <input type="text" class="form-control" name="description" id="description" value="{{$profile->description  ??  old('description') }}">

</div>





