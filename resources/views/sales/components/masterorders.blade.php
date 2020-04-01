{{-- Master Orders {{$masterorders }} --}}

<table class="table">
    <thead class="thead-dark">
        <tr> 
            <th scope="col">#</th> 
            <th scope="col">User</th> 
            <th scope="col">Total Price</th> 
            <th scope="col">Fast Delivery</th>
            <th scope="col">Delivery Date</th>
            <th scope="col">Created At</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach($masterorders as $masterorder) 
            <tr> 
                <td><a href={{"/dashboard/sales/masterorder/".$masterorder->id}}>{{ $masterorder->id}}</a></td> 
                <td><a href={{"/dashboard/sales/user/".$masterorder->user_id}}>{{ $masterorder->user_id}}</a></td> 
                <td>{{ $masterorder->total_price}}</td> 
                <td>{{ $masterorder->fast_delivery}}</td> 
                <td>{{ $masterorder->delivery_date }}</td> 
                <td>{{ $masterorder->created_at}}</td>
            </tr> 
        @endforeach 
    </tbody>
</table> 