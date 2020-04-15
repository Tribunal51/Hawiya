<h3>Design Details</h3>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Attribute</th> 
            <th scope="col">Value</th>
        </tr> 
    </thead> 
    <tbody>
        @foreach((array)json_decode($design) as $key => $value) 
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

                    @case('item')
                        {{ $value->name }}   
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
<a class="btn btn-secondary" href={{"/dashboard/admin/data/commercial/item/".$design->item->id}}>Back</a>
<a class="btn btn-primary" href={{"/dashboard/admin/data/commercial/design/".$design->id."/edit"}}>Edit Design</a>









