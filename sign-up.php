<?php
include_once "navbar.html";
?>
<br> <br><br>
<link href="form-validation.css" rel="stylesheet">
</head>

<div class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="resources/img/Logo.png" alt="" width="200" height="auto">
            <h2>Crea una cuenta</h2>
        </div>

        <div class="row">
            <div class="col-md-8 order-md-2">
                <h4 class="mb-3">Registrate con tu dirección email</h4>
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Nombre(s)</label>
                            <input type="text" class="form-control" id="firstName" value="" required>
                            <div class="invalid-feedback">
                                Se requiere un campo válido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Apellidos</label>
                            <input type="text" class="form-control" id="lastName" value="" required>
                            <div class="invalid-feedback">
                                Se requiere un campo válido.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" id="email" value="" required>
                            <div class="invalid-feedback">
                                Se requiere un campo válido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password">Contraseña</label>
                            <input type="text" class="form-control" id="password" value="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nCelular">Número de Celular</label>
                            <input pattern="[0-9]+" class="form-control" id="nCelular" value="" required>
                            <div class="invalid-feedback">
                                Por favor introduce un número válido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nTelefono">Número Telefónico <span class="text-muted">(Teléfono de
                                    Casa)</span></label>
                            <input pattern="[0-9]+" class="form-control" id="nTelefono" value="" required>
                            <div class="invalid-feedback">
                                Por favor introduce un número válido.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Dirección <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address" placeholder="Apartment or suite">
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="state">Estado</label>
                            <select class="custom-select d-block w-100" id="state" required>
                                <option value="0">Todo México</option>
                                <option value="1">Veracruz de Ignacio de la Llave</option>
                            </select>
                            <div class="invalid-feedback">
                                Verifica tu Estado.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="city">Ciudad/Localidad</label>
                            <select class="custom-select d-block w-100" id="city" required>
                                <option value="0">Ciudad...</option>
                                <option value="1">Acayucan</option>
                                <option value="2">Córdoba</option>
                                <option value="3">Atoyac</option>
                                <option value="4">Fortin</option>
                                <option value="5">Xalapa</option>
                                <option value="6">Orizaba</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor verifica tu Ciudad.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                El Código Postal es Requerido.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Estoy de acuerdo con la política de
                            datos</label>
                    </div>


                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Registrarme</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once "footer.html";
?>