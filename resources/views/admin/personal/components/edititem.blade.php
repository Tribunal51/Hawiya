{!! Form::open(['action' => ['PersonalItemsController@editItem', 'id' => $item->id], 'files' => true]) !!}
    {!! Form::hidden('_method', 'PUT') !!}
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Attribute</th> 
                <th scope="col">Value</th>
            </tr> 
        </thead> 
        <tbody> 
            @foreach((array)json_decode($item) as $key => $value) 
                <tr> 
                    <td>{{ $key }}</td> 
                    <td>
                        @switch($key)
                            @case('name')
                                <input name="name" type="text" value="{{ $value }}"/>
                            @break 

                            @case('name_ar')
                                <input name="name_ar" type="text" value="{{$value}}" class="text-md-right" />
                            @break 

                            @case('image')
                                <div class="row"> 
                                    <div class="col">
                                        <img src={{$item->image}} alt={{$item->image}} class="small-img" />
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" name="changeImage" id="changeImage" /><label for="changeImage">Change Image</label>
                                        <br>
                                        <input type="file" id="my_file" name="image" />
                                        
                                        
                                    </div>  
                                    <div class="col gallery"></div>
                                </div> 
                            @break 

                            @default 
                                {{ $value }}
                            @break 
                        @endswitch 
                    </td> 
                </tr> 
            @endforeach 
        </tbody>    
    </table> 

    {!! Form::submit('Save', ['class' => 'btn btn-primary m-1']) !!}
    
{!! Form::close() !!}

<a href={{"/dashboard/admin/data/personal/item/".$item->id}} class="m-1 btn btn-secondary">Back</a>