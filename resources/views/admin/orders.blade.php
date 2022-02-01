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
    
    <h1  align="center">Customer Order</h1>

    <form action="{{url('/search')}}" align="center" method="post">
        @csrf
        <input style="color: blue;" type="search" name="search" id="search">
        <input type="submit" style="background-color: blue; padding: 10px" value="Search">
    </form>
<br>
    <div>
    <table>
  <thead>
    <tr>
      <th style="padding: 20px">S/N</th>
      <th style="padding: 20px">Food Name </th>
      <th style="padding: 20px">Price </th>
      <th style="padding: 20px">Quantity </th>
      <th style="padding: 20px">Name </th>
      <th style="padding: 20px">Phone</th>
      <th style="padding: 20px">Address</th>
      <th style="padding: 20px">Total Price</th>

      <th style="padding: 20px">Actions</th>
      </tr>
  </thead>
  <tbody>
  @foreach($data as $data)
            <tr>
                <td>{{$n++}}</td>
                <td>{{$data['food_name']}}</td>
                <td>${{$data['price']}}</td>
                <td>{{$data['quantity']}}</td>
                <td>{{$data['name']}}</td>
                <td>{{$data['phone_number']}}</td>
                <td>{{$data['address']}}</td>
                <td>${{$data['price'] * $data['quantity']}}</td>

                <!-- <td ><a href="/delete-menu/{{$data->id}}">Delete</a> 
                <a href="{{url('edit-menu', $data->id)}}">Edit</a> </td> -->

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