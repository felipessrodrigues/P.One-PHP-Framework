//document.getElementById("cidades").onload = function() {listarCidades()};

/** 
 * Combo
 * Listar cidades
**/
function listarCidades() {  
  let cidades = $('#cidades');
  const url = 'util/files/cidades.json';

  // Limpeza do ID
  cidades.empty();

  // Configuração inicial
  cidades.append('<option selected="true" disabled>Escolha uma cidade...</option>');
  cidades.prop('selectedIndex', 0);

  // Popular HTML
  $.getJSON(url, function (data) {
    $.each(data, function (key, item) {
      cidades.append($('<option></option>').attr('value', item.id).text(item.descricao));
    })
  });
}


/** 
 * Cards - Devocionais
 * Listar últimas devocionais
**/
function listarDevocionais() {
  let devocionais = $('#box-devocionais');

  $(document).ready(function() {
    devocionais.empty(); // limpeza do bloco

    $.ajax({ // popular HTML
      type:'post',	
      dataType: 'json',
      url: 'util/files/devocionais.json',
      success: function(dados) {
        var html = "";

        html += '<div class="row">';

        for (var i = 0; i <= 1; i++) {        
          html += '  <div class="col-md-6 col-sm-12">';
          html += '    <div class="box">';
          html += '      <div class="box-title">';
          html += '        ' + dados[i].titulo;
          html += '      </div>';
          html += '      <p class="box-content" data-limit="135">';
          html += '        ' + dados[i].conteudo;
          html += '      </p>';
          html += '      <div class="box-link">';
          html += '        <a href="#">';
          html += '          Leia mais [...]';
          html += '        </a>';
          html += '      </div>';
          html += '    </div><!-- ./box -->';
          html += '  </div><!-- ./col -->';
          html += ' ';
        }

        html += '</div><!-- ./row -->';
        devocionais.append(html); 
      },
      error: function(dados) {
        devocionais.append("Não foi possível carregar as devocionais.");
      }
    });
  });
}


/** 
 * Cards - Noticias
 * Listar últimas notícias
**/
function listarNoticias() {
  let noticias = $('#box-noticias');

  $(document).ready(function() {
    noticias.empty(); // limpeza do bloco

    $.ajax({ // popular HTML
      type:'post',	
      dataType: 'json',
      url: 'util/files/noticias.json',
      success: function(dados) {
        var html = "";
        html += '<div class="row">';

        for (var i = 0; i < 1; i++) {
          html += '  <div class="col-md-12 col-sm-12">';
          html += '    <div class="box">';
          html += '      <div class="box-title">';
          html += '        ' + dados[i].titulo;
          html += '      </div>';
          html += '      <p class="box-content" data-limit="135">';
          html += '        ' + dados[i].conteudo;
          html += '      </p>';
          html += '      <p class="card-text">';
          html += '        <small class="text-muted">';
          html += '          Atualizado em ' + dados[i].data;
          html += '        </small>';
          html += '      </p>';
          html += '      <div class="box-link">';
          html += '        <a href="#">';
          html += '          Leia mais [...]';
          html += '        </a>';
          html += '      </div>';
          html += '    </div><!-- ./box -->';
          html += '  </div><!-- ./col -->';
          html += ' ';
        }

        html += '</div><!-- ./row -->';
        noticias.append(html); 
      },
      error: function(dados) {
        noticias.append("Não foi possível carregar as noticias.");
      }
    });
  });
}


/** 
 * Gerador
 * Gerar numeros aleatorios - 02 bytes
**/
function gerarNumerosDoisBytes(min=1, max=99) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}

/** 
 * Gerador
 * Gerar numeros aleatorios - 02 bytes
**/
function gerarNumerosTresBytes(min=1, max=999) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}

/** 
 * Captcha
 * Gerar captcha para validacao de form
**/
function gerarCaptcha() {
  var n1 = gerarNumerosDoisBytes();
  var n2 = gerarNumerosDoisBytes();
  
  var soma = n1 + n2;
  
  $(document).ready(function() {
    $("#cnum1").append(n1);
    $("#cnum2").append(n2);
  });
}