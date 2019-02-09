function randomN(min,max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}

$(document).ready(function() {
  
  var n1 = randomN(1,99);
  var n2 = randomN(1,99);
  
  var soma = n1 + n2;
    
  $("#cnum1").append(n1);
  $("#cnum2").append(n2);
});