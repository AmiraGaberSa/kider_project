<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
       @include('includes.spinner')

       @include('includes.navbar')

       
        @yield('content')


        @include('includes.footer')  
            
        @include('includes.Javascript') 


       
</body>

</html>