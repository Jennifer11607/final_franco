<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../modelos/Especialidades.php';
require_once '../../modelos/Clinica.php';
    try {
        $especialidad = new Especialidad();
        $clinica = new Clinica();
        $especialidades = $especialidad->buscar();
        $clinicas = $clinica->buscar();

    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Formulario de ingreso de Medicos</h1>
        <div class="row justify-content-center">
            <form action="/final_franco/controladores/medicos/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                    <label for="medico_nombre">Nombre del Medico</label>
                        <input type="text" name="medico_nombre" id="medico_nombre" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="medico_espec">Especialidad</label>
                        <select name="medico_espec" id="medico_espec" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($especialidades as $key => $especialidad) : ?>
                                <option value="<?= $especialidad['ESPEC_ID'] ?>"><?= $especialidad['ESPEC_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="medico_clinica">Clinica</label>
                        <select name="medico_clinica" id="medico_clinica" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($clinicas as $key => $clinica) : ?>
                                <option value="<?= $clinica['CLINICA_ID'] ?>"><?= $clinica['CLINICA_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>