if (typeof jQuery === "undefined") {
    throw new Error("jQuery plugins need to be before this file");
}
$(function() {
    "use strict";
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

     

     

     // Hr Resorce
    $(document).ready(function() {
        
        var options = {
            series: [{
                name: 'Ui/Ux Designer',
                data: [45, 25, 44, 23, 25, 41, 32, 25, 22, 65, 22, 29]
            }, {
                name: 'App Development',
                data: [45, 12, 25, 22, 19, 22, 29, 23, 23, 25, 41, 32]
            }, {
                name: 'Quality Assurance',
                data: [45, 25, 32, 25, 22, 65, 44, 23, 25, 41, 22, 29]
            }, {
                name: 'Web Developer',
                data: [32, 25, 22, 11, 22, 29, 16, 25, 9, 23, 25, 13]
            }],
            chart: {
                type: 'bar',
                height: 300,
                stacked: true,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: true
                }
            },
            colors: ['var(--chart-color1)','var(--chart-color2)','var(--chart-color3)','var(--chart-color4)'],
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0
                    }
                }
            }],
            xaxis: {
                categories: ['Jan','Feb','March','Apr','May','Jun','July','Aug','Sept','Oct','Nov','Dec'],
            },
            legend: {
                position: 'top', // top, bottom
                horizontalAlign: 'right', // left, right
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1
            }
        };

        var chart = new ApexCharts(document.querySelector("#hiringsources"), options);
        chart.render();
    });
});

