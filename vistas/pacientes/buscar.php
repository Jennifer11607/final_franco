<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); ?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Buscar Pacientes</h1>
        <div class="row justify-content-center">
            <form action="/final_franco/controladores/pacientes/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="paciente_nombre">Nombre del paciente</label>
                        <input type="text" name="paciente_nombre" id="paciente_nombre" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="paciente_dpi">No. de DPI</label>
                        <input type="text" name="paciente_dpi" id="paciente_dpi" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-info w-100">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>