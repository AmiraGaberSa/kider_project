<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')

  
   <h5>created at : {{ $contacts->created_at }}</h5> 
   <h5>updated at : {{ $contacts->updated_at }}</h5> 
   <h5>Name:{{ $contacts->name}}</h5> 
   <p>Email:{{ $contacts->email }}</p> 
   <p>Subject:{{ $contacts->subject }}</p> 
   <p>Message:{{ $contacts->message }}</p>  
                
    @include('includes.Javascript') 

      
</body>

</html>
