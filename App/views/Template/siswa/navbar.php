<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
<div class="container">
    <a href="#" class="navbar-brand">
    <img src="<?=BASEURL?>img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
    <span class="brand-text font-weight-light">Elenka</span>
    </a>
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=BASEURL?>" class="nav-link">Home</a>
        </li>
    </ul>

    <div class="navbar-nav ml-auto">
        <span class=" text-gray-dark">             
            <?= isset($_SESSION['elenka_usersession']) ? $_SESSION['elenka_username']  : "" ;?> 
        </span>
    </div>
</div>
</nav>
<!-- /.navbar -->