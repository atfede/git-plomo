
$(document).ready(function () {/* off-canvas sidebar toggle */

    $('[data-toggle=offcanvas]').click(function () {
        $(this).toggleClass('visible-xs text-center');
        $(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
        $('.row-offcanvas').toggleClass('active');
        $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
        $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
        $('#btnShow').toggle();
    });

//    document.getElementsByName('radiob').onclick = function () {
////        var value = $('input[name=radioName]:checked', '#filtro').val();
//        var value = $('input[name=radioName]:checked', 'radiob').val();
//        alert(value);
////        $("radiob").change(function () {
////            alert($(this).val());
////        });
//    };

//    document.getElementsByName('radiob').onclick = function () {
//        $("radiob").change(function () {
//            alert($(this).val());
//        });
//    };


//    document.getElementsByName('rb').onclick = function () {
//    
//    document.getElementsByName('rb').onclick = function () {
//// get list of radio buttons with name 'size'
//        var sz = document.forms['filtro'].elements['size'];
//
//// loop through list
//        for (var i = 0, len = sz.length; i < len; i++) {
//            sz[i].onclick = function () { // assign onclick handler function to each
//                // put clicked radio button's value in total field
//                this.form.elements.total.value = this.value;
//            };
//        }
////    };
//    };


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
//        if ($('input:radio[name=radiob]:checked').val() !== "Lunes") {
////        alert($('input:radio[name=radiob]:checked').val());
//        }
    });





});