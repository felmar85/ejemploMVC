<?php
require_once('../modeloAbstractoDB.php');
class Pais extends ModeloAbstractoDB{
    public  $pais_codi;
    public  $pais_nomb;
    public  $pais_capi;
    

    function __construct(){
    }
    

    /**
     * Get the value of pais_codi
     */ 
    public function getPais_codi(){
        return $this->pais_codi;
    }

    /**
     * Set the value of pais_codi
     *
     * @return  self
     */ 
    public function setPais_codi($pais_codi){
        $this->pais_codi = $pais_codi;

        return $this;
    }

    /**
     * Set the value of pais_nomb
     *
     * @return  self
     */ 
    public function setPais_nomb($pais_nomb){
        $this->pais_nomb = $pais_nomb;

        return $this;
    }

    /**
     * Get the value of pais_nomb
     */ 
    public function getPais_nomb(){
        return $this->pais_nomb;
    }
      /**
     * Set the value of pais_capi
     *
     * @return  self
     */ 
    public function setPais_capi($pais_capi){
        $this->pais_capi = $pais_capi;

        return $this;
    }

    /**
     * Get the value of pais_capi
     */ 
    public function getPais_capi(){
        return $this->pais_capi;
    }
    public function consultar($pais_codi='') {
        if($pais_codi != ''):
            $this->query = "
            SELECT pais_codi, pais_nomb, pais_capi
            FROM tb_pais
            WHERE pais_codi = '$pais_codi'
            ";
            $this->obtener_resultados_query();
        endif;
        if(count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad=>$valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
    }
    public function lista() {
        $this->query = "
        SELECT pais_codi, pais_nomb FROM tb_pais order by pais_nomb
        ";
        $this->obtener_resultados_query();
        return $this->rows;
    }
    public function listaPaises() {
        $this->query = "
        SELECT pais_codi, pais_nomb
        FROM tb_pais as d order by pais_nomb
        ";
        $this->obtener_resultados_query();
        return $this->rows;
    } 
    public function nuevo($datos=array()) {
        if(array_key_exists('pais_codi', $datos)):
            foreach ($datos as $campo=>$valor):
                $$campo = $valor;
            endforeach;
            $this->query = "
            INSERT INTO tb_pais
            (pais_codi, pais_nomb, pais_capi)
            VALUES
            ('$pais_codi', '$pais_nomb', '$pais_capi')
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        endif;
    }
    
    public function editar($datos=array()) {
        foreach ($datos as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        UPDATE tb_pais
        SET pais_nomb='$pais_nomb',
        pais_capi='$pais_capi'
        WHERE pais_codi = '$pais_codi'
        ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }
    
    public function borrar($pais_codi='') {
        $this->query = "
        DELETE FROM tb_pais
        WHERE pais_codi = '$pais_codi'
        ";
        $resultado = $this->ejecutar_query_simple();

        return $resultado;
    }
    
  
}