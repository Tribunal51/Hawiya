{{-- {{ $order }} --}}
<h3>Original Order information</h3>

<table class="table">
    <thead class="thead-dark">
        <tr> 
            <th scope="col">Attribute</th> 
            <th scope="col">Value</th> 
        </tr> 
    </thead> 
    <tbody>        
        @foreach((array)json_decode($order) as $key => $value)
            <tr>
                <td>{{ $key }}</td> 
                <td>
                    @switch($key)
                        @case('frontside_file')
                        @case('backside_file')
                            <img src={{$value}} alt={{$value}} class="small-img" />
                        @break 

                        @case('style')
                            {{ json_encode($value) }}
                        @break 

                        @default
                            {{$value}}
                        @break 
                    @endswitch 
                </td> 
            </tr> 
        @endforeach 
    </tbody> 
</table> 

<a href={{URL::previous()}} class="btn btn-secondary">Back</a>