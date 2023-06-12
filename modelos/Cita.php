<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'Conexion.php';

class Cita extends Conexion{
    public $cita_id;
    public $cita_paciente;
    public $cita_medico;
    public $cita_fecha;
    public $cita_hora;
    public $cita_referencia;
    public $cita_situacion;


    public function __construct($args = [] )
    {
        $this->cita_id = $args['cita_id'] ?? null;
        $this->cita_paciente = $args['cita_paciente'] ?? '';
        $this->cita_medico = $args['cita_medico'] ?? '';
        $this->cita_fecha = $args['cita_fecha'] ?? '';
        $this->cita_hora = $args['cita_hora'] ?? '';
        $this->cita_referencia= $args['cita_referencia'] ?? '';
        $this->cita_situacion = $args['cita_situacion'] ?? '';
    }

        public function setCitaFecha($fecha) {
            $sql = "SELECT * FROM citas where $this->cita_fecha = $fecha";
        }

    public function buscarPorFecha()
        {
            $sql = "SELECT * FROM citas WHERE DATE(cita_fecha) = '$this->cita_fecha' AND cita_situacion = 1";
            $resultado = self::servir($sql);
            return $resultado;
        }    
    public function guardar(){
        $sql = "INSERT INTO citas(cita_paciente, cita_medico, cita_fecha, cita_hora, cita_referencia) values('$this->cita_paciente','$this->cita_medico','$this->cita_fecha','$this->cita_hora','$this->cita_referencia')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from citas where cita_situacion = 1 ";

        if($this->cita_paciente != ''){
            $sql .= " and cita_paciente like '%$this->cita_paciente%' ";
        }

        if($this->cita_medico != ''){
            $sql .= " and cita_medico = $this->cita_medico ";
        }

        if($this->cita_id != null){
            $sql .= " and cita_id = $this->cita_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscar_todo(){
        $sql = "SELECT  * from citas
        inner join pacientes on cita_paciente= paciente_id
        inner join medicos on cita_medico = medico_id";

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE citas SET cita_paciente = '$this->cita_paciente', cita_medico = $this->cita_medico, cita_fecha = $this->cita_fecha, cita_hora = $this->cita_hora, cita_referencia = $this->cita_referencia where cita_id = $this->cita_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE citas SET cita_situacion = 0 where cita_id = $this->cita_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function busqueda(){
        

        $sql = " SELECT * FROM citas  inner join pacientes on paciente_id = cita_paciente 
        inner join medicos on medico_id = cita_medico inner join clinicas on clinica_id = medico_clinica ";


        $resultado = self::servir($sql);
        return $resultado;
    }
}