function linksboven(){
   document.getElementById("box").style.borderTopLeftRadius = "25px"; 
};

function rechtsboven(){
    document.getElementById("box").style.borderTopRightRadius = "25px"; 
};

function linksonder(){
    document.getElementById("box").style.borderBottomLeftRadius = "25px"; 
};

function rechtsonder(){
    document.getElementById("box").style.borderBottomRightRadius = "25px"; 
};

var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
} 