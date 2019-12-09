{!! Form::open(['action' => 'AdminController@addBusinesscard', 'method' => 'POST', 'files' => true]) !!}
    @csrf 

    

    <div class="form-group mt-2 row">
        <label for="shape" class="col-md-4 col-form-label text-md-right">Shape</label> 
        <div class="col-md-6">
            <select name="shape">
                <option value="square">Square</option> 
                <option value="vertical">Vertical</option> 
                <option value="horizontal" default>Horizontal</option>
            </select> 
        </div> 
    </div> 

    <div class="form-group mt-2 row">
        <label for="price1" class="col-md-4 col-form-label text-md-right">Price with Cover</label> 
        <div class="col-md-6">
            <input type="number" id="price1" name="price_with_cover" required /> 
        </div> 
    </div> 

    <div class="form-group mt-2 row">
        <label for="price2" class="col-md-4 col-form-label text-md-right">Price without Cover</label> 
        <div class="col-md-6">
            <input type="number" name="price_without_cover" id="price2" required /> 
        </div> 
    </div> 

    <div class="form-group mt-2 row">     
        <label for="frontbasephoto" class="col-md-4 col-form-label text-md-right">Front Base Photo</label>
        <input type="file" name="frontbasephoto" id="frontbasephoto" /> 
        {{-- <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>    --}}
        <div class="frontbasephoto"></div>
    </div> 

    <div class="form-group mt-2 row">
        <label for="fronttextphoto" class="col-md-4 col-form-label text-md-right">Front Text Photo</label>      
        <input type="file" name="fronttextphoto" id="fronttextphoto" /> 
        {{-- <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>    --}}
        <div class="fronttextphoto"></div>
    </div> 
    
    <div class="form-group mt-2 row">   
        <label for="backbasephoto" class="col-md-4 col-form-label text-md-right">Back Base Photo</label>  
        <input type="file" name="backbasephoto" id="backbasephoto" /> 
        {{-- <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>    --}}
        <div class="backbasephoto"></div>
    </div>

    <div class="form-group mt-2 row">   
        <label for="backtextphoto" class="col-md-4 col-form-label text-md-right">Back Text Photo</label>  
        <input type="file" name="backtextphoto" id="backtextphoto" /> 
        {{-- <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>    --}}
        <div class="backtextphoto"></div>
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
                            $($.parseHTML('<img style="width: 100px; height: 100px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                        // console.log(input.files[i]);
                        

                        
                        

                    }
                }

            };

            

            
        });

        
    </script>
@endpush 