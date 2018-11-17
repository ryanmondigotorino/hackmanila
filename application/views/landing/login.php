<html>
<header>
    <title>iTech</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/custom.css">
    <script src="<?=base_url()?>assets/js/custom.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400i" rel="stylesheet">
    <script src="<?=base_url()?>assets/js/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .profile_container{
			margin-top:6%;
			margin-bottom:2%;
        }
        .profile_content{
			margin-left:5%;
			margin-right:5%;
		}
    </style>
</header>
<body class="login">
    <div class="container">
        <div class="profile_container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card" style="width:100%;">
                        <div class="card-body">
                            <div class="profile_content">
                                <form class="needs-validation login_form" novalidate>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                    <button class="btn btn-dark" type="submit">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=base_url()?>assets/js/jquery/jquery-3.3.1.min.js" ></script>
    <script>
        $('.login_form').on('submit',function(event){
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>landing/loginsubmit',
                data: $(this).serialize(),
                success: function(result){
                    var getResult = JSON.parse(result);
                    if(getResult.type == 'success'){
                        console.log(result);
                    }else if(getResult.type == 'warning'){
                        console.log(result);
                    }else{
                        swal(getResult.message, {
                            icon: getResult.type,
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>