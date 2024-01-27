<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')

       <div class="container">
        <h2>Update Teacher</h2>
        <form action="{{ route('updateSubject', $subjects->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $subjects->name }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" class="form-control" id="age" placeholder="Enter age" name="age" value="{{ $subjects->age }}">
                @error('age')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="text" class="form-control" id="time" placeholder="Enter time" name="time" value="{{ $subjects->time }}">
                @error('time')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="capacity">Capacity:</label>
                <input type="number" class="form-control" id="capacity" placeholder="Enter capacity" name="capacity" value="{{ $subjects->capacity }}">
                @error('capacity')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="cost">Cost:</label>
                <input type="number" class="form-control" id="cost" placeholder="Enter cost" name="cost" value="{{ $subjects->cost }}">
                @error('cost')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="teacher_id">Teacher:</label>
                <div class="form-group">
                    <select name="teacher_id">
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @selected($subjects->teacher_id == $teacher->id)>{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>                
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{asset('assets/img/'.$subjects->image)}}" alt="" style="height:300px">
                <input type="hidden" name="oldImageName" value="{{ $subjects->image }}">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="published" @checked($subjects->published)> Published</label>    
                </div>
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
        <h1></h1>
    </div>
         
    @include('includes.Javascript') 
     
</body>

</html>