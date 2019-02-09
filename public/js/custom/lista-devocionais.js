let devocionais = $('#box-devocionais');

$(document).ready(function() {
  //Limpeza do ID
	devocionais.empty(); 
  
  // Popular HTML  
	$.ajax({
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