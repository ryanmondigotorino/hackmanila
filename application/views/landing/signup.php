<section class="account-wrapper">
<div class="d-flex justify-content-center align-items-center container ">
    <div class="row">
        <form class="signup">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="first-name">First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                    </div>
                    <div class="col-sm-3">
                        <label for="last-name">Last Name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                    </div>
                    <div class="col-sm-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="col-sm-3">
                        <label for="contact">Contact Number</label>
                        <input type="number" class="form-control" name="contact" placeholder="Contact Number">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="address">Address</label>
                        <textarea rows="3" class="form-control" name="address" placeholder="Address"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="col-sm-6">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password">
                    </div>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="Male">
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="Female">
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
            <br>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
</div>
</section>
<script src="<?=base_url()?>assets/js/jquery/jquery-3.3.1.min.js" ></script>
<script src="<?=base_url()?>assets/js/custom.js"></script>
<script>
    $('.signup').on('submit',function(event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>landing/signupsubmit',
            data: $(this).serialize(),
            success: function(result){
                var getResult = JSON.parse(result);
                if(getResult.type == 'success'){
                    swal(getResult.message, {
                        icon: getResult.type,
                    }).then((confirm) => {
                        if(confirm){
                            location.href = '<?=base_url()?>landing/activation/' + getResult.access_code;
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