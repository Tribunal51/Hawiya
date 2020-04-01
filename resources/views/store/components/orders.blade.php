<table class="table">
    <thead class="thead thead-dark">
        <tr> 
            <th scope="col">#</th> 
            <th scope="col">User</th> 
            <th scope="col">Products</th>
            <th scope="col">Comment</th> 
            <th scope="col">Store Admin Name</th> 
            <th scope="col">Price</th> 
            <th scope="col">Delivery Date</th> 
        </tr> 
    </thead> 
    <tbody> 
        @foreach($orders as $order) 
            <tr> 
                <td><a href={{"/dashboard/store/order/".$order->id }}>{{ $order->id }}</a></td> 
                <td>{{ $order->user_id }}</td>
                <td> 
                    @foreach($order->products as $product)   
                        {{ $product['title']. " | " }} 
                    @endforeach 
                </td> 
                <td>{{ $order->comment }}</td> 
                <td>{{ $order->store_admin_name }}</td> 
                <td>{{ $order->price }}</td>
                <td>{{ $order->delivery_date }}</td>
            </tr> 
        @endforeach 
    </tbody> 
</table> 