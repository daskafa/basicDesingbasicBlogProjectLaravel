@include('layouts.header')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-center mt-5">Data's</h3>
      <h5 class="text-center">Admin: {{Auth::user()->name}}</h5>
      <ul class="list-group" style="width:30%;margin:0 auto;">
        @if (count($articles) > 0)
          @foreach ($articles as $article)
            <li class="list-group-item">{{$article->name}}
              <p>Kategorisi: <b>{{$article->getCategory->name}}</b> </p>
              <a class="btn btn-danger" href="{{route('delete.post', $article->id)}}">Sil</a>
              <a class="btn btn-primary" href="{{route('update', $article->id)}}">Güncelle</a>
              <img style="width:40%;object-fit:cover;height:4em;" src="{{asset($article->image)}}">
            </li>
          @endforeach
          <a style="background-color:#333;color:#fff;text-decoration:none; padding:15px;" href="{{route('create')}}">Oluştur</a>
          <a style="background-color:red;color:#fff;text-decoration:none; padding:15px;" href="{{route('logout')}}">Çıkış Yap</a>
        @else
          <h3>İçerik yok</h3>
          <a style="background-color:#333;color:#fff;text-decoration:none; padding:15px;" href="{{route('create')}}">Oluştur</a>
        @endif
      </ul>
    </div>
  </div>
</div>
@include('layouts.footer')
