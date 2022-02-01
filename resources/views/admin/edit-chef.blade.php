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
    
    <h1>Edit Chef</h1>

    
    <div class="col-md-6" >

    <form method="post" action="{{url('/update-chef')}}" enctype="multipart/form-data" >
   
        @csrf
        
    <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="hidden" name="id" value="{{$chef->id}}">
    <input type="text" class="form-control" value="{{$chef['name']}}" name="name">
  </div>

  <div class="mb-3">
    <label  class="form-label">Speciality</label>
    <input type="text" class="form-control" value="{{$chef['speciality']}}" name="speciality">
  </div>
  
  <div class="mb-3">
    <label  class="form-label">Current Image</label>
    <img width="60px" src="/chefimage/{{$chef['image']}}" alt="">
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