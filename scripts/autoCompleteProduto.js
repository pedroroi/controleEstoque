$(document).ready(function() {
    function setupAutocomplete(inputSelector, hiddenInputSelector, suggestionsContainerSelector, ajaxUrl, callback) {
        $(inputSelector).on('input', function() {
            var termo = $(this).val();
            if (termo.length >= 2) {
                $.ajax({
                    url: ajaxUrl,
                    method: 'GET',
                    data: { termo: termo },
                    success: function(data) {
                        var items = JSON.parse(data);
                        var suggestions = '';
                        items.forEach(function(item) {
                            suggestions += '<div class="autocomplete-suggestion" data-id="' + item.id + '" data-preco="' + item.preco + '">' + item.nome + '</div>';
                        });
                        $(suggestionsContainerSelector).html(suggestions).show();
                    }
                });
            } else {
                $(suggestionsContainerSelector).hide();
            }
        });

        $(document).on('click', suggestionsContainerSelector + ' .autocomplete-suggestion', function() {
            var nome = $(this).text();
            var id = $(this).data('id');
            var preco = $(this).data('preco');
            $(inputSelector).val(nome);
            $(hiddenInputSelector).val(id);
            $(suggestionsContainerSelector).hide();
            if (callback) {
                callback(preco);
            }
        });

        $(document).click(function(e) {
            if (!$(e.target).closest(inputSelector + ', ' + suggestionsContainerSelector).length) {
                $(suggestionsContainerSelector).hide();
            }
        });
    }

    // Configurar autocompletar para o campo de produto
    setupAutocomplete('#produto', '#id_produto', '#autocomplete-suggestions-produto', '/controleEstoque/App/Controllers/rota.php?acao=buscarProdutos', function(preco) {
        $('#valor_total').val(preco); // Define o valor total com o preço do produto selecionado
    });

    // Configurar autocompletar para o campo de cliente
    setupAutocomplete('#cliente', '#id_cliente', '#autocomplete-suggestions-cliente', '/controleEstoque/App/Controllers/rota.php?acao=buscarClientes');
});