{!! Form::open(['action' => ['CommercialItemsController@addDesign', 'category_id' => $item->id], 'method' => 'POST', 'files' => true]) !!}
    @csrf 

    <h3> Create Design</h3>
    <div class="form-group mt-2 row">
        <label for="design_name" class="col-md-2 offset-md-2">Design Name</label> 
        <input id="design_name" name="design_name" class="col-md-2" type="text" required />
    </div> 
    @if(sizeof($item->options_info['shape']) > 0)
        <div class="form-group mt-2 row">
            <label for="shape" class="col-md-2 offset-md-2">Shape</label> 
            
            <select name="shape" class="col-md-2">
                @foreach($item->options_info['shape'] as $shape)
                    <option value="{{$shape}}" {{ $shape === 'standard' ? 'selected' : null }}>{{ $shape }}</option>
                @endforeach 
                {{-- <option value="standard" selected>Standard</option>
                <option value="square">Square</option> 
                <option value="rounded rectangle">Rounded Rectangle</option> 
                <option value="rounded square">Rounded Square</option>
                <option value="oval">Oval</option> 
                <option value="circle">Circle</option> --}}
            </select> 
        
        </div> 
    @endif

    @if(sizeof($item->options_info['orientation']) > 0)
        <div class="form-group mt-2 row">
            <label for="orientation" class="col-md-2 offset-md-2">Orientation</label> 
            
            <select name="orientation" class="col-md-2">
                @foreach($item->options_info['orientation'] as $orientation) 
                    <option value="{{$orientation}}">{{$orientation}}</option>
                @endforeach 
                {{-- <option value="horizontal" selected>Horizontal</option>
                <option value="vertical">Vertical</option> --}}
                
            </select> 
        </div> 
    @endif 

    @if(sizeof($item->options_info['fold']) > 0)
        <div class="form-group mt-2 row">
            <label for="fold" class="col-md-2 offset-md-2">Fold</label> 
            <select name="fold" class="col-md-2">
                @foreach($item->options_info['fold'] as $fold) 
                    <option value="{{$fold}}">{{$fold}}</option>
                @endforeach 
            </select> 
        </div> 
    @endif 

    @if(sizeof($item->options_info['type']) > 0)
        <div class="form-group mt-2 row">
            <label for="type" class="col-md-2 offset-md-2">Type</label> 
            <select name="type" class="col-md-2">
                @foreach($item->options_info['type'] as $type) 
                    <option value="{{$type}}">{{$type}}</option>
                @endforeach 
            </select> 
        </div> 
    @endif

    <div class="form-group mt-2 row">
        <label for="price1" class="col-md-2 offset-md-2">Price with Cover</label> 
        
        <input type="number" step="0.01" id="price1" name="price_with_cover" class="col-md-2" required /> 
        
    </div> 

    <div class="form-group mt-2 row">
        <label for="price2" class="col-md-2 offset-md-2">Price without Cover</label> 
        
        <input type="number" step="0.01" class="col-md-2" name="price_without_cover" id="price2" required /> 
        
    </div> 

    <div class="form-group mt-2 row">     
        <label for="frontbasephoto" class="col-md-2 offset-md-2">Front Base Photo</label>
        <input type="file" name="frontbasephoto" id="frontbasephoto" class="col-md-3" /> 
        {{-- <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>    --}}
        <div class="frontbasephoto col-md-3"></div>
    </div> 

    <div class="form-group mt-2 row">
        <label for="fronttextphoto" class="col-md-2 offset-md-2">Front Text Photo</label>      
        <input type="file" name="fronttextphoto" id="fronttextphoto" class="col-md-3" /> 
        {{-- <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>    --}}
        <div class="fronttextphoto col-md-3"></div>
    </div> 
    
    <div class="form-group mt-2 row">   
        <label for="backbasephoto" class="col-md-2 offset-md-2">Back Base Photo</label>  
        <input type="file" name="backbasephoto" id="backbasephoto" class="col-md-3" /> 
        {{-- <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>    --}}
        <div class="backbasephoto col-md-3"></div>
    </div>

    <div class="form-group mt-2 row">   
        <label for="backtextphoto" class="col-md-2 offset-md-2">Back Text Photo</label>  
        <input type="file" name="backtextphoto" id="backtextphoto" class="col-md-3" /> 
        {{-- <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>    --}}
        <div class="backtextphoto col-md-3"></div>
    </div>

    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
    

{!! Form::close() !!}

{{-- {!! Form::open(['action' => 'AdminController@addPackage', 'method' => 'POST']) !!}
    @csrf 
    <div class="form-group mt-2 row">
        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label> 
        <div class="col-md-6">
            <input type="text" id="title" name="title" class="form-control" required />
        </div>
        
    </div>

    <div class="form-group mt-2 row">
        <label for="title_ar" class="col-md-4 col-form-label text-md-right">Title (Arabic)</label> 
        <div class="col-md-6">
            <input type="text" id="title_ar" name="title_ar" class="form-control" style="text-align: right" required />
        </div> 
    </div> 

    <div class="form-group mt-2 row">
        <label for="old_price" class="col-md-4 col-form-label text-md-right">Old Price</label> 
        <div class="col-md-6">
            <input type="number" id="old_price" name="old_price" class="form-control" required />
        </div> 
    </div>

    <div class="form-group mt-2 row">
        <label for="new_price" class="col-md-4 col-form-label text-md-right">New Price</label> 
        <div class="col-md-6">
            <input type="number" id="new_price" name="new_price" class="form-control" required /> 
        </div> 
    </div> 

    <div class="form-group">
        <input type="file" name="image" id="my_files"  />
        <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>
            @include('admin.components.temp')       
    </div>
    <div class="gallery"></div>
    
    {!! Form::hidden('category_id', $data['category']->id) !!}
    
    <div class="form-group row mb-0">       
        <div class="col-md-8 offset-md-4">
            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>


{!! Form::close() !!} --}}

@push('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(function() {
            window.images = [];
            window.files = [];
            
            $('#fronttextphoto').on('change', function() {
                imagesPreview(this, 'div.fronttextphoto');
            });

            $('#frontbasephoto').on('change', function() {
                imagesPreview(this, 'div.frontbasephoto');
            });

            $('#backtextphoto').on('change', function() {
                imagesPreview(this, 'div.backtextphoto');
            });

            $('#backbasephoto').on('change', function() {
                imagesPreview(this, 'div.backbasephoto');
            });

            

            
            
            function dataURLtoBlob() {
                console.log('Inside dataURLtoBlob');
                var arr = dataurl.split(',');
                var mime = arr[0].match(/:(.*?);/)[1];
                var bstr = atob(arr[1]);
                var n = bstr.length;
                var u8arr = new Uint8Array(n);
                
                while(n--) {
                    u8arr[n] = bstr.charCodeAt(n);
                }
                return new Blob([u8arr], {type:mime});
            }
            
            function getBase64(file) {
                var reader = new FileReader();
                var convertedFile = '';
                reader.readAsDataURL(file);
                reader.onload = function() {
                    convertedFile = reader.result;
                    //console.log(reader.result);
                    window.files.push(reader.result);
                    //window.files.push(reader.result);
                };
                reader.onerror = function(error) {
                    
                    console.log("Error: ", error);
                };                               
                //return convertedFile;

            }
        

            // Multiple images preview in browser
        
            function imagesPreview(input, placeToInsertImagePreview) {
            // var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {   
                    var filesAmount = input.files.length;
                    console.log('Input Files', input.files);

                    window.images = input.files;
                    
                    Array.from(window.images).forEach(file => {
                        getBase64(file);
                    });
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

            };

            

            
        });

        
    </script>
@endpush 