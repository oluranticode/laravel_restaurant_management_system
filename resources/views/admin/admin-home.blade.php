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
    
    <h1>gdt</h1>

</div>

  @include('admin.admin-footer')
  @include('admin.admin-script')

  </body>
</html>