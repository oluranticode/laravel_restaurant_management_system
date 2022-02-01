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
    <form action="{{url('/upload-food')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Title</label>
            <input style="color: red" type="text" name="title" placeholder="title" id="title">
        </div>

        <div>
            <label for="">Price</label>
            <input style="color: red" type="number" name="price" placeholder="price" id="price">
        </div>

        <div>
            <label for="">Image</label>
            <input style="color: red" type="file" name="image" id="">
        </div>

        <div>
            <label for="">Description</label>
           <textarea style="color: red" name="description" id="description" cols="30" rows="10"></textarea>
        </div>

        <div>
            <input style="background-color: green" class="btn btn-success" type="submit" value="Save">
        </div>
    </form>
    </div>

    <br>
    <br> <br>
    <br>

    <div  >
    <table>
  <thead>
    <tr>
      <th style="padding: 20px">Food Name </th>
      <th style="padding: 20px">Price </th>
      <th style="padding: 20px">Description </th>
      <th style="padding: 20px">Image</th>
      <th style="padding: 20px">Actions</th>
      </tr>
  </thead>
  <tbody>
  @foreach($data as $data)
            <tr>
                <td>{{$data['title']}}</td>
                <td>${{$data['price']}}</td>
                <td>{{$data['description']}}</td>
                <td><img width="60px" src="/foodimage/{{$data['image']}}" alt=""></td>
                
                <td ><a href="/delete-menu/{{$data->id}}">Delete</a>
                <a href="{{url('edit-menu', $data->id)}}">Edit</a>
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