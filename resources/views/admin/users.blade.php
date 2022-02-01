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
      <th style="padding: 20px">ID </th>
      <th style="padding: 20px">Name </th>
      <th style="padding: 20px">Email </th>
      <th style="padding: 20px">Role </th>
      <th style="padding: 20px">Action </th>
      </tr>
  </thead>
  <tbody>
  @foreach($data as $data)
            <tr>
                <td>{{$n++}}</td>
                <td>{{$data['name']}}</td>
                <td>{{$data['email']}}</td>
                <td>{{$data['role']}}</td>
                @if($data->role=="user")
                <td ><a href="/delete-users/{{$data->id}}">Delete</a> </td>
                <td ><a href="{{url('edit-users', $data->id)}}">Edit</a> </td>
                @else
                <td ><a href="">Not Allowed</a> </td>
                @endif

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