let noticias = $('#box-noticias');

$(document).ready(function() {
  //Limpeza do ID
	noticias.empty(); 
  
  // Popular HTML  
	$.ajax({
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