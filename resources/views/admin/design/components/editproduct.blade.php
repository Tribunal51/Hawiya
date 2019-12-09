{{ $data }}

{!! Form::open(['action' => ['AdminController@editProduct', $data->id], 'method' => 'POST', 'files' => true]) !!}
    @csrf 
    <div class="form-group row mt-2"> 
        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
        <div class="col-md-6">
            <input type="text" id="title" name="title" class="form-control" value="{{$data->title}}" required />
        </div>
    </div>

    <div class="form-group mt-2 row">
        <label for="title_ar" class="col-md-4 col-form-label text-md-right">Title (Arabic)</label> 
        <div class="col-md-6">
            <input type="text" id="title_ar" name="title_ar" class="form-control" value="{{$data->title_ar}}" style="text-align: right" required />
        </div> 
    </div> 
    
    <div class="form-group row">
        <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
        <div class="col-md-6">
            <input type="number" id="price" name="price" class="form-control" value="{{$data->price}}" required />
        </div> 

    </div>
    
    {{-- <div class="form-group row">
        <label for="details" class="col-md-4 col-form-label text-md-right">Project Details</label>
        <div class="col-md-6">
            <textarea type="text" id="details" name="details" class="form-control" value="{{$profile->details}}" required></textarea>
        </div>
    </div> --}}

    <div class="form-group">
        
        <input type="file" name="image" id="my_files" />
        <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>
        
            @include('admin.components.temp')

        
        
        
    </div>
    <div class="gallery"></div>
    <br>

    <div class="form-group row mb-0">       
        <div class="col-md-8 offset-md-4">
            {!! Form::hidden('_method', 'PUT') !!}
            {!! Form::submit('Edit Product', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>    

{!! Form::close() !!}