<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
    <?php
        session_start();

        if(isset($_SESSION['usuGR'])){
            $usuario = $_SESSION['usuGR'];
            echo "<a class='navbar-brand text-white' href='./menu.php'>".$usuario."</a>";
        }
    ?>
            
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav ml-auto">

            <li class="nav-item active">
                <a class="nav-link text-white" href="./level_request.php" target="_blank">Level Request</a>
            </li>
            <li>
                <a class="nav-link btn btn-danger text-white float-right" href="../service/cerrar_sesion.php">Cerrar Sesion</a>
            </li>
        </ul>
    </div>
</nav>
<hr>