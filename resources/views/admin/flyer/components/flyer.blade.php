{{-- {{ $flyer }}

{{ json_encode($flyer_colors) }}

{{ json_encode($flyer_labels) }} --}}


<h3>Flyer Details</h3>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Attribute</th> 
            <th scope="col">Value</th>
        </tr> 
    </thead> 
    <tbody>
        @foreach((array)json_decode($flyer) as $key => $value) 
        <tr>
            
            <td>{{ $key }}</td>
            <td>
                @switch($key)
                    @case('backtextphoto')
                    @case('backbasephoto')
                    @case('fronttextphoto')
                    @case('frontbasephoto')
                        <img src="{{ $value }}" alt="{{ $value }}" class="small-img" />
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

<hr>
{{-- {{ $card_colors }} --}}
{!! Form::open(['action' => ['FlyersController@addColor', 'id' => $flyer->id], 'method' => 'POST', 'files' => true]) !!}

<h3> Colors </h3> 

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Primary Color</th> 
            @foreach($flyer_labels->labels as $label)
                <th scope="col">Label ID {{$label->id}}</th>
            @endforeach
            <th scope="col">Preview Image</th>
            <th scope="col"></th>
        </tr> 
    </thead>
    <tbody>
        @foreach($flyer_colors->colors as $color)
        <tr>
            <td>{{ $color->name }}</td> 
            @foreach($color->labels as $label)
                <td>{{ $label->pivot->color }}</td>
            @endforeach 
            <td><img src={{$color->preview_image}} alt={{$color->preview_image}} class="small-img" /></td>
            <td>
                {{ link_to_action('FlyersController@deleteColor', 'Delete', ['id' => $color->id], ['class' => 'btn btn-danger'] )}}
                {{-- <input type="checkbox" value={{$color->id}} name={{"colors[".$color->id."]"}} required /> --}}
            </td>
        </tr>
        @endforeach 
        <tr>
            <td><input type="text" name="color" required /></td> 
            @foreach($flyer->labels as $label)
                <td><input type="text" name={{ "labels[".$label->id."]" }} required /></td>
            @endforeach 
            <td>
                <div class="row">
                    <div class="col"><input type="file" name="preview_image" id="my_file" required /></div>
                    <div class="col gallery"></div>
                </div> 
            </td>
            <td><button type="submit" class="btn btn-success">Add</button></td>
        </tr>
    </tbody> 
</table>


{!! Form::close() !!}

<hr> 
{!! Form::open(['action' => ['FlyersController@deleteLabels'], 'method' => 'POST']) !!}
    <h3>Labels list</h3> 
    <table class="table">
        <thead class="thead-dark">
            <tr>
                @foreach($label_columns as $column)
                    <th scope="col">{{ $column }}</th>
                @endforeach 
                <th scope="col"></th>
            </tr> 
        </thead> 
        <tbody> 
            @foreach($flyer->labels as $label)
                <tr>
                    @foreach($label_columns as $column) 
                        <td>{{ $label[$column] }}</td>
                    @endforeach 
                    <td><input type="checkbox" name="labels[]" value={{$label->id}} /></td> 
                </tr> 
            @endforeach 
        </tbody> 
    </table> 
    {!! Form::hidden('_method', 'DELETE') !!}
    {!! Form::submit('Delete selected Labels', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

{!! Form::open(['action' => ['FlyersController@addLabel', 'id' => $flyer->id], 'method' => 'POST' ]) !!}
<hr> 
<h3>Create Label</h3> 
{{-- {{ json_encode($label_columns) }} --}}
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Attribute</th>
            @foreach($flyer_labels->colors as $color)
                <th scope="col">{{ $color->name }}</th> 
            @endforeach 
        </tr> 
    </thead>
    <tbody>
        @foreach($label_columns as $column)
            <tr>
                @switch($column) 
                    @case('x1')
                    @case('y1')
                    @case('x2')
                    @case('y2')
                        <td>{{ $column }} </td> 
                        <td><input type="number" name="{{$column}}" /></td>
                    @break 

                    @case('font_name')
                        <td>{{ $column }}</td> 
                        <td><input type="text" name="{{$column}}" /></td>
                    @break 

                    @case('font_weight')
                        <td>{{ $column }}</td> 
                        <td><input type="text" name="{{$column}}" /></td> 
                    @break 

                    @case('font_size')
                        <td>{{ $column }}</td> 
                        <td><input type="number" name="{{$column}}" /></td>
                    @break 

                    @case('backside')
                        <td>{{ $column }}</td> 
                        <td><select name="backside"><option value={{false}}>False</option><option value={{true}}>True</option></select>
                    @break 
                    
                @endswitch 

            </tr> 
        @endforeach 
        <tr>
            <td>Color</td>
            @foreach($flyer_labels->colors as $color)
                <td><input type="text" name={{"colors[".$color->id."]"}} /></td> 
            @endforeach 
        </tr> 
    </tbody> 
</table> 

{!! Form::submit('Create Label', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}



