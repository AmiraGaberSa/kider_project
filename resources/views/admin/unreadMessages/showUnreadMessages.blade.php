<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')

    <div class="container mt-3">
        <h2>{{ $contact->name }}</h2>
        <table class="table table-borderless">
            <tbody>
            <tr>
                <td>Email</td>
                <td>{{ $contact->email }}</td>
            </tr>
            <tr>
                <td>Subject</td>
                <td>{{ $contact->subject }}</td>
            </tr>
            <tr>
                <td>Message</td>
                <td style="word-break:break-all;">{{ $contact->message }}</td>
            </tr>
            <tr>
                <td>Created at</td>
                <td>{{ $contact->created_at }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    @include('includes.Javascript') 
      
</body>

</html>



