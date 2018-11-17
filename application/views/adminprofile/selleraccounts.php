<div style="display:none;" id="myDiv" class="animate-bottom">
    <div class="profile_container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
                <div class="card" style="width:100%;">
                    <div class="card-body">
                        <div class="profile_content">
                            <?php $this->load->view('landing/includes/messages') ?><!--Alert-->
                            <h1 class="h2"><span class="fa fa-table"></span> Sellers Accounts</h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table width="100%" class="table table-striped table-bordered table-hover datatableforadmin" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Status</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Date registered</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cntr = 0;
                                            foreach($allselleraccounts as $aa):
                                                $link = "";
                                                $stats = "";
                                                $color = "";
                                                if ($aa->account_status == 0) {
                                                    $link = "activate('$aa->access_code')";
                                                    $stats = "ACTIVATE";
                                                    $color = "btn btn-success";
                                                } else {
                                                    $link = "deactivate('$aa->access_code')";
                                                    $stats = "DEACTIVATE";
                                                    $color = "btn btn-danger";
                                                }
                                                $cntr += 1;
                                                $linestatus = '';
                                                if($aa->account_line == 0){
                                                    $linestatus = '<img src="'.base_url().'uploads/offline.png'.'" style=" border-radius: 50%; width: 20px;height: 20px;"> offline';
                                                }else{
                                                    $linestatus = '<img src="'.base_url().'uploads/online.png'.'" style=" border-radius: 50%; width: 20px;height: 20px;"> online';
                                                }
                                            ?>
                                                <tr>
                                                    <td class="cntr"><?=$cntr?></td>
                                                    <td class="cntr"><?=$linestatus?></td>
                                                    <td class="cntr"><img src="<?= base_url() . 'uploads/' . $aa->image ?>" style=" border-radius: 50%; width: 40px;height: 40px;"></td>
                                                    <td class="cntr"><?= $aa->firstname . ' ' . $aa->lastname ?></td>
                                                    <td class="cntr"><?= $aa->email ?></td>
                                                    <td class="cntr"><?= date("M j Y", $aa->date_registered); ?></td>
                                                    <td class="cntr"><button type="button" onclick="<?=$link?>" class="<?=$color?>"><?=$stats?></button></td>
                                                </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function activate(access_code){
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>adminprofile/activate/' + access_code,
            data: {
                'accode': access_code,
                'status': 'sellers_tbl'
            },
            success: function(result){
                var getResult = JSON.parse(result);
                if(getResult.type == 'success'){
                    swal(getResult.message, {
                        icon: getResult.type,
                    }).then((confirm) => {
                        if(confirm){
                            location.href = '<?=base_url()?>adminprofile/selleraccounts';
                        }
                    });
                }else{
                    swal(getResult.message, {
                        icon: getResult.type,
                    });
                }
            }
        });
    }
    function deactivate(access_code){
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>adminprofile/deactivate/' + access_code,
            data: {
                'accode': access_code,
                'status': 'sellers_tbl'
            },
            success: function(result){
                var getResult = JSON.parse(result);
                if(getResult.type == 'success'){
                    swal(getResult.message, {
                        icon: getResult.type,
                    }).then((confirm) => {
                        if(confirm){
                            location.href = '<?=base_url()?>adminprofile/selleraccounts';
                        }
                    });
                }else{
                    swal(getResult.message, {
                        icon: getResult.type,
                    });
                }
            }
        });
    }
</script>