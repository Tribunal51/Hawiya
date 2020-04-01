{!! Form::open(['action' => 'AdminController@addPackage', 'method' => 'POST', 'files' => true]) !!}
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
            <input type="number" step="0.01" id="old_price" name="old_price" class="form-control" required />
        </div> 
    </div>

    <div class="form-group mt-2 row">
        <label for="new_price" class="col-md-4 col-form-label text-md-right">New Price</label> 
        <div class="col-md-6">
            <input type="number" step="0.01" id="new_price" name="new_price" class="form-control" required /> 
        </div> 
    </div> 

    {{-- <div class="form-group">
        <input type="file" name="image" id="my_files"  />
        <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>
            @include('admin.components.temp')       
    </div>
    <div class="gallery"></div> --}}

    <div class="form-group mt-2 row">
        <label for="image" class="col-md-2 offset-md-2">Image (English)</label>      
        <input type="file" name="image" id="image" class="col-md-3" /> 
        {{-- <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>    --}}
        <div class="image col-md-3"></div>
    </div> 
    
    <div class="form-group mt-2 row">   
        <label for="image_ar" class="col-md-2 offset-md-2">Image (Arabic)</label>  
        <input type="file" name="image_ar" id="image_ar" class="col-md-3" /> 
        {{-- <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>    --}}
        <div class="image_ar col-md-3"></div>
    </div>
    
    {!! Form::hidden('category_id', $data['category']->id) !!}
    
    <div class="form-group row mb-0">       
        <div class="col-md-8 offset-md-4">
            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>



{!! Form::close() !!}

@push('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(function() {
            window.images = [];
            window.files = [];
            
            $('#image').on('change', function() {
                imagesPreview(this, 'div.image');
            });

            $('#image_ar').on('change', function() {
                imagesPreview(this, 'div.image_ar');
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