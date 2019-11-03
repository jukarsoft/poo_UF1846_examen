<?php 
	//definición de la clase Vehículo
	class Vehiculo {
		private $marca;
		private $modelo;
		private $anyo;
		private $matricula;
		protected $consumo;
		
		//constructor
		public function __construct ($marca, $modelo, $anyo, $numeros, $letras, $consumo) {
			$this->setMarca($marca);
			$this->setModelo($modelo);
			$this->setAnyo($anyo);
			$this->setConsumo($consumo);
			$this->obtenerMatricula($numeros, $letras);
			$this->setMatricula($numeros, $letras);
		}

		//metodos getter
		public function getMarca() {
			return $this->marca;
		}

		public function getModelo() {
			return $this->modelo;
		}
		
		public function getAnyo() {
			return $this->anyo;
		}

		public function getMatricula() {
			return $this->matricula;
		}

		public function getConsumo() {
			return $this->consumo;
		}

		//definición setter
		public function setMarca($marca) {
			$this->marca = $marca;
		}

		public function setModelo($modelo) {
			$this->modelo = $modelo;
		}

		public function setAnyo($anyo) {
			$this->anyo = $anyo;
		}

		public function setMatricula($numeros, $letras) {
			$this->matricula = $this->obtenerMatricula($numeros, $letras);
		}

		public function setConsumo($consumo) {
			$this->consumo = $consumo;
		}

		public function obtenerMatricula($numeros, $letras) {
			$conn = new Matricula($numeros, $letras);
			return $conn->obtenerMatricula();

		}

	}

	//definición de la clase Coche
	class Coche extends Vehiculo {
		private $plazas;
		private $extras;
		private $autonomia;

		//constructor
		public function __construct ($marca, $modelo, $anyo, $numeros, $letras, $consumo, $plazas, $extras, $litros) {
			parent:: __construct ($marca, $modelo, $anyo, $numeros, $letras, $consumo);
			$this->setPlazas($plazas);
			$this->setExtras($extras);
			$this->setAutonomia($litros);
		}

		//metodos gettet
		public function getPlazas() {
			return $this->plazas;
		}

		public function getExtras() {
			return $this->extras;
		}

		public function getAutonomia() {
			return 'hola'.$this->autonomia;
		}	

		//definición setter
		public function setPlazas($plazas) {
			$this->plazas = $plazas;
		}

		public function setExtras($extras) {
			$this->extras = $this->extras.','.$extras;
		}

		public function setAutonomia($litros) {
			$this->automomia = ($litros * $this->consumo);
			echo $this->automomia;
		}

	}

	//definición de la clase Matricula	
	class Matricula {
		private $numeros;
		private $letras;
		

		public function __construct($numeros, $letras) {
			$this->setNumeros($numeros);
			$this->setLetras($letras);
		}	

		//metodos getter
		public function getNumeros() {
			return $this->numeros;
		}

		public function getLetras() {
			return $this->letras;
		}
		
		//metodos setter
		public function setNumeros($numeros) {
			$this->numeros = $numeros;
		}

		public function setLetras($letras) {
			$this->letras = $letras;
		}

		public function obtenerMatricula () {
			return $this->numeros.'-'.$this->letras; 
		}

	}


	//instanciar clases 
	echo "<< Vehículo >>";
	$vehiculo = new Vehiculo ('SEAT', '600', 1961, '0815', 'KDT', 6);
	echo "<br>";
	echo "Marca & Modelo & Año...:  ".$vehiculo->getMarca(). '  '.$vehiculo->getModelo().'  '.$vehiculo->getAnyo();
	echo "<br>";
	echo "Matricula...:  ".$vehiculo->obtenerMatricula('6764', 'CDF');
	echo "<br>";
	echo "Matricula...:  ".$vehiculo->getMatricula();
	echo "<br>";
	echo $vehiculo->setMarca('TOYOTA');
	echo $vehiculo->setModelo('RAV4');
	echo $vehiculo->setAnyo(2018);

	echo "Marca & Modelo & Año...:  ".$vehiculo->getMarca(). '  '.$vehiculo->getModelo().'  '.$vehiculo->getAnyo();
	echo "<br>";
	echo "Matrícula...:  ".$vehiculo->obtenerMatricula('0815', 'KDT');
	echo "<br>";
	echo "Matrícula...:  ".$vehiculo->getMatricula();
	echo "<br>";
	echo "<hr>";


	echo "<< Matricula >>";
	$matricula = new Matricula ('0815', 'KDT');
	echo "<br>";
	echo "Matricula (números & letras)...:  ".$matricula->getNumeros(). '  '.$matricula->getLetras();
	echo "<br>";
	$resultado = $matricula->obtenerMatricula();
	echo "Matricula...:  ".$resultado;
	echo "<hr>";


	echo "<< Coche >>";
	$coche = new Coche ('OPEL', 'ASTRA', 1998, '1234', 'BAB', 9, 5, 'e1', 70);
	echo "<br>";
	echo "Marca & Modelo & Año...:  ".$coche->getMarca(). ' - '.$coche->getModelo().' - '.$coche->getAnyo();
	echo "<br>";
	echo "Plazas & Extras...:  ".$coche->getPlazas(). ' - '.$coche->getExtras();
	echo "<br>";
	echo $coche->setExtras('e2');
	echo "Plazas & Extras...:  ".$coche->getPlazas(). ' -  '.$coche->getExtras();
	echo "<br>";
	$coche->setAutonomia(80);
	echo "Autonomia...:  ".$coche->getAutonomia();
	echo "<br>";
	echo $coche->setExtras('e3');
	echo "extras...:  ".$coche->getExtras();
	echo "<hr>";

 ?>