<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>CRUD Personas</title>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">CRUD Personas</h1>
        <button class="btn btn-primary" onclick="mostrarFormulario()">Agregar Persona</button>
        <table class="table mt-3" id="tablaPersonas">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>DUI</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>

    <div class="modal" id="modalPersona">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitulo"></h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="cerrarFormulario()">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="formularioPersona">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="form-group">
                            <label for="dui">DUI:</label>
                            <input type="text" class="form-control" id="dui" name="dui" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="guardarPersona()">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarFormulario()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="read_all.php"></script>
</body>
</html>
