</div>
<!-- footer -->
    <footer>
        Copyright ©2021. All Rights Reserved &nbsp;<a href="#">English lessons Zuubox.</a>
    </footer>
    <!-- footer end -->
    

    <!-- javascript -->
    <script src="<?php echo base_url('assets/frontend/js/jquery-3.6.0.min.js');?>"></script>
    <!-- bootstrap 5 -->
    <script src="<?php echo base_url('assets/frontend/js/bootstrap.bundle.min.js');?>"></script>
    <!-- Chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // line chart
        // const ctx = document.getElementById('myLineChart').getContext('2d');
        // chart linear gradient fill color
        // const linearGradient = ctx.createLinearGradient(0, 0, 0, 300);
        // linearGradient.addColorStop(0,'#7a5df866');
        // linearGradient.addColorStop(1,'#ffffff00');

        // const myLineChart = new Chart(ctx, {
        //     type: 'line',
        //     data: {
        //         labels: ['Jan','Feb','Mar','Apr','Jun','Jul','Aug'],
        //         datasets: [{
        //             label: 'Person',
        //             data: [6, 8,14,15,11,14,10],
        //             backgroundColor: linearGradient,
        //             tension: 0.4,
        //             borderColor: '#7A5DF8',
        //             borderWidth: 2,
        //             fill: true
        //         }]
        //     },
        //     options : {
        //         // remove top label
        //         plugins: {
        //             legend: {
        //                 display: false,
        //                 labels: {
        //                     usePointStyle: true,
        //                 }
        //             }
        //         },
        //         // remove grid line of x
        //         scales : {
        //             x:{
        //                 grid: {
        //                     display : false,
        //                     borderColor: 'rgba(0,0,0,0.03)',
        //                 }
        //             },
        //             y:{
        //                 grid:{
        //                     borderColor: '#fff',
        //                     color: 'rgba(0,0,0,0.03)'
        //                 }
        //             }
        //         }
        //     }
        // });

        // doughnut chart
        const ctx1 = document.getElementById('myDoughnutChart').getContext('2d');
        const myDoughnutChart = new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: '',
                datasets: [{
                    label: 'Course Name',
                    data: [3124213, 948213, 1523151],
                    backgroundColor: [
                        '#7A5DF8',
                        '#2BC155',
                        '#9494AE'
                    ],
                    borderWidth: 5,
                    hoverBorderColor: "#fff",
                    hoverOffset: 10,
                    borderColor: '#fff',
                }],
            },
        });
    </script>
    <!-- calender js -->
    <script src="<?php echo base_url('assets/frontend/js/calendar.js');?>"></script>
    <script>
        let date = $(".important-dates h5").text();
        let split_date = date.split(",");
        let date_first = split_date[0];
        // let date_second = split_date[1];
        // console.log(date_first);
        $(function () {
            $('.calendar-container').calendar({
                date: new Date(date_first),
                startOnMonday: true,
                prevButton: '<svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.4986 0.206289L0.203303 7.50158L7.4986 14.7969" fill="#7A5DF8"/></svg>',
                nextButton: '<svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.14917 14.7976L7.44446 7.50232L0.14917 0.207031" fill="#7A5DF8"/></svg>',

            });
        });
    </script>
    <!-- main -->
    <script src="<?php echo base_url('assets/frontend/js/main.js');?>"></script>
    <script>
        // download circle bar
        const circleDashoffset = 628;
        let num = document.querySelector(".download-circle #num");
        let r = ((num.innerHTML / 100) * circleDashoffset);
        let cr = r + circleDashoffset;
        document.querySelector(".download-circle #cont .bar").style.strokeDasharray = cr;


        // completion-circle arc
        const completion_circle_arc_dasharray = 63;
        let num_percent = document.querySelector(".completion-circle #key_ind_value");
        let r2 = ((num_percent.innerHTML / 100) * completion_circle_arc_dasharray);
        let cr2 = -r2 - completion_circle_arc_dasharray;
        let degree_value = -172;
        let value = degree_value + (num_percent.innerHTML * 2);
        document.querySelector(".completion-circle #half_circle #arc").style.strokeDashoffset = cr2;
        document.querySelector(".completion-circle .key_indicator").style.transform = `rotate(${value}deg) translate(-50%,-50%)`;
        // if(num_percent.innerHTML < 50){
        //     let top2 = 0;
        //     let left = 0;
        //     let values1 = (Number (num_percent.innerHTML)) + 100;
        //     let values2 = num_percent.innerHTML * 3;
        //     document.querySelector(".key_ind_value").style.top = `${top2}px`;
        //     document.querySelector(".key_ind_value").style.left = `${left}%`;
        //     document.querySelector(".key_ind_value").style.transform = `translate(${values1}px,${values2}px)`;
        // }
        // let top2 = (Number(num_percent.innerHTML) + 20);
        // let left = num_percent.innerHTML;

        // document.querySelector(".key_ind_value").style.left = `${left}%`;
        // document.querySelector(".key_ind_value").style.top = `${top2}px`;

    </script>
</body>

</html>