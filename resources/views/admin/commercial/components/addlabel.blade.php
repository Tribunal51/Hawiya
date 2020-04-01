{!! Form::open(['action' => ['CommercialItemsController@addLabel', 'id' => $design->id], 'method' => 'POST', 'files' => true ]) !!}
<h3>Create Label</h3> 

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Attribute</th>
            @foreach($design_labels->colors as $color)
                <th scope="col">{{ $color->name }}</th> 
            @endforeach 
        </tr> 
    </thead>
    <tbody>
        @foreach($label_columns as $column)
            <tr>
                @switch($column) 
                    @case('x1')
                    @case('y1')
                    @case('x2')
                    @case('y2')
                    @case('font_size')
                        <td> {{ $column }}</td>
                        <td><input type="number" step="0.01" name="{{$column}}" required /></td>
                        
                    @break 

                    @case('font_name')
                    @case('text')
                    @case('text_decoration')
                        <td> {{ $column }}</td>
                        <td><input type="text" name="{{$column}}" required /></td>
                    @break 

                    @case('image')
                        <td>{{ $column }}</td> 
                        <td>
                            <div class="row">
                                <div class="col">
                                    <input type="file" id="label_image" name="image" /> 
                                </div>
                                <div class="col label_image"></div>
                            </div> 
                        </td> 
                    @break 

                    @case('hint')
                        <td> Hint </td> 
                        <td> 
                            <input type="text" name="hint" />
                        </td> 
                    @break 

                    @case('font_style')
                        <td> {{ $column }}</td>
                        <td>
                            <select name="font_style">
                                <option value="0" selected>Normal</option>
                                <option value="1">Italic</option> 
                            </select> 
                        </td>
                    @break 

                    @case('font_weight')
                        <td>{{ $column }}</td> 
                        <td><input type="number" name="{{$column}}" required /></td> 
                    @break

                    @case('backside')
                        <td>{{ $column }}</td> 
                        <td>
                            <select name="backside">
                            <option value="0" selected>False</option>
                            <option value="1">True</option>
                        </td>
                        </select>
                    @break 
                    
                @endswitch 
                
            </tr> 
        @endforeach 
        <tr>
            <td>Color</td>
            @foreach($design_labels->colors as $color)
                <td><input type="text" name={{"colors[".$color->id."]"}} required /></td> 
            @endforeach 
        </tr> 
    </tbody> 
</table> 
<a class="btn btn-secondary" href={{"/dashboard/admin/data/commercial/design/".$design->id}}>Back</a>
{!! Form::submit('Create Label', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

@push('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(function() {
            
            $('#label_image').on('change', function() {
                imagesPreview(this, 'div.label_image');
            });

            function imagesPreview(input, placeToInsertImagePreview) {
            // var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {   
                    var filesAmount = input.files.length;
                    console.log('Input Files', input.files);

                    window.images = input.files;
                    
                    // Array.from(window.images).forEach(file => {
                    //     getBase64(file);
                    // });
                    console.log('Window.files', window.files);
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $(placeToInsertImagePreview).empty();
                            $($.parseHTML('<img class="small-img">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                        // console.log(input.files[i]);
                        

                        
                        

                    }
                }

            }
        });

    </script>

@endpush