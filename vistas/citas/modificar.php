<?php
require '../../modelos/Cita.php';
require_once '../../modelos/Paciente.php';
require_once '../../modelos/Medico.php';
    try {
        $cita = new Cita($_GET);
        $paciente = new Paciente();
        $medico = new Medico();
        $pacientes = $paciente->buscar();
        $medicos = $medico->buscar();
        $citas = $cita->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar Cita</h1>
        <div class="row justify-content-center">
            <form action="/final_franco/controladores/citas/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="cita_id">
                <div class="row mb-3">
                    <div class="col">
                        <label for="cita_paciente">Nombre del Paciente</label>
                        <select name="cita_paciente" id="cita_paciente" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($pacientes as $key => $paciente) : ?>
                                <option value="<?= $paciente['PACIENTE_ID'] ?>"><?= $paciente['PACIENTE_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cita_medico">Medico</label>
                        <select name="cita_medico" id="cita_medico" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($medicos as $key => $medico) : ?>
                                <option value="<?= $medico['MEDICO_ID'] ?>"><?= $medico['MEDICO_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cita_fecha">Fecha de la Cita</label>
                        <input type="datetime-local" value="<?= date('Y-m-d\TH:i') ?>" name="cita_fecha" id="cita_fecha" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cita_hora">Horario</label>
                        <input type="time" value="<?= date('H:i') ?>" name="cita_hora" id="cita_hora" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cita_referencia">¿Tiene referencia? </label>
                        <select name="cita_referencia" id="cita_referencia" class="form-control">
                            <option value="si">si</option>
                            <option value="no">no</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-warning w-100">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>