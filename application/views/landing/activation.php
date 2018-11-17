<html>
    <header>
        <title><?=$title?></title>
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
                    <div class="col-lg-12">
                        <div class="card" style="width:100%;">
                            <div class="card-body">
                                <div class="profile_content">
                                    <h1 class="h2" style="color:#000000;">Account Verification</h1><hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h1 style="color:#000000;">Your account was not yet activated!</h1>
                                            <p class="lead" style="color:#000000;">To Continue our sevice please click the button below to send an email notification.</p>
                                            <button class="btn btn-lg btn-secondary sendEmail" type="button">Send now! &raquo;</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?=base_url()?>assets/js/jquery/jquery-3.3.1.min.js" ></script>
        <script>
            $('.sendEmail').on('click',function(){
                $.ajax({
                    type: 'POST',
                    url: '<?=base_url()?>landing/sendactivation',
                    data: {
                       'accode': '<?=$this->uri->segment(3)?>'
                    },
                    beforeSend: function(){
                        $("button[type='button']").html('<i class="fa fa-spinner fa-pulse"></i> Processing..');
                    },
                   success: function(result){
                        var getResult = JSON.parse(result);
                        if(getResult.type == 'success'){
                            swal(getResult.message, {
                                icon: getResult.type,
                            }).then((confirm) => {
                                if(confirm){
                                    location.href = '<?=base_url()?>'
                                }
                            });
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