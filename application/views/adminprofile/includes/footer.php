        </div>
        <script>
            $(".datatableforadmin").DataTable({
                responsive: true,
                autoWidth: false,
                order: [[0, "asc"]],
                oLanguage: {
                    oPaginate: {
                        sNext: '<span class="pagination-fa"><i class="fa fa-chevron-right" ></i></span>',
                        sPrevious: '<span class="pagination-fa"><i class="fa fa-chevron-left" ></i></span>'
                    },
                    sSearch: '<i class="fa fa-search fa-fw"></i>',
                }
            });
        </script>
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
                                    'accode': '<?=$accode?>',
                                },
                                success: function(result){
                                    if(result == 'Error'){
                                        swal('Something went wrong please try again!', {
                                            icon: 'error',
                                        });
                                    }else{
                                        location.href = '<?=base_url()?>';
                                    }
                                }
                            });
                        }
                    });
                });
            });
        </script>
    </body>
</html>