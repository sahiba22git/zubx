<!-- Header -->

<?php $this->load->view('header');?>

<!-- / Header -->
        <div class="title">

            <?php $get_msg = $this->message->get_message() ?>

            <?php if(!empty($get_msg)):?>

                <?php echo $get_msg;?>

            <?php endif; ?>

            <h2>Your Courses</h2>

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
            <?php foreach($courses as $course):?>
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

           <!-- <div class="chart-row">
                <div class="row">
                    <div class="col-md-12">

                  <div class="important-dates">

                            <h3>

                                Important Dates

                            </h3>

                            <p>

                                Lorem ipsum dolor sit amet, consectetur

                            </p>

                            <div class="d-flex align-items-center mb-4">

                                <div class="me-5">

                                    <svg width="15" height="15" class="me-1" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">

                                        <rect x="0.322083" y="0.808594" width="13.6812" height="13.6812" rx="4" fill="#7A5DF8"/>

                                    </svg>

                                    <span><h6>Income</h6></span>

                                </div>

                                <div>

                                    <svg width="14" height="15" class="me-1" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">

                                        <rect x="0.131165" y="0.527344" width="13.6812" height="13.6812" rx="4" fill="#9494AE"/>

                                    </svg>                                            

                                    <span><h6>Expense</h6></span>

                                </div>

                            </div>

                            <canvas id="myLineChart"></canvas>

                        </div> 

                        <div class="important-dates">

                            <div class="row">

                                <div class="col-md-6">

                                    <h5>5 november 2022, 10 november 2022</h5>

                                    <div class="meeting-box">

                                         meeting lists 

                                        <div class="d-flex meeting-lists">

                                            <div class="flex-shrink-0">

                                                <div class="meeting-time">

                                                    8.30

                                                </div>

                                            </div>

                                            <div class="flex-grow-1">

                                                <h6>

                                                    Teams meetings include video and audio conferencing

                                                </h6>

                                                <p>5 November 2022</p>

                                            </div>

                                        </div>

                                        <div class="d-flex meeting-lists">

                                            <div class="flex-shrink-0">

                                                <div class="meeting-time">

                                                    8.30

                                                </div>

                                            </div>

                                            <div class="flex-grow-1">

                                                <h6>

                                                    Teams meetings include video and audio conferencing

                                                </h6>

                                                <p>5 November 2022</p>

                                            </div>

                                        </div>

                                        <div class="d-flex meeting-lists">

                                            <div class="flex-shrink-0">

                                                <div class="meeting-time">

                                                    8.30

                                                </div>

                                            </div>

                                            <div class="flex-grow-1">

                                                <h6>

                                                    Teams meetings include video and audio conferencing

                                                </h6>

                                                <p>5 November 2022</p>

                                            </div>

                                        </div>

                                        <div class="d-flex meeting-lists">

                                            <div class="flex-shrink-0">

                                                <div class="meeting-time">

                                                    8.30

                                                </div>

                                            </div>

                                            <div class="flex-grow-1">

                                                <h6>

                                                    Teams meetings include video and audio conferencing

                                                </h6>

                                                <p>5 November 2022</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="calendar-container"></div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="important-dates">

                            <h3>

                                Course Completion

                            </h3>

                            <p>

                                Lorem ipsum dolor sit amet, consectetur

                            </p>

                            <div class="row align-items-center pb-lg-4 pb-2">

                                <div class="col-md-6 p-lg-4 p-0">

                                    <canvas id="myDoughnutChart"></canvas>

                                </div>

                                <div class="col-md-6">

                                    <div class="course-completion-names">

                                        <div class="d-flex mb-lg-4 mb-2">

                                            <div class="flex-shrink-0">

                                                <div class="course-bar">

                                                    <svg width="30" height="4" viewBox="0 0 30 4" fill="none"

                                                        xmlns="http://www.w3.org/2000/svg">

                                                        <rect width="30" height="4" rx="2" fill="#7459D9" />

                                                    </svg>

                                                </div>

                                            </div>

                                            <div class="flex-shrink-1">

                                                <p>Course Name</p>

                                                <h6>3,124,213 users</h6>

                                            </div>

                                        </div>

                                        <div class="d-flex mb-lg-4 mb-2">

                                            <div class="flex-shrink-0">

                                                <div class="course-bar">

                                                    <svg width="30" height="4" viewBox="0 0 30 4" fill="none"

                                                        xmlns="http://www.w3.org/2000/svg">

                                                        <rect width="30" height="4" rx="2" fill="#7459D9"

                                                            fill-opacity="0.5" />

                                                    </svg>

                                                </div>

                                            </div>

                                            <div class="flex-shrink-1">

                                                <p>Course Name</p>

                                                <h6>1,523,151 users</h6>

                                            </div>

                                        </div>

                                        <div class="d-flex">

                                            <div class="flex-shrink-0">

                                                <div class="course-bar">

                                                    <svg width="30" height="4" viewBox="0 0 30 4" fill="none"

                                                        xmlns="http://www.w3.org/2000/svg">

                                                        <rect width="30" height="4" rx="2" fill="#2BC155" />

                                                    </svg>

                                                </div>

                                            </div>

                                            <div class="flex-shrink-1">

                                                <p>Course Name</p>

                                                <h6>948,213 users</h6>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="upcoming-projects">

                            <h3>

                                Upcoming Projects

                                <button type="button" class="three-dots-btn">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"

                                        xmlns="http://www.w3.org/2000/svg">

                                        <path

                                            d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"

                                            stroke="#575757" stroke-width="2" stroke-linecap="round"

                                            stroke-linejoin="round" />

                                        <path

                                            d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"

                                            stroke="#575757" stroke-width="2" stroke-linecap="round"

                                            stroke-linejoin="round" />

                                        <path

                                            d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"

                                            stroke="#575757" stroke-width="2" stroke-linecap="round"

                                            stroke-linejoin="round" />

                                    </svg>

                                </button>

                            </h3>

                            <p>Lorem ipsum dolor sit amet, consectetur</p>

                            <div class="download-circle">

                                <div id="cont">

                                    <svg id="svg" width="230" height="230" viewport="0 0 50 50" version="1.1"

                                        xmlns="http://www.w3.org/2000/svg">

                                        <circle r="100" cx="115" cy="115" fill="transparent" stroke-dasharray="628"

                                            stroke-dashoffset="0">

                                        </circle>

                                        <circle class="bar" r="100" cx="115" cy="115" fill="transparent"

                                            stroke-dashoffset="628"></circle>

                                    </svg>

                                    <div class="d-flex num">

                                        <span id="num">12.5</span>

                                        <span>%</span>

                                    </div>

                                    <span class="downloaded">Downloaded</span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="projects-completion">

                            <h3>

                                Project/ Assignment Completion

                                <button type="button" class="three-dots-btn">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"

                                        xmlns="http://www.w3.org/2000/svg">

                                        <path

                                            d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"

                                            stroke="#575757" stroke-width="2" stroke-linecap="round"

                                            stroke-linejoin="round" />

                                        <path

                                            d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"

                                            stroke="#575757" stroke-width="2" stroke-linecap="round"

                                            stroke-linejoin="round" />

                                        <path

                                            d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"

                                            stroke="#575757" stroke-width="2" stroke-linecap="round"

                                            stroke-linejoin="round" />

                                    </svg>

                                </button>

                            </h3>

                            <p>Lorem ipsum dolor sit amet, consectetur</p>

                            <div class="completion-circle">

                                <svg id="half_circle" viewBox="0 20 100 45">

                                    <path d="M30 50 A20 20, 0, 0 1, 70 50" fill="none" />

                                    <path id="arc" d="M30 50 A20 20, 0, 0 1, 70 50" fill="none" />

                                </svg>

                                <span id="zero">0</span>

                                <!-- <div class="d-flex key_ind_value">

                                    <span id="key_ind_value">30</span>

                                    <span>%</span>

                                </div> -->



                               

                                <!-- key indicator -->

                                <!--<div class="key_indicator">

                                    <svg id="key_indicator" width="99" height="51" viewBox="0 0 99 51" fill="none"

                                        xmlns="http://www.w3.org/2000/svg">

                                        <path

                                            d="M45.1531 26.9751L98.4253 11.0461L95.347 0.430631L42.0886 16.3551C39.3425 11.7236 34.9887 8.26963 29.8436 6.64093C24.6985 5.01222 19.1154 5.32063 14.1413 7.50832C9.16714 9.69601 5.14358 13.6127 2.82506 18.524C0.506531 23.4353 0.0522964 29.0039 1.54752 34.1856C3.04275 39.3672 6.38474 43.8061 10.9468 46.6699C15.5089 49.5336 20.9778 50.6255 26.3279 49.7408C31.6781 48.8561 36.542 46.0556 40.0078 41.8645C43.4735 37.6733 45.3029 32.3793 45.1531 26.9751ZM14.7082 35.3012C13.2471 33.6813 12.3042 31.6598 11.9989 29.4925C11.6936 27.3251 12.0395 25.1091 12.9929 23.1248C13.9464 21.1405 15.4645 19.477 17.3554 18.3446C19.2462 17.2122 21.4248 16.6618 23.6158 16.7631C25.8067 16.8643 27.9115 17.6125 29.664 18.9132C31.4165 20.2139 32.738 22.0086 33.4614 24.0704C34.1848 26.1321 34.2776 28.3684 33.7281 30.4963C33.1786 32.6242 32.0114 34.5481 30.3741 36.0249C28.1772 38.0021 25.294 39.0363 22.3571 38.9007C19.4202 38.765 16.6694 37.4705 14.7082 35.3012Z"

                                            fill="black" />

                                    </svg>

                                    <div class="d-flex key_ind_value">

                                        <span id="key_ind_value">80</span>

                                        <span>%</span>

                                    </div>

                                </div>-->
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