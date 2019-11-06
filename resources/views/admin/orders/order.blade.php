Order: {{ $order }}
{{-- {{ $designers }} --}}
{!! Form::open(['action' => ['AdminController@editOrder'], 'method' => 'POST']) !!}
{{ Form::hidden('_method', 'PUT') }}
{{-- {{ Form::submit('Delete Selected Packages', ['class' => 'btn btn-danger mb-2']) }} --}}

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Key</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
    @foreach((array)json_decode($order) as $key => $value)
        
        <tr>
            <td> {{ $key }} </td> 
            <td> 
                @switch($key) 

                    @case('style')
                        @foreach((array)json_decode(json_encode($value)) as $key => $value)
                            <div class="row">
                                <div class="col-md">
                                    {{ $key }}: {{ $value }}
                                </div> 
                            </div> 
                        @endforeach 
                    @break 


                    @case('designer_name')
                        
                        @if(Auth::user()->admin && isset($designers))
                            <select class="form-control" id="exampleFormControlSelect1" name="designer_id">
                                <option value="{{null}}">None</option>
                                @foreach($designers as $designer) 
                                    <option 
                                        value="{{$designer->id}}"
                                        {{ $order->designer_id === $designer->id ? 'selected' : ''}}> {{ $designer->name }}
                                    </option>
                                @endforeach
                            </select>
                        @else 
                            @if(Auth::user()->designer)
                                {{ $order->designer_name }}
                            @endif
                        @endif
                        
                    @break

                    @case('days_left')
                        <input type="number" name="days_left" value={{$value}} readonly={{ Auth::user()->designer ? false : true}} />
                    @break 

                    @case('logo_photo')
                        <img src="{{$value}}" alt="{{$value}}" style="width:100px; height: 100px"  />
                    @break 

                    @case('posts')
                        <div class="flex-column d-flex-justify-content-center">
                            @foreach($value as $post)                               
                                <div>Comment: {{ $post->comment }} </div>
                                <div>
                                    Image: <img style="width: 100px; height: 100px" src="{{$post->image}}" alt="{{$post->image}}" /></div>                        
                                <hr>
                            @endforeach 
                        </div>
                    @break 
                
                    @default {{$value}}
                @endswitch 
            </td>
        </tr>      
    @endforeach 
    </tbody>
</table>
{!! Form::hidden('id', $order->id) !!}
{!! Form::hidden('category_id', $order->category_id) !!}
{!! Form::submit('Edit', ['class' => 'btn btn-secondary']) !!}
{{-- {{ link_to_action('AdminController@editOrder', 'Edit', ['id' => $order->id, 'category_id' => $order->category_id], ['class' => 'btn btn-primary'])}} --}}
{!! Form::close() !!}




