<?php
	require_once('../modeloAbstractoDB.php');
	class Departamento extends ModeloAbstractoDB {
		public $depa_codi;
		public $depa_nomb;
		public $pais_codi;
		
		function __construct() {
			//$this->db_name = '';
		}
		
		public function getDepa_codi(){
			return $this->depa_codi;
		}

		public function getDepa_nomb(){
			return $this->depa_nomb;
		}
		
		public function getPais_codi(){
			return $this->pais_codi;
		}

		public function consultar($depa_codi='') {
			if($depa_codi != ''):
				$this->query = "
				SELECT depa_codi, depa_nomb, pais_codi
				FROM tb_departamento
				WHERE depa_codi = '$depa_codi'
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
			SELECT depa_codi, depa_nomb, p.pais_nomb
			FROM tb_departamento as m inner join tb_pais as p
			ON (m.pais_codi = p.pais_codi) ORDER BY m.depa_nomb
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}
		public function listaDepartamento() {
			$this->query = "
			SELECT depa_codi, depa_nomb
			FROM tb_departamento as d order by depa_nomb
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('depa_codi', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$depa_nomb= utf8_decode($depa_nomb);
				$this->query = "
				INSERT INTO tb_departamento
				(depa_codi, depa_nomb, pais_codi)
				VALUES
				('$depa_codi', '$depa_nomb', '$pais_codi')
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
			UPDATE tb_departamento
			SET depa_nomb='$depa_nomb',
			pais_codi='$pais_codi'
			WHERE depa_codi = '$depa_codi'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($depa_codi='') {
			$this->query = "
			DELETE FROM tb_departamento
			WHERE depa_codi = '$depa_codi'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>