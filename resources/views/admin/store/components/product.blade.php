<h3>Product Details </h3>
<table class="table">
    <thead class="thead thead-dark">
        <tr>
            <th scope="col">Attribute</th> 
            <th scope="col">Value</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach(json_decode($product) as $key => $value) 
            <tr>
                <td>{{ $key }}</td> 
                <td> 
                    @switch($key)
                        @case('image')
                            <img class="small-img" src="{{$value}}" alt="{{$value}}" />
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

<a class="btn btn-secondary" href="{{URL::previous()}}">Back</a> 
<a class="btn btn-primary" href={{"/dashboard/admin/data/store/product/".$product->id."/edit"}}>Edit</a>