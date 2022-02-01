<x-app-layout> 

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
 @include('admin.admin-css')
  </head>
  <body>
  <div class="container-scroller">
    @include('admin.navbar')
    @include('admin.admin-result')
    
    <h1>Edit Menu</h1>

    
    <div class="col-md-6" >

    <form method="post" action="{{url('/update-menu')}}" enctype="multipart/form-data" >
    <!-- <form method="post" action="/update-menu" > -->
        @csrf
        
    <div class="mb-3">
    <label  class="form-label">Title</label>
    <input type="hidden" name="id" value="{{$menu->id}}">
    <input type="text" class="form-control" value="{{$menu['title']}}" name="title">
  </div>

  <div class="mb-3">
    <label  class="form-label">Price</label>
    <input type="number" class="form-control" value="{{$menu->price}}" name="price">
  </div>

  <div class="mb-3">
    <label  class="form-label">Description</label>
    <!-- <input type="text" class="form-control" value="{{$menu->description}}" name="description"> -->
    <textarea name="description" id="" style="color: red" cols="30" rows="10">{{$menu->description}}</textarea>
  </div>

  <div class="mb-3">
    <label  class="form-label">Current Image</label>
    <img width="60px" src="/foodimage/{{$menu['image']}}" alt="">
  </div>

  <div class="mb-3">
    <label  class="form-label">New Image</label>
    <input style="color: red" type="file" name="image" id="">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>


</div>

  @include('admin.admin-footer')
  @include('admin.admin-script')

  </body>
</html>