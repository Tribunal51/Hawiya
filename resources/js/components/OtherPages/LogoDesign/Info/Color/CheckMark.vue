<template>
    <label class="checkboxContainer">
      <slot></slot>
      <span class="checkmark"></span>     
    </label>
</template>

<script>
export default {

}
</script>

<style scoped>
/* The container */
.checkboxContainer {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  
}

/* Hide the browser's default checkbox */
.checkboxContainer input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 40px;
  background-color: white;
  border-radius: 35%;
  border: 1px solid lightgray;
  
}

/* On mouse-over, add a grey background color */
.checkboxContainer:hover input ~ .checkmark {
    background-color: #ccc;
}


.checkboxContainer input ~ .checkmark:after {
  left: 15px;
  top: 4px;
  width: 8px;
  height: 12px;
  border: solid gray;
  border-width: 0 2px 2px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);  
  display: block;
}

/* When the checkbox is checked, add a green background */
.checkboxContainer input:checked ~ .checkmark {
  background-color: green;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}







/* Show the checkmark when checked */
.checkboxContainer input:checked ~ .checkmark:after {
  display: block;
  border: solid white;
  border-width: 0 3px 3px 0; 
}

/* Style the checkmark/indicator */
.checkboxContainer .checkmark:after {
  left: 15px;
  top: 4px;
  width: 8px;
  height: 12px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
  
}

</style>
