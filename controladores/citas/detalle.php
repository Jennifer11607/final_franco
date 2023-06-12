<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Cita.php';
require '../../modelos/Detalle.php';
require '../../modelos/Medico.php';
require '../../modelos/Paciente.php';

try {
    $cita = new Cita($_GET);
    $detalle = new Detalle();
    $medico = new Medico();
    $citas = $cita->buscar();
    $detalles = $detalle->buscar();
    $medicos = $medico->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center table-dark">
                            <th colspan="6">DETALLE DE CITAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="6"><center>CITAS PARA EL DIA DE HOY (<?= date('d/m/Y' , strtotime( $citas[0]['CITA_FECHA'])) ?>)</center></th>
                        </tr>
                        <tr>
                            <td colspan="6">CLINICA DE <?= $medicos[0]['MEDICO_CLINICA'] ?> (<?= $citas[0]['CITA_MEDICO'] ?>) 
                        </td>
                        </tr>
                        <tr>
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>DPI</th>
                            <th>TELEFONO</th>
                            <th>HORA DE CITA</th>
                            <th>REFERIDO SI/NO</th>
                        </tr>
                        <?php if(count($productos) > 0):?>

                        <?php foreach($productos as $key => $producto) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $producto['PACIENTE_NOMBRE'] ?></td>
                            <td><?= $producto['PACIENTE_DPI'] ?></td>
                            <td><?= $producto['PACIENTE_TELEFONO'] ?></td>
                            <td><?= $producto['CITA_HORA'] ?></td>
                            <td><?= $producto['CITA_REFERENCIA'] ?></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="6"><center>SIN CITAS</center></td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>