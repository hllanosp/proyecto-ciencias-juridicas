SELECT alerta.NroFolioGenera, alerta.FechaCreacion FROM alerta INNER JOIN usuario_alertado ON alerta.Id_Alerta = usuario_alertado.Id_Alerta INNER JOIN folios ON folios.NroFolio = alerta.NroFolioGenera INNER JOIN prioridad ON folios.Prioridad = prioridad.Id_Prioridad INNER JOIN seguimiento ON folios.NroFolio = seguimiento.NroFolio WHERE 