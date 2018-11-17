<html>
<header>
    <title>iTech</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/custom.css">
    <script src="<?=base_url()?>assets/js/custom.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</header>
<body class="login">
   
    <div class="container">
        <form class="needs-validation" novalidate>
            <div class="form-row align-middle">
                <div class="col-md-4 mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                </div>
            </div>
            <button class="btn btn-dark" type="submit">Login</button>
        </form>
    </div>
</body>
</html>