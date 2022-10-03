// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};




/////////////////product store////////////////////////////////////////
 var loadFile_1 = function(event) {
  var i_1 = document.querySelector("#i_1");
  i_1.src =  URL.createObjectURL(event.target.files[0]);
  i_1.onload = function() {
    URL.revokeObjectURL(output.src) // free memory
  }
};

var loadFile_2 = function(event) {
  var i_1 = document.querySelector("#i_2");
  i_1.src =  URL.createObjectURL(event.target.files[0]);
  i_1.onload = function() {
    URL.revokeObjectURL(output.src) // free memory
  }
};

var loadFile_3 = function(event) {
  var i_1 = document.querySelector("#i_3");
  i_1.src =  URL.createObjectURL(event.target.files[0]);
  i_1.onload = function() {
    URL.revokeObjectURL(output.src) // free memory
  }
};


/////////////////product edit////////////////////////////////////////

