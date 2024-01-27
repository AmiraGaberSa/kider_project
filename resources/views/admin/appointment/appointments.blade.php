<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')


       <div class="container">
       <h2>Appointments Table</h2>
       <table class="table table-condensed">
        <thead>
        <tr>
            <th>Guardian Name</th>
            <th>Guardian Email</th>
            <th>Child Name</th>
            <th>Child Age</th>
            <th>message</th>
            <th>Show</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->guardianName }}</td>
                <td>{{ $appointment->guardianEmail }}</td>
                <td>{{ $appointment->childName }}</td>
                <td>{{ $appointment->childAge }}</td>
                <td>{{ $appointment->message }}</td>
                                
                <td><a href="showAppointment/{{$appointment->id}}">Show</a></td>
                
                <td><a href="deleteAppointment/{{$appointment->id}}" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>  
             
        @include('includes.Javascript') 
       
</body>

</html>