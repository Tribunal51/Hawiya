
{{-- {!! Form::open(['action' => ['AdminController@editBusinesscard', 'id' => $card->id], 'method' => 'POST']) !!}
    {{ Form::hidden('_method', 'PUT') }} 
    <h2> Business Card Details </h2> 
    {{ $card }}

    <h2> Colors and Labels </h2> 
    {{ $card->colors }} 

    <h2> Labels </h2> 
    {{ $card->labels }}
{!! Form::close() !!} --}}


<h3>Business Card Details</h3>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Attribute</th> 
            <th scope="col">Value</th>
        </tr> 
    </thead> 
    <tbody>
        @foreach((array)json_decode($card) as $key => $value) 
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

                    @case('price')
                        <p>With Back Cover: {{ $value->with_cover }}</p>
                        <p>Without Back Cover: {{ $value->without_cover }}</p>
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
{!! Form::open(['action' => ['AdminController@addBusinesscardColor', 'id' => $card->id], 'method' => 'POST']) !!}

<h3> Colors </h3> 

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Primary Color</th> 
            @foreach($card->labels as $label)
                <th scope="col"><a href={{"/dashboard/admin/data/businesscard/label/".$label->id}}>Label ID {{$label->id}}</a></th>
            @endforeach
            <th scope="col">Preview Text Color</th>
            <th scope="col"></th>
        </tr> 
    </thead>
    <tbody>
        @foreach($card_colors->colors as $color)
        <tr>
            <td>{{ $color->name }}</td> 
            @foreach($color->labels as $label)
                <td>{{ $label->pivot->color }}</td>
            @endforeach 
            <td>{{ $color->preview_text_color}}</td> 
            <td>
                {{ link_to_action('AdminController@deleteBusinesscardColor', 'Delete', ['id' => $color->id], ['class' => 'btn btn-danger'] )}}
                {{-- <input type="checkbox" value={{$color->id}} name={{"colors[".$color->id."]"}} required /> --}}
            </td>
        </tr>
        @endforeach 
        <tr>
            <td><input type="text" name="color" required /></td> 
            @foreach($card->labels as $label)
                <td><input type="text" name={{ "labels[".$label->id."]" }} required /></td>
            @endforeach 
            <td><input type="text" name="preview_text_color" /></td>
            <td><button type="submit" name="action" value="addColor" class="btn btn-success">Add</button></td>
        </tr>
    </tbody> 
</table>


{!! Form::close() !!}

<hr> 
{!! Form::open(['action' => ['AdminController@deleteBusinesscardLabels'], 'method' => 'POST']) !!}
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
            @foreach($card->labels as $label)
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

{!! Form::open(['action' => ['AdminController@addBusinesscardLabel', 'id' => $card->id], 'method' => 'POST' ]) !!}
<hr> 
<h3>Create Label</h3> 
{{-- {{ json_encode($label_columns) }} --}}
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Attribute</th>
            @foreach($card_labels->colors as $color)
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
                    
                @endswitch 

            </tr> 
        @endforeach 
        <tr>
            <td>Color</td>
            @foreach($card_labels->colors as $color)
                <td><input type="text" name={{"colors[".$color->id."]"}} /></td> 
            @endforeach 
        </tr> 
    </tbody> 
</table> 

{!! Form::submit('Create Label', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

