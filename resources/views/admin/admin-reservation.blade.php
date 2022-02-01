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
      <th style="padding: 20px">Name </th>
      <th style="padding: 20px">Email </th>
      <th style="padding: 20px">Phone </th>
      <th style="padding: 20px">Guest </th>
      <th style="padding: 20px">Time </th>
      <th style="padding: 20px">Date </th>
      <th style="padding: 20px">message </th>
      </tr>
  </thead>
  <tbody>
  @foreach($data as $data)
            <tr>
                <td>{{$n++}}</td>
                <td>{{$data['name']}}</td>
                <td>{{$data['email']}}</td>
                <td>{{$data['phone']}}</td>
                <td>{{$data['guest']}}</td>
                <td>{{$data['time']}}</td>
                <td>{{$data['date']}}</td>
                <td>{{$data['message']}}</td>
           
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