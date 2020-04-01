{!! Form::open(['action' => ['CommercialItemsController@editLabel', 'id' => $label->id], 'method' => 'POST', 'files' => true]) !!}

    {!! Form::hidden('_method', 'PUT') !!}
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Attribute</th>
                @foreach($label->colors as $color)
                    <th scope="col">{{ $color->name }}</th> 
                @endforeach 
            </tr> 
        </thead>
        <tbody>
            @foreach((array)json_decode($label) as $key => $value)
                <tr>
                    @switch($key) 
                        @case('x1')
                        @case('y1')
                        @case('x2')
                        @case('y2')
                        @case('font_size')
                            <td> {{ $key }}</td>
                            <td><input type="number" step="0.01" name="{{$key}}" value="{{$value}}" required /></td>
                            
                        @break 
    
                        @case('font_name')
                        @case('text')
                        @case('text_decoration')
                            <td> {{ $key }}</td>
                            <td><input type="text" name="{{$key}}" value="{{$value}}" required /></td>
                        @break 
    
                        @case('font_style')
                            <td> {{ $key }}</td>
                            <td>
                                <select name="font_style">
                                    <option value="0" selected>Normal</option>
                                    <option value="1">Italic</option> 
                                </select> 
                            </td>
                        @break 
    
                        @case('font_weight')
                            <td>{{ $key }}</td> 
                            <td><input type="number" name="{{$key}}" value="{{$value}}" required /></td> 
                        @break
    
                        @case('backside')
                            <td>{{ $key }}</td> 
                            <td> 
                                <select name="backside">
                                    @foreach([false => 'False', true => 'True'] as $key1 => $value1)
                                        <option value={{$key1}} {{ $value == $key1 ? 'selected' : ''}}>{{ $value1 }}</option>
                                    @endforeach 
                                </select>
                            </td>
                        @break 

                        @case('image')
                            <td>{{ $key }}</td> 
                            <td>
                                <div class="flex-column">
                                    <img src="{{$label->image}}" alt="{{$label->image}}" class="small-img" />
                                    <hr>
                                    <div class="flex-row">
                                        <input type="checkbox" id="changeImage" name="changeImage" /><label for="changeImage">Change Image</label>
                                    </div> 
                                    <div class="row">
                                        <input type="file" name="image" id="my_file" class="col" /><div class="col gallery"></div>
                                    </div>
                                        
                                </div>
                                
                            </td>
                        @break 

                        @case('hint')
                            <td>Hint</td> 
                            <td><input type="text" value="{{$label->hint}}" name="hint"  /></td>
                        @break 
                        
                    @endswitch 
                    
                </tr> 
            @endforeach 
            <tr>
                <td>Color</td>
                @foreach($label->colors as $color)
                    <td><input type="text" name={{"colors[".$color->id."]"}} value="{{$color->pivot->color}}" required /></td> 
                @endforeach 
            </tr> 
        </tbody> 
    </table> 
    <a class="btn btn-secondary" href={{"/dashboard/admin/data/commercial/design/".$label->design->id}}>Back</a>
    {!! Form::submit('Edit Label', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}