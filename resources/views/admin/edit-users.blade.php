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

<h1>Edit Users</h1>

    <div class="col-md-6" >

    <form method="post" action="/update" >
        @csrf
        
    <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="hidden" name="id" value="{{$data->id}}">
    <input type="text" class="form-control" value="{{$data['name']}}" name="name">
  </div>

  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control" value="{{$data->email}}" name="email">
  </div>

  <!-- <div class="mb-3">
    <label  class="form-label">Address</label>
    <input type="text" class="form-control" value="{{$data->role}}" name="role">
  </div> -->

  <div class="mb-3">
    <label  class="form-label">role</label>
    <select class="form-control" name="role" value="{{$data->role}}" id="role" >
   <option value="admin"{{$data->role == "admin" ? 'selected' : ''}}>Admin</option>
   <option value="user"{{$data->role == "user" ? 'selected' : ''}}>User</option>
   </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>


    </div>

  @include('admin.admin-footer')
  @include('admin.admin-script')

  </body>
</html>