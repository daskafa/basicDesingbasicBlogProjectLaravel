@include('layouts.header')


      <h3 class="text-center mt-5">Create Name</h3>
      <ul class="list-group" style="width:fit-content;margin:0 auto;">
          <form class="form-group" action="{{route('create.post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input type="text" name="name" placeholder="enter name kanks">
            </div>            
            <div class="form-group">
              <select name="categories">
                <option>Seçim yap ulan</option>
              @foreach ($category as $categories)
                <option value="{{$categories->id}}">{{$categories->name}}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
              Fotoğraf Seçiniz:
              <input type="file" name="image" required>
            </div>
            <button type="submit">CREATE</button>
          </form>
      </ul>
@include('layouts.footer')
