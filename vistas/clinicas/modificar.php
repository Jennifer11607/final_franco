<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Clinica.php';

try {
    if(isset($_GET['clinica_id']) && $_GET['clinica_id'] != ''){
        $clinica_id = $_GET['clinica_id'];
        $clinica = new Clinica(["clinica_id" => $clinica_id]);
        $clinicas = $clinica->buscar();
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar Clinica</h1>
        <div class="row justify-content-center">
            <form action="/final_franco/controladores/clinicas/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="clinica_id" value="<?= $clinicas[0]['CLINICA_ID'] ?>">
                <div class="row mb-3">
                    <div class="col">
                        <label for="clinica_nombre">Nombre de la Clinica</label>
                        <input type="text" name="clinica_nombre" id="clinica_nombre" value="<?= $clinicas[0]['CLINICA_NOMBRE'] ?>" class="form-control" required>
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
