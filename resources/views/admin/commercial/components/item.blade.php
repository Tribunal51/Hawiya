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
                        @case('image')
                            <img src={{$value}} alt={{$value}} />
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