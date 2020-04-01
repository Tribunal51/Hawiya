{!! Form::open(['action' => ['CommercialItemsController@editItem', 'id' => $item->id], 'method' => 'POST', 'files' => true ]) !!}
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
                                <input type="text" name="name" value="{{$value}}" />
                            @break 

                            @case('name_ar')
                                <input type="text" name="name_ar" value="{{$value}}" class="text-md-right" />
                            @break 

                            @case('image')
                                @include('components.editfile')
                            @break 

                            @case('options_info')
                               {{ json_encode($value) }}
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
    <a href={{"/dashboard/admin/data/commercial/item/".$item->id}} class="btn btn-secondary">Back</a>
    {!! Form::submit('Save', ['class' => 'm-1 btn btn-primary']) !!}

{!! Form::close() !!}

