/**
 * Gerador
 * Gerar número aleatório
*/
function numeroAleatorio(min,max) {
  try {
    var numero = Math.floor(Math.random() * (max - min + 1) + min);
    return numero;
  } catch(err) {
    return 1
  }
}

/**
 * Gerador
 * Gerar captcha
*/
function gerarCaptcha() {
  try {
    $(document).ready(function() {   
      var n1 = numeroAleatorio(1,99);
      var n2 = numeroAleatorio(1,99);

      document.getElementById('cnum1').innerHTML = '<span id="cnum1">' + n1 + '</span>';
//       $("#cnum1").html('<span id="cnum1">' + n1 + '</span>');
//       $("#cnum2").html('<span id="cnum2">' + n2 + '</span>');
    });
  } catch(err) {
    alert("Não deu certo")
  }
}

// Verificar resultado do captcha
function validarCaptcha(n1,n2,resposta) {
  try {
    var soma = n1 + n2;
    alert(n1 + ' + ' + n2 + ' = ' + soma);

    if (soma != resposta)
      alert("Diferente")
    else
      alert("igual")
  } catch(err) {
    alert("Não deu certo")
  }
}

// Submit form with id function
function validarFormulario() {
  try {
    validarCaptcha(document.getElementById("cnum1").value,
                   document.getElementById("cnum2").value,
                   document.getElementById("csum").value);
  }
  catch(err) {
    alert("falhou")
  }
  
//   var  = document.getElementById("name").value;
//   var email = document.getElementById("email").value;
//   var contact = document.getElementById("contact").value;
//   if (validation()) // Calling validation function
//   {
//   document.getElementById("form_id").action = "success.php"; // Setting form action to "success.php" page
//   document.getElementById("form_id").submit(); // Submitting form
//   }
//   }
//   // Name and Email validation Function
//   function validation() {
//   var name = document.getElementById("name").value;
//   var email = document.getElementById("email").value;
//   var contact = document.getElementById("contact").value;
//   var emailReg = /^([w-.]+@([w-]+.)+[w-]{2,4})?$/;
//   if (name === '' || email === '' || contact === '') {
//   alert("Please fill all fields...!!!!!!");
//   return false;
//   } else if (!(email).match(emailReg)) {
//   alert("Invalid Email...!!!!!!");
//   return false;
//   } else {
//   return true;
//   }
}