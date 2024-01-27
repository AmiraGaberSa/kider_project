<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')

       <div class="container">
        <h2>Update Testimonial</h2>
        <form action="{{ route('updateTestimonial', $testimonial->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $testimonial->name }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="profession">Profession:</label>
                <input type="text" class="form-control" id="profession" placeholder="Enter profession" name="profession" value="{{ $testimonial->profession }}">
                @error('profession')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="" cols="60" rows="3">{{ $testimonial->description }}</textarea>
                @error('description')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{asset('assets/img/' . $testimonial->image)}}" alt="image" style="height:200px">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <input type="hidden" name="oldImage" value="{{$testimonial->image}}">
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="published"  @checked($testimonial->published)> Published me</label>
                </div>
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>        
                     
    @include('includes.Javascript') 

</body>

</html>