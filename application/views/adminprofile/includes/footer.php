        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>        
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
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
            });
        </script>
    </body>
</html>