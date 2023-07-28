<!-- Header -->

<?php $this->load->view('header');?>

<!-- / Header -->
        <div class="title">

            <?php $get_msg = $this->message->get_message() ?>

            <?php if(!empty($get_msg)):?>

                <?php echo $get_msg;?>

            <?php endif; ?>

            <h2>My Courses</h2>

            <div class="heading-bar">

                <span></span>

                <span></span>

            </div>

            <p>

                English lessons Zubbox is a popular online education platform that offers courses from top education

                providers around the world.

            </p>

        </div>
        <div class="our-courses">
            <?php foreach($mycourses as $course):?>
                <div class="courses-cards">
                    <div class="left-img">
                        <img src="<?php echo base_url('assets/frontend/course/'.$course['image']);?>" alt="course-img">
                        <div class="course-tag">Featured</div>
                    </div>

                    <div class="body">
                        <a href="javascript:void(0);" class="course-category">Course Category</a>
                        <h5><?php echo $course['course_name'];?></h5>
                        <p><?php echo $course['description'];?></p>

                        <a href="<?php echo base_url('course-detail/'.$course['course_id']);?>" class="course-view-more-btn">
                            <span>View More</span>
                            <svg width="19" height="13" viewBox="0 0 19 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.7412 5.87887L13.0871 0.257242C12.7422 -0.0857474 12.1827 -0.0857474 11.8377 0.257242C11.4927 0.600302 11.4927 1.15642 11.8377 1.49948L15.9837 5.62161H0.88345C0.395573 5.62161 0 6.01491 0 6.49999C0 6.985 0.395573 7.37837 0.88345 7.37837H15.9837L11.8379 11.5005C11.4928 11.8436 11.4928 12.3997 11.8379 12.7427C12.0103 12.9141 12.2365 13 12.4626 13C12.6887 13 12.9148 12.9141 13.0873 12.7427L18.7412 7.12111C19.0863 6.77805 19.0863 6.22193 18.7412 5.87887Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
            <?php endforeach;?>
            <?php if (isset($links)) { ?>
                <div class="d-flex justify-content-end">
                    <?php echo $links ?>
                </div>
            <?php } ?>

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