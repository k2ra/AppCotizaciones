<?php
class NumFactura{

    public function __construct()
    {
       $this->db = new Conexion();
    }

    public function nuevoNumeroFactura(){
        $stringFac="FAC_";
        $result = $this->db->query('SELECT MAX(id_factura) AS id FROM tbl_factura order by id_factura desc');

        if ($this->db->rows($result) > 0) {
            // output data of each row
            while($row =$this->db->recorrer($result)) {
                $numFactura=substr ($row["id"],-6) + 1;
                $num =substr("000000" . $numFactura,-6);
                //$stringcotiza=substr ($row["id"],0,6);
                $stringFac .= $num;
                if (!$stringFac){
                    $stringFac="FAC_";
                }
                $resp = $stringFac;
            }
        }
        else {
            $resp= false;
        }
        
        return $resp;
        $this->db->close();

    }
}
?>