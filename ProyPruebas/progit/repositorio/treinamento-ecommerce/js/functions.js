$(document).ready(function($)
{
    var conteudo = $('#seccion'),
        url_anterior = '',
        extension = '.php',
        original = window.location;

    $('ul#lista a').each(function(){
        $(this).attr('href', $(this).data('hash'));
    });
    $('ul#lista a').on('click', function(e){
        var hash = $(this).attr('href');
        e.preventDefault();
        revisarURL(hash).done(function(){
            window.location.href = hash;
        }).fail(function(){
            window.location.href = '#error';
        }).always(function(datos){
            conteudo.php(datos);
        });
    });

    revisarURL().always(function(datos){
       conteudo.php(datos);
    });

    setInterval(function(){
        revisarURL().fail(function(){
            window.location.href = '#error';
        }).always(function(datos){
            conteudo.php(datos);
        });
    },250);

    function revisarURL (hash){
        var deferred = $.Deferred();
        if (!hash) {
            hash = window.location.hash;
        }
        if (!hash) {
            var url = window.location.pathname;
            var archivo = url.substring(url.lastIndexOf('/')+1);
            hash = archivo.replace(extension,'');
        }
        if (hash !== url_anterior){
            url_anterior = hash;
            cargarPagina(hash).done(
                function(data){
                    var php = $(data);
                    var filtrado = php.find('#seccion');
                    deferred.resolve(filtrado.php());
                }
            ).fail(function(){
                deferred.reject('<p>A página não existe.</p>');
            });
        }
        return deferred.promise();
    }
    function cargarPagina(hash){
        url = hash.replace('#','');
        return $.ajax({
            url: url + extension,
            async: true,
            dataType: "html"
        });
    }
});