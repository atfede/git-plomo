
$(document).ready(function () {/* off-canvas sidebar toggle */

    $('[data-toggle=offcanvas]').click(function () {
        $(this).toggleClass('visible-xs text-center');
        $(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
        $('.row-offcanvas').toggleClass('active');
        $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
        $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
        $('#btnShow').toggle();
    });


    $("#filtro input[name='radiob']").click(function () {
        if ($('#dv_horarios:visible').length === 0)
        {
            $("#dv_horarios").show();
        }
        switch ($('input:radio[name=radiob]:checked').val()) {
            case "Lunes":
                $("#day").text('Lunes');
                break;
            case "Martes":
                $("#day").text('Martes');
                break;
            case "Miercoles":
                $("#day").text('Miércoles');
                break;
            case "Jueves":
                $("#day").text('Jueves');
                break;
            case "Viernes":
                $("#day").text('Viernes');
                break;
            case "Sabado":
                $("#day").text('Sábado');
                break;
            case "Domingo":
                $("#day").text('Domingo');
                break;
        }
    });
    
});