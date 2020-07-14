@include('layouts.header')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      @if ($errors->any())
        <div class="alert alert-danger">
          {{$errors->first()}}
        </div>
      @endif
      <form action="{{route('admin.login.post')}}" method="post">
        @csrf
        <div class="form-group">
          <label>Email Adresiniz</label>
          <input type="text" name="email">
          <label>Şifreniz: </label>
          <input type="password" name="password">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
@include('layouts.footer')
