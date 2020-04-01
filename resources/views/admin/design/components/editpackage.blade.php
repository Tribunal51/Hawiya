
{!! Form::open(['action' => ['AdminController@editPackage', 'id' => $data->id], 'method' => 'POST', 'files' => true]) !!}
    {!! Form::hidden('_method', 'PUT') !!}

    @csrf 

    <h3> Edit Package</h3>

    <table class="table">
        <thead class="thead-dark">
            <tr> 
                <th scope="col">Attribute</th> 
                <th scope="col">Value</th> 
            </tr> 
        </thead> 
        <tbody>
            <tr>
                <td>Title</td>
                <td> 
                    <input type="text" name="title" value="{{$data->title}}" />
                </td> 
            </tr> 
            <tr>
                <td>Title (Arabic)</td>
                <td>
                    <input type="text" id="title_ar" name="title_ar" value="{{$data->title_ar }}" class="text-md-right"  required />
                </td> 
            </tr> 

            <tr>
                <td>Old Price</td> 
                <td>
                    <input type="number" step="0.01" class="col-md-2" value="{{$data->old_price}}" name="old_price" id="old_price" required /> 
                </td>
            </tr> 

            <tr>
                <td>New Price</td> 
                <td>
                    <input type="number" step="0.01" class="col-md-2" value="{{$data->new_price}}" name="new_price" id="new_price" required />
                </td> 
            </tr> 


            <tr>
                <td>Image</td> 
                <td>
                    <div class="row"> 
                        <div class="col">
                            <img src={{$data->image}} alt={{$data->image}} class="small-img" />
                        </div> 
                    </div> 
                    <hr>
                    <div class="row mt-2">
                        <div class="col">
                            <input type="checkbox" name="changeImage" id="changeImage"  />
                            <label for="changeImage">Change Image</label>
                            <br>
                            <input type="file" id="image" name="image" />
                            
                            
                        </div>  
                        <div class="col image"></div>
                    </div> 
                </td>
            </tr>
            <tr>
                <td>Image (Arabic)</td> 
                <td>
                    <div class="row"> 
                        <div class="col">
                            <img src={{$data->image_ar}} alt={{$data->image_ar}} class="small-img" />
                        </div> 
                    </div> 
                    <hr>
                    <div class="row mt-2">
                        <div class="col">
                            <input type="checkbox" name="changeImageAr" id="changeImageAr" />
                            <label for="changeImageAr">Change Image</label>
                            <br>
                            <input type="file" id="image_ar" name="image_ar" />
                            
                            
                        </div>  
                        <div class="col image_ar"></div>
                    </div> 
                </td>
            </tr>
        </tbody> 
    </table> 

    



    

    {!! Form::submit('Save', ['class' => 'btn btn-primary m-1']) !!}
    
{!! Form::close() !!}

<a href={{"/dashboard/admin/databoard/addData/".$data->category_id}} class="m-1 btn btn-secondary">Back</a>

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

                if (input.files.length > 0) {   
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
                else {
                    $(placeToInsertImagePreview).empty();
                }

            };

            

            
        });

        
    </script>
@endpush 

