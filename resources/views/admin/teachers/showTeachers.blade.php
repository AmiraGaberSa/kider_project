<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')

   <h1>Name:{{ $teachers->name}}</h1> 
   <h5>created at : {{ $teachers->created_at }}</h5> 
   <h5>updated at : {{ $teachers->updated_at }}</h5> 
   <h5>designation:{{ $teachers->profession }}</h5> 
   <p>facebook:{{ $teachers->facebook }}</p> 
   <p>twitter:{{ $teachers->twitter }}</p> 
   <p>instgram:{{ $teachers->instgram }}</p> 
   <p>{{ ($teachers->published)?"Published" :"Not Published" }}</p> 
           
    @include('includes.Javascript') 

      
</body>

</html>
