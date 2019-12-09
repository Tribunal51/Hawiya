{!! Form::open(['action' => 'AdminController@addCommercialItem', 'method' => 'POST', 'files' => true]) !!}
    @csrf 
    <div class="form-group mt-2 row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label> 
        <input class="col-md-6" type="text" name="name" id="name" />
    </div> 

    <div class="form-group mt-2 row">
        <label for="my_files" class="col-md-4 col-form-label text-md-right">Image</label> 
        <input class="col-md-6" type="file" name="image" id="my_files" />
    </div> 

    <div class="form-group mt-2 row">
        <label for="price" class="col-md-4 col-form-label text-md-right">Price</label> 
        <input class="col-md-6" type="number" name="price" id="price" />
    </div> 

    {!! Form::submit('Create Item', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
