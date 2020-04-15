test
<h2>Order Number: {{$master_order->id}}</h2> 
<h3>Order Cost: ${{$master_order->price}}</h2>
<h3>Order details</h3>
<table class="table">
    <thead class="thead-dark">
        <th scope="col">Order Token</th> 
        <th scope="col">Category</th> 
    </thead> 
    <tbody> 
        @foreach($all_orders as $order) 
            <tr> 
                <td>{{ $order->order_token }}</td> 
                <td>{{ $order->category->name }}</td> 
            </tr> 
        @endforeach 
    </tbody> 
</table> 
    