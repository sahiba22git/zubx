<!-- Header -->

<?php $this->load->view('header');?>

<!-- / Header -->
        <div class="title">
            <?php $get_msg = $this->message->get_message() ?>
            <?php if(!empty($get_msg)):?>
                <?php echo $get_msg;?>
            <?php endif; ?>
            <h2>Profile</h2>
            <div class="heading-bar">
                <span></span>
                <span></span>
            </div>
        </div>
                    <div class="our-courses">
                        <div class="courses-cards flex-wrap">
                            <div class="row w-100 mb-2">
                                <div class="col-md-2">Name</div>
                                <div class="col-md-10"><?php echo get_user_field('name');?></div>
                            </div>
                            <div class="row w-100 mb-2">
                                <div class="col-md-2">Email</div>
                                <div class="col-md-10"><?php echo get_user_field('email');?></div>
                            </div>
                            <div class="row w-100">
                                <div class="col-md-2">Phone</div>
                                <div class="col-md-10"><?php echo get_user_field('mobile');?></div>
                            </div>
                        </div>
                    </div>
        
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

<!-- Footer -->

<?php $this->load->view('footer');?>

<!-- / Footer -->