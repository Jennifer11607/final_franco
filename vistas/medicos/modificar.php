<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Medico.php';
require '../../modelos/Especialidades.php';
require '../../modelos/Clinica.php';

try {
    if (isset($_GET['medico_id']) && $_GET['medico_id'] != '') {
        $medico = new Medico(['medico_id' => $_GET['medico_id']]);
        $medicos = $medico->buscar();

        $especialidad = new Especialidad();
        $clinica = new Clinica();
        $especialidades = $especialidad->buscar();
        $clinicas = $clinica->buscar();
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>
<?php include_once '../../includes/header.php' ?>
    <div class="container">
        <h1 class="text-center">Modificar Médicos</h1>
        <div class="row justify-content-center">
            <form action="/final_franco/controladores/medicos/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="medico_id" value="<?= $medicos[0]['MEDICO_ID'] ?>">
                <div class="row mb-3">
                    <div class="col">
                        <label for="medico_nombre">Nombre del Medico</label>
                        <input type="text" name="medico_nombre" id="medico_nombre" value="<?= $medicos[0]['MEDICO_NOMBRE'] ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="medico_espec">Especialidad</label>
                        <select name="medico_espec" id="medico_espec" class="form-control" required>
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($especialidades as $especialidad) : ?>
                                <option value="<?= $especialidad['ESPEC_ID'] ?>" <?= $medicos[0]['MEDICO_ESPEC'] == $especialidad['ESPEC_ID'] ? 'selected' : '' ?>><?= $especialidad['ESPEC_NOMBRE'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="medico_clinica">Clinica</label>
                        <select name="medico_clinica" id="medico_clinica" class="form-control" required>
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($clinicas as $clinica) : ?>
                                <option value="<?= $clinica['CLINICA_ID'] ?>" <?= $medicos[0]['MEDICO_CLINICA'] == $clinica['CLINICA_ID'] ? 'selected' : '' ?>><?= $clinica['CLINICA_NOMBRE'] ?></option>
                            <?php endforeach ?>
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
<?php include_once '../../includes/footer.php' ?>
