<html>

<head>
    <title><?=$title?></title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/custom.css">
    <script src="<?=base_url()?>assets/js/custom.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400i" rel="stylesheet">
    <script src="<?=base_url()?>assets/js/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light justify-content-between">
        <a class="navbar-brand" href="#"><img src=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#">
            <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarDropdown">
            <ul class="navbar-nav text-right">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url()?>">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Stores</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url()?>landing/login">Login</a>
                </li>
            </ul>
        </div>
    </nav>