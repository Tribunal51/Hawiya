{!! Form::open(['action' => ['CommercialItemsController@addColor', 'id' => $design->id], 'method' => 'POST', 'files' => true]) !!}

<h3> Colors </h3> 

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Primary Color</th> 
            @foreach($design_labels->labels as $label)
                <th scope="col">Label {{$label->id}} Color</th>
            @endforeach
            <th scope="col">Preview Image</th>
            <th scope="col"></th>
        </tr> 
    </thead>
    <tbody>
        @foreach($design_colors->colors as $color)
        <tr>
            <td><a href={{"/dashboard/admin/data/commercial/color/".$color->id}}>{{ $color->name }}</a></td> 
            @foreach($color->labels as $label)
                <td>{{ $label->pivot->color }}</td>
            @endforeach 
            <td><img src={{$color->preview_image}} alt={{$color->preview_image}} class="small-img" /></td>
            <td>
                {{ link_to_action('CommercialItemsController@deleteColor', 'Delete', ['id' => $color->id], ['class' => 'btn btn-danger'] )}}
            </td>
        </tr>
        @endforeach 
        <tr>
            <td><input type="text" name="color" required /></td> 
            @foreach($design->labels as $label)
                <td><input type="text" name={{ "labels[".$label->id."]" }} required /></td>
            @endforeach 
            <td>
                <div class="row">
                    <div class="col"><input type="file" name="preview_image" id="my_file" required /></div>
                    <div class="col gallery"></div>
                </div> 
            </td>
            <td><button type="submit" class="btn btn-success">Add</button></td>
        </tr>
    </tbody> 
</table>


{!! Form::close() !!}