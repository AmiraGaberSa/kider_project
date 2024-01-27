<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')


       <div class="container">
       <h2>Subjects Table</h2>
       <table class="table table-condensed">
        <thead>
        <tr>
            <th>Name</th>
            <th>age</th>
            <th>Image</th>
            <th>published</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->age }}</td>
                <td><img src="{{ asset('assets/img/'.$subject->image) }}" alt="" style="height:50px"></td>
                <td>{{ $subject->published? "Yes" : "No" }}</td>
                <td><a href="showSubjects/{{$subject->id}}">Show</a></td>
                <td><a href="updateSubject/{{$subject->id}}">Edit</a></td>
                <td><a href="deleteSubject/{{$subject->id}}" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>      
            
    @include('includes.Javascript') 
     
</body>

</html>