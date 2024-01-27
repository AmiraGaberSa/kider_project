<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')


       <div class="container">
       <h2>Trashed Table</h2>
       <table class="table table-condensed">
        <thead>
        <tr>
            <th>Name</th>
            <th>Designation</th>
            <th>Image</th>
            <th>published</th>
            <th>Restore</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->designation }}</td>
                <td><img src="{{ asset('assets/img/'.$teacher->image) }}" alt="" style="height:50px"></td>
                <td>{{ $teacher->published? "Yes" : "No" }}</td>
                <td><a href="restoreTeacher/{{$teacher->id}}">Restore</a></td>
                <td><a href="forceDeleteTeacher/{{$teacher->id}}" onclick="return confirm('Are you sure?')">Force Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
           
    @include('includes.Javascript') 
      
</body>

</html>