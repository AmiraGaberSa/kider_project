<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')

   <h1>Name:{{ $testimonial->name}}</h1> 
   <h5>created at : {{ $testimonial->created_at }}</h5> 
   <h5>updated at : {{ $testimonial->updated_at }}</h5> 
   <h5>Profession:{{ $testimonial->profession }}</h5> 
   <p>Description:{{ $testimonial->description }}</p> 
   <p>{{ ($testimonial->published)?"Published" :"Not Published" }}</p> 

    @include('includes.Javascript') 

      
</body>

</html>
