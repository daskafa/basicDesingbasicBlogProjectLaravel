@include('layouts.header')


      <h3 class="text-center mt-5">Update Name</h3>
      <ul class="list-group" style="width:fit-content;margin:0 auto;">
          <form class="form-group" action="{{route('update.post', $article->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="{{$article->name}}">
            <input type="file" name="image">
            <button type="submit">Güncelle</button>
          </form>
      </ul>
@include('layouts.footer')
