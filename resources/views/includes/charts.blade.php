<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/variable-pie.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const karyawanRolePercentage = @json($karyawanRolePercentage);
        const projectStatusPercentage = @json($projectStatusPercentage);
        const chartProjectPercentage = Highcharts.chart('projectPercentage', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Project Percentage'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Progress (%)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}%</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Pemerintah',
                data: [50, 70, 90, 80, 60, 75, 85, 95, 100, 90, 80, 70]
            }, {
                name: 'Swasta',
                data: [70, 60, 85, 95, 80, 90, 75, 60, 70, 85, 90, 80]
            }, {
                name: 'Lainnya',
                data: [80, 90, 75, 70, 85, 60, 80, 90, 70, 95, 75, 85]
            }]
        });
        const chartEmployeePercentage = Highcharts.chart('employeePercentage', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Employee Percentage',
                align: 'center'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data: karyawanRolePercentage.map(employee => ({
                    name: employee.role,
                    y: employee.total,
                    selected: employee.role === 'Programmer',
                    sliced: employee.role === 'Programmer'
                }))
            }]
        });
        const chartProjectStatus = Highcharts.chart('projectStatus', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: true,
                type: 'pie'
            },
            title: {
                text: 'Project Status Percentage',
                align: 'center'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Progress',
                colorByPoint: true,
                data: projectStatusPercentage.map(data => ({
                    name: data.status,
                    y: data.total,
                    selected: data.status === 'SUCCESS',
                    sliced: data.status === 'SUCCESS'

                }))
            }],
            colors: projectStatusPercentage.map(data => getColorByStatus(data.status))
        });
    });

    function getColorByStatus(status){
        switch(status){
            case 'PENDING':
                return '#ff9900';
            case 'FINISHED':
                return '#47c363';
            case 'ON PROGRESS':
                return '#6777ef';
            case 'NOT STARTED':
                return '#191d21';
            case 'CANCELLED':
                return '#fc544b';
        }
    }
</script>
