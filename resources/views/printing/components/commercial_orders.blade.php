<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th> 
            <th scope="col">User ID</th>
            <th scope="col">Item Name</th> 
            <th scope="col">Days Left</th>
        </tr> 
    </thead> 
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td><a href={{"/dashboard/printing/order/commercial/".$order->id}}>{{ $order->id }}</td> 
                <td><a href={{"/dashboard/printing/user/".$order->user_id}}>{{ $order->user_id }}</td> 
                <td>{{ $order->item_name }}</td> 
                <td>{{ $order->days_left}} </td>
            </tr> 
        @endforeach 
    </tbody>
</table> 