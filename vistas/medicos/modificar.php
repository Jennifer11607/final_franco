<?php
require '../../modelos/Medico.php';
    try {
        $medico = new Medico($_GET);

        $medicos = $medico->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
