<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form id="filtro" action="HorariosController" method="post">  
            <input type="text" class="form-control" placeholder="Usuario" name="usuario" id="usuario" value="<?php echo $usuario; ?>">                                     
            <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" value="<?php echo $nombre; ?>">   
            <input type="text" class="form-control" placeholder="Fecha" name="fecha" id="fecha" value="<?php echo $fecha; ?>">   
            <input type="submit" class="form-control" value="Buscar">
            <?php
            //echo $select;
            ?>
            
        </form>  
        <?php
        // put your code here
        ?>
    </body>
</html>