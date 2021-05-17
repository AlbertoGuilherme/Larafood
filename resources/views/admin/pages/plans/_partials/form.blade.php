@include('admin.pages.alerts.errors')
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$plan->name  ??  old('name') }}">
</div>

<div class="form-group">
        <label for="price">Preço</label>
        <input type="text" class="form-control" name="price" id="price" value="{{$plan->price  ?? old('price')}}"> AOA
        </div>
        <div class="form-group">
        <label for="description">Descrição</label>
        <input type="text"  class="form-control" name="description" id="description" value="{{$plan->description ?? old('description')}} ">
</div>



