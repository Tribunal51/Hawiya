<template>
    <div class="container">
        <div class="slider">
            <div class="track"></div>
        </div>
        <div class="output o0"> </div>
        <div class="thumb t0"></div>
    </div>  


</template>

<script>



export default {
    mounted() {
        var inputsRy = {
        sliderWidth: 300,
        minRange: 50,
        maxRange: 200, 
        outputWidth:30, // output width
        thumbWidth: 18, // thumb width
        thumbBorderWidth: 4,
        trackHeight: 4,
        theValue: [70, 120] // theValue[0] < theValue[1]
        };
        var isDragging0 = false;
        var isDragging1 = false;

        var range = inputsRy.maxRange - inputsRy.minRange;
        var rangeK = inputsRy.sliderWidth / range;
        var container = document.querySelector(".container");
        var thumbRealWidth = inputsRy.thumbWidth + 2 * inputsRy.thumbBorderWidth;

        // styles
        var slider = document.querySelector(".slider");
        slider.style.height = inputsRy.trackHeight + "px";
        slider.style.width = inputsRy.sliderWidth + "px";
        slider.style.paddingLeft = (inputsRy.theValue[0] - inputsRy.minRange) * rangeK + "px";
        slider.style.paddingRight = inputsRy.sliderWidth - inputsRy.theValue[1] * rangeK + "px";

        var track = document.querySelector(".track");
        track.style.width = inputsRy.theValue[1] * rangeK - inputsRy.theValue[0] * rangeK + "px";

        var thumbs = document.querySelectorAll(".thumb");
        for (var i = 0; i < thumbs.length; i++) {

        thumbs[i].style.width = thumbs[i].style.height = inputsRy.thumbWidth + "px";
        console.log(inputsRy.thumbWidth + "px");
        thumbs[i].style.borderWidth = inputsRy.thumbBorderWidth + "px";
        thumbs[i].style.top = -(inputsRy.thumbWidth / 2 + inputsRy.thumbBorderWidth - inputsRy.trackHeight / 2) + "px";
        thumbs[i].style.left = (inputsRy.theValue[i] - inputsRy.minRange) * rangeK - (thumbRealWidth / 2) + "px";

        }
        var outputs = document.querySelectorAll(".output");
        for (var i = 0; i < outputs.length; i++) {
        console.log(thumbs[i])
        outputs[i].style.width = outputs[i].style.height = outputs[i].style.lineHeight = outputs[i].style.left = inputsRy.outputWidth + "px";
        outputs[i].style.top = -(Math.sqrt(2 * inputsRy.outputWidth * inputsRy.outputWidth) + inputsRy.thumbWidth / 2 - inputsRy.trackHeight / 2) + "px";
        outputs[i].style.left = (inputsRy.theValue[i] - inputsRy.minRange) * rangeK - inputsRy.outputWidth / 2 + "px";
        outputs[i].innerHTML = "<p>" + inputsRy.theValue[i] + "</p>";
        }

        //events

        thumbs[0].addEventListener("mousedown", function(evt) {
        isDragging0 = true;
        }, false);
        thumbs[1].addEventListener("mousedown", function(evt) {
        isDragging1 = true;
        }, false);
        container.addEventListener("mouseup", function(evt) {
        isDragging0 = false;
        isDragging1 = false;
        }, false);
        container.addEventListener("mouseout", function(evt) {
        isDragging0 = false;
        isDragging1 = false;
        }, false);

        container.addEventListener("mousemove", function(evt) {
        var mousePos = oMousePos(this, evt);
        var theValue0 = (isDragging0) ? Math.round(mousePos.x / rangeK) + inputsRy.minRange : inputsRy.theValue[0];
        console.log(theValue0);
        var theValue1 = (isDragging1) ? Math.round(mousePos.x / rangeK) + inputsRy.minRange : inputsRy.theValue[1];

        if (isDragging0) {

            if (theValue0 < theValue1 - (thumbRealWidth / 2) &&
            theValue0 >= inputsRy.minRange) {
            inputsRy.theValue[0] = theValue0;
            thumbs[0].style.left = (theValue0 - inputsRy.minRange) * rangeK - (thumbRealWidth / 2) + "px";
            outputs[0].style.left = (theValue0 - inputsRy.minRange) * rangeK - inputsRy.outputWidth / 2 + "px";
            outputs[0].innerHTML = "<p>" + theValue0 + "</p>";
            slider.style.paddingLeft = (theValue0 - inputsRy.minRange) * rangeK + "px";
            track.style.width = (theValue1 - theValue0) * rangeK + "px";

            }
        } else if (isDragging1) {

            if (theValue1 > theValue0 + (thumbRealWidth / 2) &&
            theValue1 <= inputsRy.maxRange) {
            inputsRy.theValue[1] = theValue1;
            thumbs[1].style.left = (theValue1 - inputsRy.minRange) * rangeK - (thumbRealWidth / 2) + "px";
            outputs[1].style.left = (theValue1 - inputsRy.minRange) * rangeK - inputsRy.outputWidth / 2 + "px";
            outputs[1].innerHTML = "<p>" + theValue1 + "</p>";
            slider.style.paddingRight = (inputsRy.maxRange - theValue1) * rangeK + "px";
            track.style.width = (theValue1 - theValue0) * rangeK + "px";

            }
        }

        }, false);

        // helpers

        function oMousePos(elmt, evt) {
        var ClientRect = elmt.getBoundingClientRect();
        return { //objeto
            x: Math.round(evt.clientX - ClientRect.left),
            y: Math.round(evt.clientY - ClientRect.top)
        }
        }
    }
}

</script>

<style scoped>
/*GREENS: #4ac4ac, #399988, #17694f, #0a1a17;*/

* {
  margin: 0;
  padding: 0;
}

body,
html {
  width: 100%;
  height: 100%;
  margin: 0px auto;
  background-color: #333;
}

.slider {
  pointer-events: none;
  margin: 0px;
  cursor: pointer;
  /*width:200px;*/
  
  padding-left: 30%;
  padding-right: 30%;
  /*height:6px;*/
  
  background-color: #17694f;
  box-sizing: border-box;
}

.slider.focusable {
  border: 1px solid #222
}

.thumb {
  cursor: pointer;
  border-color: #333;
  border-style: solid;
  /*border-width:4px; width:16px; height:16px;*/
  
  background-color: #0f4534;
  background-color: rgba(100, 100, 100, 1);
  border-radius: 50%;
  position: absolute;
  /*top:-6px;left:50px;*/
}

.track {
  pointer-events: none;
  height: 100%;
  background-color: #4ac4ac;
}

.container {
  position: relative;
  margin: 200px auto;
  height: 30px;
  width: 220px;
}

.output {
  pointer-events: none;
  margin: 0;
  width: 30px;
  height: 30px;
  line-height: 30px;
  border-radius: 50% 50% 0 50%;
  background-color: #4ac4ac;
  text-align: center;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
  position: absolute;
  top: -45px;
  /*left:45px*/
  
  ;
}

.output p {
  pointer-events: none;
  font-size: 14px;
  color: #0a1a17;
  text-align: center;
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  transform: rotate(-45deg);
}
    

</style>
