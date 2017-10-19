<?php

require_once "app/database/Connection.php";

class DeclaracaoRecord
{
    public static function getData()
    {
        try {

            $conn = Connection::open( "pg_ceres" );

            $objects = $conn->query('
            SELECT pr.nome,
            pr.plano,
            pr.titular,
            pr.paciente,
            pr.valor,
            pr.tipo
            FROM vw_irpf16 pr
            
            ');

            return $objects;

        } catch ( Exception $e ) {

            echo "ERROR" . $e->getMessage();

            return NULL;

        }
    }
}
