{!! Form::open(['action' => ['StoreController@updateOrder', 'id' => $order->id], 'method' => 'POST']) !!}
{!! Form::hidden('_method', 'PUT') !!}
<table class="table">
    <thead class="thead-dark">
        <tr> 
            <th scope="col">Attribute</th> 
            <th scope="col">Value</th>
        </tr> 
    </thead>
    <tbody> 
        @foreach(json_decode($order) as $key => $value)
            <tr> 
                @switch($key) 
                    @case('user_id')
                        <td>{{ $key }}</td> 
                        <td>{{ $value }}</td>
                    @break 

                    @case('comment')
                        <td>Comment </td> 
                        <td>{{ $value }}</td>
                    @break 

                    @case('price')
                        <td>Price</td> 
                        <td>{{ $value }}</td> 
                    @break 

                    
                    @case('store_admin_id')
                        @if(Auth::user()->admin)
                            <td>Store Admin</td> 
                            <td> 
                                <select name="store_admin_id">
                                    @foreach($admins as $admin)
                                        <option 
                                            value={{$admin->id}} 
                                            {{ $value === $admin->id ? 'selected' : ''}}>{{ $admin->name }}</option>
                                    @endforeach 
                                </select> 
                            </td> 
                        @endif
                    @break 

                    {{-- @case('delivery_date')
                        <td> Delivery Date</td>
                        <td> 
                            @if((Auth::user()->sales_admin) && ($order->sales_admin_id === Auth::user()->id)) 
                                <input type="datetime-local" value={{date('Y-m-d\TH:i', strtotime($value))}} name="delivery_date" />
                            @else 
                                {{ $value }}
                            @endif 
                        </td> 
                    @break  --}}
                    

                    @case('products')
                        <td>Products</td> 
                        <td>
                            <table border="1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Title</th> 
                                        <th scope="col">Size</th> 
                                        <th scope="col">Quantity</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    @foreach((array)$value as $product)
                                        <tr> 
                                            <td>{{ $product->title }}</td> 
                                            <td>{{ $product->size }}</td> 
                                            <td>{{ $product->quantity }}</td>
                                        </tr> 
                                        {{-- <td>{{ $product['name']}}</td> 
                                        <td>{{ $product['size'] }}</td> 
                                        <td>{{ $product['quantity'] }}</td> --}}
                                    @endforeach 
                                </tbody> 
                            </table> 
                        </td>
                    @break  
                @endswitch 
            </tr> 
        @endforeach 
    </tbody> 
</table> 
<a href="{{URL::previous()}}" class="btn btn-secondary">Back</a> 
{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}