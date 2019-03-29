<?php
include_once "Navbar.php";
?>
<script src="resources/js/product.js"></script>
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
            <select class="custom-select" id="Linea">
                <option value="0" selected>Elegir...</option>
                <option value="1">CLÁSICO</option>
                <option value="2">MODERNO</option>
                <option value="3">RÚSTICO</option>
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
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm" style="width: 16rem;">
                <img class="card-img-top" src="resources/img/01.jpg" style="height: 225px; width: auto; display: block;"
                    src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22508%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20508%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_169c022a8cf%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_169c022a8cf%22%3E%3Crect%20width%3D%22508%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22169.7578125%22%20y%3D%22123.6%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                    data-holder-rendered="true">
                <div class="card-body">
                    <p class="card-text">Cama Vendor</p>
                    <p class="text-primary">Precio: $300</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm" style="width: 16rem;">
                <img class="card-img-top" src="resources/img/01.jpg" style="height: 225px; width: auto; display: block;"
                    src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22508%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20508%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_169c022a8cf%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_169c022a8cf%22%3E%3Crect%20width%3D%22508%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22169.7578125%22%20y%3D%22123.6%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                    data-holder-rendered="true">
                <div class="card-body">
                    <p class="card-text">Cama Vendor</p>
                    <p class="text-danger">Sin Stock</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm" style="width: 16rem;">
                <img class="card-img-top" src="resources/img/01.jpg" style="height: 225px; width: auto; display: block;"
                    src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22508%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20508%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_169c022a8cf%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_169c022a8cf%22%3E%3Crect%20width%3D%22508%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22169.7578125%22%20y%3D%22123.6%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                    data-holder-rendered="true">
                <div class="card-body">
                    <p class="card-text">Cama Vendor</p>
                    <p class="text-success">Precio: $250 OFERTA!</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <?php
include_once "Footer.php";
?>