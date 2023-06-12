<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);?>
<?php
require '../../modelos/Paciente.php';
try {
    if(isset($_GET['paciente_id']) && $_GET['paciente_id'] != ''){

        $paciente_id = $_GET['paciente_id'];
        $paciente = new Paciente(["paciente_id" => $paciente_id]);
        $pacientes = $paciente->buscar();
    }
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar Pacientes</h1>
        <div class="row justify-content-center">
            <form action="/final_franco/controladores/pacientes/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="paciente_id" value="<?= $pacientes[0]['PACIENTE_ID']?>">
                <div class="row mb-3">
                    <div class="col">
                        <label for="paciente_nombre">Nombre del Paciente</label>
                        <input type="text" name="paciente_nombre" id="paciente_nombre" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="paciente_dpi">No. de DPI</label>
                        <input type="text" name="paciente_dpi" id="paciente_dpi" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="paciente_telefono">No. de Telefono</label>
                        <input type="text" name="paciente_telefono" id="paciente_telefono" class="form-control" required>
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