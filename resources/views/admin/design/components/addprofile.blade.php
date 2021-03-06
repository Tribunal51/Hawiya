{!! Form::open(['action' => 'AdminController@addProfile', 'method' => 'POST', 'files' => true]) !!}
    @csrf 
    <div class="form-group row mt-2"> 
        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
        <div class="col-md-6">
            <input type="text" id="title" name="title" class="form-control" required />
        </div>
    </div>

    <div class="form-group row">
        <label for="type" class="col-md-4 col-form-label text-md-right">Category</label>
        <div class="col-md-6 form-group">

            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                @foreach(App\Category::all() as $category) 
                    <option 
                        value="{{$category->id}}"> {{ $category->name }}
                    </option>
                @endforeach
            </select>
                                    
        </div>
    </div>

    <div class="form-group row">
        <label for="details" class="col-md-4 col-form-label text-md-right">Project Details</label>
        <div class="col-md-6">
            <textarea type="text" id="details" name="details" class="form-control" required></textarea>
        </div>
    </div>

    <div class="form-group">
        
        <input type="file" name="my_file[]" id="my_files" multiple />
        <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>
        
            @include('admin.components.temp')

        
        
        
    </div>
    <div class="gallery"></div>
    <br>

    <div class="form-group row mb-0">       
        <div class="col-md-8 offset-md-4">
            {!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>


{!! Form::close() !!}

