/* This script and many more are available free online at
The JavaScript Source!! http://javascript.internet.com
Created by: Antonio Lupetti | http://woork.blogspot.com/ */

function toggleMsg(idElement){
  element = document.getElementById(idElement);
  if(element.style.visibility!='hidden'){
    element.style.visibility='hidden';
  } else {
    element.style.visibility='visible';
  }
}