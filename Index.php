<?php
include_once("navbar.html");
?>
<!-- Inicio de Carrusel-->
    <br><br>
    <br>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="resources/img/carousel_one.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="resources/img/carousel_two.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="resources/img/carousel_three.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Fin de Carrusel-->

    <!-- Curerpo de la Página -->
    <br>
    <div class="container-fluid">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Bienvenido a Miranda</h1>
                <p class="lead">Deleita tus sentidos con nuestra variedad de sábanas, edredones, cojines, colchas, y
                    coordinados para tu hogar.</p>
            </div>
        </div>
    </div>

    <!-- Imagenes-->
    <div class="container-fluido">
        <div class="card-deck">
            <div class="card">
                    <a href="#"><img src="resources/img/cobertores.png" class="card-img-top" alt="..."></a>
            </div>
            <div class="card">
                    <a href="#"><img src="resources/img/edredonesycolchas.png" class="card-img-top" alt="..."></a>    
            </div>
            <div class="card">
                    <a href="#"><img src="resources/img/decoracion.png" class="card-img-top" alt="..."></a>
            </div>
        </div>
    </div>
<?php
include_once("footer.html");
?>