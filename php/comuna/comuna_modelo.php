<?php
    require_once("../modeloAbstractoDB.php");
    class Comuna extends ModeloAbstractoDB {
		private $comu_codi;
		private $comu_nomb;
		private $muni_codi;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getComu_codi(){
			return $this->comu_codi;
		}

		public function getComu_nomb(){
			return $this->comu_nomb;
		}
		
		public function getMuni_codi(){
			return $this->muni_codi;
		}

		public function consultar($comu_codi='') {
			if($comu_codi !=''):
				$this->query = "
				SELECT comu_codi, comu_nomb, muni_codi
				FROM tb_comuna
				WHERE comu_codi = '$comu_codi' order by comu_codi
				";
				$this->obtener_resultados_query();
			endif;
			//busca una comuna del cod y si la encuentra arma un objeto 
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
			//pasa los atributos del objeto a los campos y su valor
		}
		
		public function lista() {
			$this->query = "
			SELECT comu_codi, comu_nomb, m.muni_nomb
			FROM tb_comuna as c inner join tb_municipio as m
			ON (c.muni_codi = m.muni_codi) order by comu_codi
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			//se retorna todos los registros que se hallan listado

		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('comu_codi', $datos))://llave primaria
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;//campo=comu_nomb valor=comuna1
				endforeach;
				$comu_nomb= utf8_decode($comu_nomb);
				$this->query = "
					INSERT INTO tb_comuna
					(comu_codi, comu_nomb, muni_codi)
					VALUES
					(NULL, '$comu_nomb', '$muni_codi')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
			//inserta nuevo registro
		}
		
		public function editar($datos=array()) {
			//mmodifica los datos
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			//los recibe un areglo
			$comu_nomb= utf8_decode($comu_nomb);
			//update modificacion 
			$this->query = "
			UPDATE tb_comuna
			SET comu_nomb='$comu_nomb',
			muni_codi='$muni_codi'
			WHERE comu_codi = '$comu_codi'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($comu_codi='') {
			$this->query = "
			DELETE FROM tb_comuna
			WHERE comu_codi = '$comu_codi'";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>