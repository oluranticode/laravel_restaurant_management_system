<x-app-layout> 

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
 @include('admin.admin-css')
  </head>
  <body>
  <div class="container-scroller">
    @include('admin.navbar')
    @include('admin.admin-result')
    
    <div style="position : relative; top:60px; right:-150px" >
    <form action="{{url('/upload-chef')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Name</label>
            <input style="color: red" type="text" name="name" placeholder="name" id="name">
        </div>

        <div>
            <label for="">Speciality</label>
            <input style="color: red" type="text" name="speciality" placeholder="Specialiity" id="Specialiity">
        </div>

        <div>
            <label for="">Image</label>
            <input style="color: red" type="file" name="image" id="">
        </div>

        <div>
            <input style="background-color: green" class="btn btn-success" type="submit" value="Save">
        </div>
    </form>
    </div>

<br> <br> <br> <br> <br>
        <!-- Chef List -->
        <div >
    <table>
  <thead>
    <tr>
      <th style="padding: 20px">S/N</th>
      <th style="padding: 20px">Name </th>
      <th style="padding: 20px">Specialiity</th>
     
      <th style="padding: 20px">Image</th>
      <th style="padding: 20px">Actions</th>
      </tr>
  </thead>
  <tbody>
  @foreach($data as $data)
            <tr>
                <td>{{$n++}}</td>
                <td>{{$data['name']}}</td>
                <td>{{$data['speciality']}}</td>
                <td><img width="60px" src="/chefimage/{{$data['image']}}" alt=""></td>
                
                <td ><a href="/delete-chef/{{$data->id}}">Delete</a>
                <a href="/edit-chef/{{$data->id}}">Edit</a> 
                <!-- <a href="{{url('edit-menu', $data->id)}}">Edit</a>  -->
            </td>

            </tr>
            @endforeach
  </tbody>
</table>

    </div>

</div>

  @include('admin.admin-footer')
  @include('admin.admin-script')

  </body>
</html>