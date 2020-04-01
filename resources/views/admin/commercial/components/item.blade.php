{{-- {{ $item }} --}}


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
                @switch($key) 
                    @case('image')
                        <td>{{ $key }}</td>
                        <td> <img class="small-img" src={{$value}} alt={{$value}} /></td>  
                    @break 

                    @case('options_info')
                    @break 

                    @default
                        <td>{{ $key }}</td> 
                        <td>{{ $value }}</td>
                    @break 
                @endswitch 
            </tr>   
        @endforeach 
    </tbody> 
</table> 


    

