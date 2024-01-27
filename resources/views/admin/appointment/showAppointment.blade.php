<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')

  
   <h5>created at : {{ $appointments->created_at }}</h5> 
   <h5>updated at : {{ $appointments->updated_at }}</h5> 
   <h5>guardian Name:{{ $appointments->guardianName}}</h5> 
   <p>guardian Email:{{ $appointments->guardianEmail }}</p>       
           
    @include('includes.Javascript') 

      
</body>

</html>
