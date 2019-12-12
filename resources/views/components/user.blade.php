<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Attribute</th> 
            <th>Value</th>
        </tr> 
    </thead> 
    <tbody>
        @foreach((array)json_decode($user) as $key => $value)   
            <tr>
                <td>{{ $key }}</td> 
                <td>{{ $value }}</td>
            </tr> 
        @endforeach 
    </tbody> 
</table> 
    
    