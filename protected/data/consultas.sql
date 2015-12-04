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

SELECT *
FROM solicitud
WHERE rut_funcionario IS NOT NULL
LIMIT 0 , 30

SELECT *
FROM  `solicitud`
WHERE rut_cliente IS NOT NULL
LIMIT 0 , 30

SELECT *
FROM  `solicitud`
WHERE rut_cliente IS NULL
AND rut_funcionario IS NULL
LIMIT 0 , 30
