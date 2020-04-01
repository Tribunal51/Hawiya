{!! Form::open(['action' => ['CommercialItemsController@editColor', 'id' => $color->id], 'method' => 'POST', 'files' => true]) !!}
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
                <td>Primary Color</td> 
                <td><input type="text" name="name" value="{{$color->name}}" /></td> 
            </tr> 
            <tr>
                <td>Preview Image</td> 
                <td>
                    <div class="row">
                        <div class="col">
                            <img class="small-img" src={{$color->preview_image}} alt={{$color->preview_image}} />
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
            @foreach($color->labels as $label)
            <tr>
                <td><a href={{"/dashboard/admin/data/commercial/label/".$label->id}}>Label ID {{ $label->id}}</a></td> 
                <td><input type="text" name={{"labels[".$label->id."]"}} value={{$label->pivot->color}} /></td> 
            </tr> 
            @endforeach 
        </tbody> 
    </table> 
    {!! Form::submit('Update Color', ['class' => 'btn btn-secondary']) !!}
{!! Form::close() !!}