<section class="banner-signup">
<div class="container">
    <div class="row">
        <div class="col-md-6 product">
            <p class="product-title">
                SHOP
            </p>
            <p class="product-content">
                Your one click application to buy anything you want!
            </p>
        </div>

    </div>
</div>
</section>
<section class="product-wrap">
<div class="container">
    <p class="dark-text">
        EXCLUSIVE FOR YOU
    </p>
    <div class="row">
        <div class="col-sm-4 product-wrapper-small">
            <img class="product-img" src="<?=base_url()?>/assets/images/cases.png" alt="">
            <p class="product-details">
                Lorem Ipsum
            </p>
            <div class="middle">
                <div class="product-details">
                    <button class="btn btn-dark" data-toggle="modal" data-target=".modal-1">SHOP NOW</button>
                    <!-- add a unique per button *loop -->
                </div>
            </div>
            <!-- MODAL -->
            <div class="modal fade modal-1" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                    </div>
                </div>
            </div>
            <!-- END OF MODAL -->
        </div>
        <div class="col-sm-4 product-wrapper-small">
            <img class="product-img" src="<?=base_url()?>/assets/images/cases.png" alt="">
            <p class="product-details">
                Lorem Ipsum
            </p>
            <div class="middle">
                <div class="product-details">
                    <button class="btn btn-dark" data-toggle="modal" data-target=".modal-2">SHOP NOW</button>
                    <!-- add a unique per button *loop -->
                </div>
            </div>
            <!-- MODAL -->
            <div class="modal fade modal-2" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                    </div>
                </div>
            </div>
            <!-- END OF MODAL -->
        </div>
        <div class="col-sm-4 product-wrapper-small">
            <img class="product-img" src="<?=base_url()?>/assets/images/cases.png" alt="">
            <p class="product-details">
                Lorem Ipsum
            </p>
            <div class="middle">
                <div class="product-details">
                    <button class="btn btn-dark" data-toggle="modal" data-target=".modal-3">SHOP NOW</button>
                    <!-- add a unique per button *loop -->
                </div>
            </div>
            <!-- MODAL -->
            <div class="modal fade modal-3" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 expanded">
                                    <div class="container">
                                        <img id="expandedImg" src="<?=base_url()?>/assets/images/ear-buds-png-6.png" style="width:100%">
                                        <div id="imgtext"></div>
                                    </div>
                                    <!-- The four columns -->
                                    <div class="row">
                                        <div class="column">
                                            <img src="<?=base_url()?>/assets/images/earphones-1.png" style="width:100%" onclick="productImg(this);">
                                        </div>
                                        <div class="column">
                                            <img src="<?=base_url()?>/assets/images/earphones-2.jpg" style="width:100%" onclick="productImg(this);">
                                        </div>
                                        <div class="column">
                                            <img src="<?=base_url()?>/assets/images/ear-buds-png-6.png" style="width:100%" onclick="productImg(this);">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 expanded-content">
                                    <p class="prod-title">Earphones</p>
                                    <p class="prod-details">QC20 noise cancelling headphones – Samsung/Android™ devices</p>
                                    <p class="price">P179.00</p>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        </span>
                                        <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                                        <span class="input-group-btn">
                                             <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                        <i class="fa fa-plus"></i>
                                        </button>
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="row buttons">
                                <div class="col-md-3">
                                    <a href=""><button class="btn btn-primary">Buy Now</button></a>
                                </div>
                                <div class="col-md-3">
                                     <a href=""><button class="btn btn-warning">Add to Chart</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF MODAL -->
        </div>
    </div>
</div>

</section>

<section class="new_arrivals">
<div class="container">
    <div class="row">
        <div class="col-sm-12 new-arr-title">
            <p class="bold">GET 10% DISCOUNT
                <br>WHEN YOU BUY</p>
            <p class="product-content">Check out now our items!</p>
        </div>
    </div>
</div>
</section>