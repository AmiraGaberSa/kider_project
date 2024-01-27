<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')


       <div class="container">
       <h2>Unread Messages</h2>
       <table class="table table-condensed">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Show</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ Str::limit($contact->message, 20) }}</td>
                <td><a href="{{ route('showUnreadMessages', ['id'=>$contact->id]) }}">Show</a></td>
                <td><a href="{{ route('deleteUnreadMessage', ['id'=>$contact->id]) }}" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    
     @include('includes.Javascript') 
      
</body>

</html>






