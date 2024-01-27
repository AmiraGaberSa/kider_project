<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')

       <div class="container">
        <h2>Update Teacher</h2>
        <form action="{{ route('updateTeacher', $teacher->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $teacher->name }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="designation">designation:</label>
                <input type="text" class="form-control" id="designation" placeholder="Enter designation" name="designation" value="{{ $teacher->designation }}">
                @error('designation')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="facebook">facebook:</label>
                <textarea class="form-control" name="facebook" id="" cols="60" rows="3">{{ $teacher->facebook }}</textarea>
                @error('facebook')
                    {{ $message }}
                @enderror
            </div>

            <div class="form-group">
                <label for="twitter">twitter:</label>
                <textarea class="form-control" name="twitter" id="" cols="60" rows="3">{{ $teacher->twitter }}</textarea>
                @error('twitter')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="instgram">instgram:</label>
                <textarea class="form-control" name="instgram" id="" cols="60" rows="3">{{ $teacher->instgram }}</textarea>
                @error('instgram')
                    {{ $message }}
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{asset('assets/img/' . $teacher->image)}}" alt="image" style="height:200px">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <input type="hidden" name="oldImage" value="{{$teacher->image}}">
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="published"  @checked($teacher->published)> Published me</label>
                </div>
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>        
 
    @include('includes.Javascript') 
      
</body>

</html>