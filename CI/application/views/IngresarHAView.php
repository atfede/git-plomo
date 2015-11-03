<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form id="filtro" action="IngresarHAController/ingresar" method="post">  
            <input type="text" class="form-control" placeholder="Inicio" name="inicio" id="inicio" <!--value="<?//php echo $inicio; ?>" -->>                                     
            <input type="text" class="form-control" placeholder="Fin" name="fin" id="fin" <!--value="<?//php echo $fin; ?>"-->>   
            <input type="text" class="form-control" placeholder="Dia" name="dia" id="dia" <!--value="<?//php echo $dia; ?>"-->>   
            <input type="submit" class="form-control" value="Ingresar">  
        </form>  
    </body>
</html>


