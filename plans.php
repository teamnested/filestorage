<?php include('common/header.php') ?>

<div class="wrapper">
    <?php include('common/sidebar.php') ?>
    <?php include('common/navbar.php') ?>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="pricing-custom-tab w-100">
                    <div class="pricing-content">
                        <div class="row m-0">
                            <?php
                            foreach (getActivePlans() as $key => $plan) : ?>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card card-block card-stretch card-height blog pricing-details">
                                        <div class="card-body border text-center rounded">
                                            <div class="pricing-header">
                                                <div class="icon-data"><i class="ri-star-line"></i>
                                                </div>
                                                <h5 class="mb-4 display-5 font-weight-bolder">
                                                    NPR <?php echo $plan['price'] ?><small class="font-size-14 text-muted">/ <?php echo $plan['duration'] ?></small>
                                                </h5>
                                            </div>
                                            <h4 class="mb-3"><?php echo $plan['name'] ?></h4>
                                            <ul class="list-unstyled mb-0 pricing-list">
                                                <li><i class="lar la-check-circle text-primary mr-2 font-size-20"></i><?php echo $plan['storage_size'] / (1024) ?> MB</li>
                                                <?php if ($plan['price']) : ?>
                                                <?php endif; ?>
                                            </ul>
                                            <?php if ($plan['is_subscribed']) : ?>
                                                <a href="#" class="btn btn-secondary mt-5">Current Plan</a>
                                            <?php else : ?>
                                                <a href="#" id="khaltiPaymentBtn" class="btn btn-primary mt-5">Subscribe Now</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('common/footer.php') ?>