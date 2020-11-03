<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.includes.essentialmeta')
    
    <!-- Import CSS -->
    @include('admin.includes.essentialcss')
  </head>
  <body class="hold-transition sidebar-mini layout-fixed"> 
    <div class="wrapper">
          @include('admin.includes.navbar')
          @include('admin.includes.sidebar')
          <div class="content-wrapper">
            <section class="content">
            @yield('content') 
            </section>         
          </div>
          @include('admin.includes.footer')
    </div>   
    
    <!-- Import Javascript -->
    @include('admin.includes.essentialjs')

  </body>
</html>