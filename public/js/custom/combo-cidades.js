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