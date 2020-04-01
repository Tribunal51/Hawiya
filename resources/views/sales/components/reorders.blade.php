{{-- {{ $reorders }} --}}

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th> 
            <th scope="col">Order Token</th> 
            <th scope="col">Old Quantity</th> 
            <th scope="col">New Quantity</th> 
            <th scope="col">Old Price</th> 
            <th scope="col">New Price</th>
            <th scope="col">New Quotation</th> 
            <th scope="col">Order Created At </th>
            <th scope="col">Reorder Created At</th>
        </tr>
    </thead> 
    <tbody>
        @foreach($reorders as $reorder)
            <tr>
                <td><a href={{"/dashboard/sales/reorder/".$reorder->id}}>{{ $reorder->id }}</a></td> 
                <td>{{ $reorder->order_token }}</td> 
                <td>{{ $reorder->order->quantity }}</td> 
                <td>{{ $reorder->new_quantity }}</td> 
                <td>{{ $reorder->order->price }}</td> 
                <td>{{ $reorder->new_price }}</td> 
                <td><img src="{{$reorder->new_quotation}}" alt="{{$reorder->new_quotation}}" class="small-img" /></td> 
                <td>{{ $reorder->order->created_at}}</td> 
                <td>{{ $reorder->created_at}}</td>
            </tr> 
        @endforeach
    </tbody> 
</table> 