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

---------------------------------------------------------------------------------------------------------------
SELECT t. *
FROM arriendo t
LEFT JOIN propiedad p ON p.id_propiedad = t.id_propiedad

SELECT t.*, pa.*, p.*
FROM arriendo t
LEFT JOIN propiedad p ON p.id_propiedad = t.id_propiedad
LEFT JOIN pago pa ON pa.id_arriendo=t.id_arriendo
WHERE t.id_arriendo = pa.id_arriendo AND DATE_FORMAT( STR_TO_DATE( mes_pago,  "%d-%m-%Y" ) ,  "%m-%Y" ) =  DATE_FORMAT( NOW( ) ,  "%m-%Y" )

-------------------------------------------------------------------------------------------------------------------
SELECT DATE_FORMAT( NOW( ) ,  "%m-%Y" ) AS resultado,  DATE_FORMAT( STR_TO_DATE( mes_pago,  "%d-%m-%Y" ) ,  "%m-%Y" ) AS resultado2
FROM pago pa
WHERE DATE_FORMAT( STR_TO_DATE( mes_pago,  "%d-%m-%Y" ) ,  "%m-%Y" ) =  DATE_FORMAT( NOW( ) ,  "%m-%Y" )
-------------------------------------------------------------------------------------------------------------------------------------------------
SELECT DATE_FORMAT( STR_TO_DATE( mes_pago,  "%d-%m-%Y" ) ,  "%d-%m-%Y" ) ,  DATE_FORMAT( NOW( ) ,  "%d-%m-%Y" )
FROM pago
