{!! Form::open(['action' => 'CommercialItemsController@addItem', 'method' => 'POST', 'files' => true]) !!}
    
    <h3> Add Commercial Item </h3>
    @csrf 
    <div class="form-group mt-2 row">
        <label for="name" class="col-md-2 col-form-label">Name</label> 
        <input class="col-md-6" type="text" name="name" id="name" required />
    </div> 

    <div class="form-group mt-2 row">
        <label for="name_ar" class="col-md-2 col-form-label">Name (Arabic)</label> 
        <input class="col-md-6 text-md-right" type="text" name="name_ar" id="name_ar" required />
    </div> 

    <div class="form-group mt-2 row">
        <label for="my_files" class="col-md-2 col-form-label">Image</label> 
        <input class="col-md-3" type="file" name="image" id="my_file" required />
        <div class="col-md-3 gallery"></div>
    </div> 

    <div class="form-group mt-2 row">
        <label for="price" class="col-md-2 col-form-label">Price</label> 
        <input class="col-md-6" type="number" name="price" id="price" />
    </div> 

    {!! Form::submit('Create Item', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
