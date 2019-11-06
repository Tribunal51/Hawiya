{!! Form::open(['action' => 'AdminController@addPackage', 'method' => 'POST']) !!}
    @csrf 
    <div class="form-group mt-2 row">
        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label> 
        <div class="col-md-6">
            <input type="text" id="title" name="title" class="form-control" required />
        </div>
        
    </div>

    <div class="form-group mt-2 row">
        <label for="title_ar" class="col-md-4 col-form-label text-md-right">Title (Arabic)</label> 
        <div class="col-md-6">
            <input type="text" id="title_ar" name="title_ar" class="form-control" style="text-align: right" required />
        </div> 
    </div> 

    <div class="form-group mt-2 row">
        <label for="old_price" class="col-md-4 col-form-label text-md-right">Old Price</label> 
        <div class="col-md-6">
            <input type="number" id="old_price" name="old_price" class="form-control" required />
        </div> 
    </div>

    <div class="form-group mt-2 row">
        <label for="new_price" class="col-md-4 col-form-label text-md-right">New Price</label> 
        <div class="col-md-6">
            <input type="number" id="new_price" name="new_price" class="form-control" required /> 
        </div> 
    </div> 

    {{-- <div class="form-group">
        <input type="file" name="image" id="my_files"  />
        <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>
            @include('admin.components.temp')       
    </div>
    <div class="gallery"></div> --}}
    
    {!! Form::hidden('category_id', $data['category']->id) !!}
    
    <div class="form-group row mb-0">       
        <div class="col-md-8 offset-md-4">
            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>


{!! Form::close() !!}