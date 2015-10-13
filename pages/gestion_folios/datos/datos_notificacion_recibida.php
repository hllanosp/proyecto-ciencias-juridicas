<?php


//Consulta para ver las notificaciones Recibidas
 $query = $db->prepare(" SELECT * FROM (SELECT notificaciones_folios.Id_Notificacion, notificaciones_folios.NroFolio,notificaciones_folios.Titulo,notificaciones_folios.FechaCreacion,usuario.id_Usuario as idUsuario,usuario.nombre AS nombre 
    FROM notificaciones_folios INNER JOIN usuario ON notificaciones_folios.IdEmisor=usuario.id_Usuario 
    WHERE Id_Notificacion in 
    (SELECT Id_Notificacion from usuario_notificado WHERE  IdUbicacionNotificacion='3' AND Estado='1' AND Id_Usuario IN 
        (SELECT id_Usuario from usuario where nombre =:usuario) )) P1
                        ORDER BY P1.FechaCreacion DESC");
     
     $query ->bindParam(":usuario",$user);
    $query->execute();
    $rows = $query->fetchAll();
        if($rows){
            //$number_of_rows = $rows->rowCount();
            $notificacion = 1;
        }else{
            
            $notificacion = 0;
        }
    $query = null;





?>