<div class="row"> 
    <div class="col">
        <img src={{$old_image}} alt={{$old_image}} class="small-img" />
    </div> 
</div> 
<hr>
<div class="row">
    <div class="col">
        <input type="checkbox" name={{$checkImage}} id={{$changeImageId}} />
        <label for={{$changeImageId}}>Change Image</label>
        <br>
        <input type="file" id="my_file" name={{$imageName}} />
        
        
    </div>  
    <div class="col gallery"></div>
</div> 