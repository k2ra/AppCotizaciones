<?php

class NumCotizacion{

    public function __construct()
    {
       $this->db = new Conexion();
    }

    function nuevoNumeroCotizacion(){
        $stringcotiza="COT_";
        
        $result = $this->db->query("SELECT MAX(id_cotizacion) AS id FROM tbl_cotizaciones order by id_cotizacion desc");

        if ($this->db->rows($result) > 0) {
            // output data of each row
            while($row = $this->db->recorrer($result)) {
                $numcotiza=substr ($row["id"],-6) + 1;
                $num =substr("000000" . $numcotiza,-6);
                $stringcotiza .= $num;
                if (!$stringcotiza){
                    $stringcotiza="COT_";
                }
                $resp = $stringcotiza;
                
            }
        } 
        else {
            $resp = false;
        }
        $this->db->close();
        return $resp;

    }
}

	

?>