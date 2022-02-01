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
    
    <div  >
    <table>
  <thead>
    <tr>
      <th style="padding: 20px">S/N</th>
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
                <td>{{$n++}}</td>
                <td>{{$data['title']}}</td>
                <td>${{$data['price']}}</td>
                <td>{{$data['description']}}</td>
                <td><img width="60px" src="/foodimage/{{$data['image']}}" alt=""></td>
                
                <td ><a href="/delete-menu/{{$data->id}}">Delete</a> 
                <a href="{{url('edit-menu', $data->id)}}">Edit</a> </td>

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