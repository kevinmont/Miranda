<?php
include_once "navbar.php";
?>
<br> <br><br>
<link href="form-validation.css" rel="stylesheet">
</head>

<div class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="resources/img/Logo.png" alt="" width="200" height="auto">
            <h2>Añadir un Producto Nuevo</h2>
        </div>
        <div class="row">
            <div class="col-md-8 order-md-2">
                <h4 class="mb-3">Registrate con tu dirección email</h4>
                <form class="needs-validation" novalidate>
                    <div class="row">

                        <div class="col-md-6 mb-6">
                            <label for="ID">Código</label>
                            <input type="text" class="form-control" id="ID" placeholder="" required>
                            <div class="invalid-feedback">
                                Se requiere un identificador.
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="Nombre">Nombre del Producto </label>
                            <input type="text" class="form-control" id="Nombre" value="" required>
                            <div class="invalid-feedback">
                                Este Campo es obligatorio.
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="Descripcion">Descripción</label>
                            <textarea class="form-control" aria-label="With textarea" required></textarea>
                            <div class="invalid-feedback">
                                Se requiere una descripción de un producto.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Estilo">Estilo</label>
                            <select class="custom-select d-block w-100" id="state" required>
                                <option selected>Patron...</option>
                                <option value="1">Veracruz de Ignacio de la Llave</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Estilo">Material</label>
                            <select class="custom-select d-block w-100" id="state" required>
                                <option selected>Material...</option>
                                <option value="1">Veracruz de Ignacio de la Llave</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Estilo">Estampado</label>
                            <select class="custom-select d-block w-100" id="state" required>
                                <option selected>Estampado...</option>
                                <option value="1">Veracruz de Ignacio de la Llave</option>
                            </select>
                        </div>
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg" required>
                        <label class="custom-file-label">Elegir Imagen de Producto...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Añadir</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once "footer.php";
?>