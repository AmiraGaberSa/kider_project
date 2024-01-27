<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')

   <h1>Name:{{ $subjects->name}}</h1> 
   <h5>created at : {{ $subjects->created_at }}</h5> 
   <h5>updated at : {{ $subjects->updated_at }}</h5> 
   <h5>age:{{ $subjects->age }}</h5> 
   <p>cost:{{ $subjects->cost }}</p> 
   <p>time:{{ $subjects->time }}</p> 
   <p>teacher:{{ $subjects->teacher_id }}</p> 
   <p>{{ ($subjects->published)?"Published" :"Not Published" }}</p>   

              
   @include('includes.Javascript') 

     
</body>

</html>
