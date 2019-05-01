<?php
include_once "navbar.php";
?>
<script  src="resources/js/product.js"></script>
<p>
    <p><br><br>
        <script>
        function borrarfiltros() {
            var Linea = document.getElementById("Linea");
            var Material = document.getElementById("Material");
            Linea.value = "0";
            Material.value = "0";
        }

        </script>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Index.php">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
    </p>
</p>
<hr class="mb-3">
<section class="container">
    <div class="form-check form-check-inline">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">LINEA</label>
            </div>
            <select class="custom-select" id="linea">
                <option value="0" selected>Elegir...</option>
            </select>
        </div>
        &nbsp;
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">MATERIAL</label>
            </div>
            <select class="custom-select" id="Material">
                <option value="0" selected>Elegir...</option>
                <option value="1">LISO</option>
                <option value="2">BORDADO</option>
                <option value="3">TEXTURA</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-outline-success my-2 my-sm-0" onclick="borrarfiltros()">
        BORRAR FILTROS
    </button> &nbsp;
</section>

<div class="container">
    <div class="row">
        <template id="product-row">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm" style="width: 16rem;">
                    <img class="card-img-top" src="{{imagen}}" style="height: 225px; width: auto; display: block;"
                        data-holder-rendered="true">
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{id}}">
                        <p class="card-text" name="ads"> {{nombre}} </p>
                        <p class="text-primary">
                            <?php if(isset($_SESSION['user'])) echo  "{{precio}}"; else echo ""; ?> </p>
                        <p class="text-primary"> Material: {{material}} </p>
                        <p class="text-primary"> Estilo: {{estilo}} </p>
                        <p class="text-primary"> Color: {{color}} </p>
                        <p class="text-primary"> Descripcion: {{descripcion}} </p>
                        <p class="text-primary">
                            <?php if(isset($_SESSION['user'])) echo  "{{estampado}}"; else echo ""; ?> </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>

<?php
include_once "Footer.php";
?>