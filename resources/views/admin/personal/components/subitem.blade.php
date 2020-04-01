{!! Form::open(['action' => ['PersonalItemsController@editSubitem', 'id' => $subitem->id], 'method' => 'POST', 'files' => true]) !!}
    {!! Form::hidden('_method', 'PUT') !!}

    <table class="table">
        <thead class="thead-dark">
            <tr> 
                <th scope="col">Attribute</th> 
                <th scope="col">Value</th> 
            </tr> 
        </thead> 
        <tbody> 
            <tr>
                <td>ID</td> 
                <td>{{ $subitem->id }}</td> 
            </tr> 
            <tr> 
                <td>Name</td> 
                <td><input type="text" name="name" value="{{$subitem->name}}" /></td> 
            </tr> 
            <tr> 
                <td>Name (Arabic) </td> 
                <td><input type="text" name="name_ar" value="{{$subitem->name_ar}}" class="text-md-right" /></td>
            </tr> 
            <tr> 
                <td>Image</td> 
                <td>
                    <div class="row">
                        <div class="col">Old Image</div> 
                        <div class="col">
                            <img src={{$subitem->image}} alt={{$subitem->image}} class="small-img" />
                        </div> 
                    </div> 
                    <hr>
                    <div class="row">
                        <div class="col">
                            <input type="checkbox" name="changeImage" id="changeImage" />
                                <label for="changeImage">Change Image</label>
                                <br>
                            <input type="file" id="my_file" name="image" />
                        </div>  
                        <div class="col gallery"></div> 
                    </div> 
                </td> 
            </tr> 
        </tbody> 
    </table> 
    
    {!! Form::submit('Save', ['class' => 'm-1 btn btn-primary']) !!}
{!! Form::close() !!}

<a href={{"/dashboard/admin/data/personal/item/".$subitem->item->id}} class="m-1 btn btn-secondary">Back</a>
    


