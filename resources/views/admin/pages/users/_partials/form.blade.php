@include('admin.pages.alerts.errors')
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$user->name  ??  old('name') }}">
</div>

<div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{$user->email  ?? old('email')}}">
 </div>
 <div class="form-group">
    <label for="email">Password</label>
    <input type="password" class="form-control" name="password" id="password" >
</div>



