@include('admin.pages.alerts.errors')
<div class="form-group">
    <label for="name">Titulo</label>
    <input type="text" class="form-control" name="title" id="title" value="{{$product->title  ??  old('title') }}">
</div>

<div class="form-group">
        <label for="image">Imagem</label>
        <input type="file" class="form-control" name="image" id="image" >
 </div>
 <div class="form-group">
    <label for="price">Preço</label>
    <input type="number" class="form-control" name="price" id="price" value="{{$product->price  ?? old('price')}}">
</div>
 <div class="form-group">
    <label for="description">Descrição</label>
    <textarea name="description" id="description"   class="form-control" cols="30" rows="10">{{$product->description  ?? old('description')}}</textarea>

</div>



