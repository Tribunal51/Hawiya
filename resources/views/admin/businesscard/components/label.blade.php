<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Attribute</th> 
            <th scope="col">Value</th>
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
                    @case('font_name')
                    @case('font_weight')
                    @case('font_size')
                        <td>{{ $key }}</td> 
                        <td>{{ $value }}</td>
                    @break 
                @endswitch
            </tr> 
        @endforeach 
    </tbody> 
</table> 