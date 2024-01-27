<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')


       <div class="container">
       <h2>Testimonials Table</h2>
       <table class="table table-condensed">
        <thead>
        <tr>
            <th>Name</th>
            <th>Profession</th>
            <th>Image</th>
            <th>published</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($testimonials as $testimonial)
            <tr>
                <td>{{ $testimonial->name }}</td>
                <td>{{ $testimonial->profession }}</td>
                <td><img src="{{ asset('assets/img/'.$testimonial->image) }}" alt="" style="height:50px"></td>
                <td>{{ $testimonial->published? "Yes" : "No" }}</td>
                <td><a href="showTestimonial/{{$testimonial->id}}">Show</a></td>
                <td><a href="updateTestimonial/{{$testimonial->id}}">Edit</a></td>
                <td><a href="deleteTestimonial/{{$testimonial->id}}" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
           
    @include('includes.Javascript') 

</body>

</html>