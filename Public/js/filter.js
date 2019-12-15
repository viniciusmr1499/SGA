// Ordenação - tabelas
$(document).ready(function(){
    $('#dataTable').DataTable({
        'language':{
            'lengthMenu': 'Mostrando _MENU_ registros por página',
            'zeroRecords': 'Nenhum registro encontrado',
            'info': 'Mostrando página _PAGE_ de _PAGE_',
            'infoEmpty': 'Nenhum registro disponível',
            'infoFiltered': '(Filtrando de _MAX_ registros no total)',
            'search': "Pesquisar:",
            paginate: {
                first:      "Primeiro",
                previous:   "Anterior",
                next:       "Próximo",
                last:       "Último"
            },
        }
    });
});

