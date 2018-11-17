        </div>
        <script src="<?=base_url()?>assets/js/jquery/jquery-3.1.1.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery/jquery.validate.min.js"></script>        
        <script src="<?=base_url()?>assets/js/jquery/feather.min.js"></script>
        <script src="<?=base_url()?>assets/js/chartjs/chart.min.js"></script>
        <script>
            var myVar;

            function myFunction() {
                myVar = setTimeout(showPage, 100);
            }

            function showPage() {
                document.getElementById("loader").style.display = "none";
                document.getElementById("myDiv").style.display = "block";
            }
        </script>
        <script>
            $(document).ready(function(){
                $('.nav-item').on('mouseover',function(){
                    $(this).css('background-color','#615F5F');
                });
                $('.nav-item').on('mouseout',function(){
                    $(this).css('background-color','');
                });
                $('.logout_btn').on('click',function(){
                    swal('Are you sure do you want to log-out?', {
                        title: 'Confirmation',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    }).then((confirm) => {
                        if(confirm){
                            $.ajax({
                                type: 'POST',
                                url: '<?=base_url()?>adminprofile/logout',
                                data: {
                                    'accode': 'SampleData',
                                },
                                success: function(result){
                                    
                                }
                            });
                        }
                    });
                });
            });
        </script>
    </body>
</html>