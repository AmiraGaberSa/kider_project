<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body>
    <div class="container-xxl bg-white p-0">
    @include('admin.includes.navbar')

       <div class="container">
        <h2>Add New Teacher</h2>
        <form action="{{ route('storeTeacher') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="date" class="form-control" id="designation" placeholder="Enter designation" name="designation" value="{{ old('designation') }}">
                @error('designation')
                   {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="facebook">facebook:</label>
                <textarea class="form-control" name="facebook" id="" cols="60" rows="3">{{ old('facebook') }}</textarea>
                @error('facebook')
                    {{ $message }}
                @enderror
            </div>

            <div class="form-group">
                <label for="twitter">twitter:</label>
                <textarea class="form-control" name="twitter" id="" cols="60" rows="3">{{ old('twitter') }}</textarea>
                @error('twitter')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="instgram">instgram:</label>
                <textarea class="form-control" name="instgram" id="" cols="60" rows="3">{{ old('instgram') }}</textarea>
                @error('instgram')
                    {{ $message }}
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="published" @checked(old('published'))> Published</label>
                </div>
            </div>
            <button type="submit" class="btn btn-default">Insert</button>
        </form>
    </div>    

@include('includes.Javascript') 
       
</body>

</html>