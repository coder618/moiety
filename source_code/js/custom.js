"use strict";

/* ----------------------
    -- Global function
    -- which will call
    -- form other functions
--------------------------*/

//Button animation class toggler
function activeBtn(elem) {
  elem.classList.remove("loading-state");
  elem.removeAttribute("disabled");
}

function disableBtn(elem) {
  elem.classList.add("loading-state");
  elem.setAttribute("disabled", "disabled");
}

function isInArray(value, array) {
  return array.indexOf(value) > false;
}

// For gating size of the object
Object.size = function(obj) {
  var size = 0,
    key;
  for (key in obj) {
    if (obj.hasOwnProperty(key)) size++;
  }
  return size;
};

jQuery(document).ready(function($) {});
