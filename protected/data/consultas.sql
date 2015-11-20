SELECT *
FROM  `arriendo`  `t`
WHERE  `t`.`activo_arriendo` =1
AND (inicio_arriendo < CURDATE( ) AND termino_arriendo > CURDATE( ))
AND fechapago_arriendo >= DATE_FORMAT( DATE_SUB( CURDATE( ) , INTERVAL 5 DAY ) ,  "%d" )
AND fechapago_arriendo <= DATE_FORMAT( DATE_ADD( CURDATE( ) , INTERVAL 5 DAY ) ,  "%d" )
AND id_arriendo NOT IN (
  SELECT id_arriendo
  FROM pago
  WHERE mes_pago = DATE_FORMAT( NOW( ) ,  "%m" )
)
