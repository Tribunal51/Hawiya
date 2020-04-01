{!! Form::open(['action' => ['PersonalItemsController@addPersonalSubitem', 'id' => $item->id], 'method' => 'POST', 'files' => true]) !!}
    <h3> Create new SubItem </h3> 
    <div class="form-group mt-2 row">
        <label for="name" class="col-md-2">Name</label>
        <input class="col-md-6" type="text" name="name" id="name" />
        
    </div> 

    <div class="form-group row mt-2">
        <label class="col-md-2" for="name_ar">Name (Arabic)</label> 
        <input type="text" required name="name_ar" id="name_ar" class="col-md-6 text-md-right" />
    </div> 

    <div class="form-group mt-2 row">
        <label for="my_file" class="col-md-2">Image</label> 
        <input type="file" name="image" id="my_file" class="col-md-3" />
        <div class="gallery"></div>
    </div> 

    <div class="row">
    {!! Form::submit('Create SubItem', ['class' => 'col-md-2 offset-md-2 btn btn-secondary']) !!}
    </div>

{!! Form::close() !!}