{!! Form::open(['action' => ['SalesAdminController@createPreorder', 'id' => $user->id, 'category' => $category], 'method' => 'POST']) !!}
    
    <div class="form-group row mt-2">
        <div class="col-md-2">Item Name</div> 
        <div class="col-md-2">
            <select name="item_name">
                @foreach($items as $item) 
                    @if(isset($item->subitems))
                        <optgroup label="{{$item->name}}">
                            @foreach($item->subitems as $subitem)
                                <option value="{{$subitem->name}}">{{$subitem->name}}</option>
                                {{-- {{ Form::hidden('item_id', $item->id) }} --}}
                            @endforeach 
                        </optgroup>
                    @else 
                        <option value="{{$item->name}}">{{$item->name}}</option>
                        {{-- {{ Form::hidden('item_id', $item->id) }} --}}
                    @endif
                    
                @endforeach
            </select>
        </div> 
    </div> 

    <div class="form-group row mt-2">
        <label for="printing" class="col-md-2">Printing Information</label> 
        <input type="text" class="col-md-2" name="printing" id="printing" />
    </div> 

    <div class="form-group row mt-2">
        <label for="paper" class="col-md-2">Paper Information</label> 
        <input type="text" class="col-md-2" name="paper" id="paper" />
    </div> 

    <div class="form-group row mt-2">
        <label for="finishing" class="col-md-2">Finishing</label> 
        <input type="text" class="col-md-2" name="finishing" id="finishing" />
    </div> 

    <div class="form-group row mt-2">
        <label for="note" class="col-md-2">Note</label> 
        <input type="text" class="col-md-2" name="note" id="note" />
    </div>
    
    <div class="form-group row mt-2">
        <label for="size" class="col-md-2">Sizes</label> 
        <textarea class="col-md-2" name="size" id="size"></textarea>
    </div> 

    <div class="form-group row mt-2">
        <label for="quantity" class="col-md-2">Quantity</label> 
        <input type="number" name="quantity" id="quantity" />
    </div> 

    <div class="form-group row mt-2">
        <label for="price" class="col-md-2">Price</label> 
        <input type="number" step="0.01" name="price" id="price" />
    </div> 

    <div class="form-group row mt-2">
        <label for="date" class="col-md-2">Date (Optional)</label>
        <input type="date" name="date" id="date" />
    </div> 

    {!! Form::submit('Create Preorder', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}




