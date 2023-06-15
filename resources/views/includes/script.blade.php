<!-- General JS Scripts -->
<script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('assets/modules/popper.js') }}"></script>
<script src="{{ asset('assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
{{--<script src="{{ asset('assets/modules/moment.min.js') }}"></script>--}}
<script src="{{ asset('assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Page Specific JS File -->
<script>
    let karyawanTable = new DataTable('#karyawanTable')
    let departmentTable = new DataTable('#departmentTable')
    let projectTable = new DataTable('#projectTable')
    let laporanTable = new DataTable('#laporanTable')
    let klienTable = new DataTable('#klienTable')

    document.addEventListener('DOMContentLoaded', function() {
        const chart = Highcharts.chart('container', {
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
                name: 'BUMN',
                data: [50, 70, 90, 80, 60, 75, 85, 95, 100, 90, 80, 70]
            }, {
                name: 'Swasta',
                data: [70, 60, 85, 95, 80, 90, 75, 60, 70, 85, 90, 80]
            }, {
                name: 'Pemerintah',
                data: [80, 90, 75, 70, 85, 60, 80, 90, 70, 95, 75, 85]
            }]
        });

        const chart1 = Highcharts.chart('container1', {
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
                data: [{
                    name: 'Managers',
                    y: 25,
                }, {
                    name: 'Programmers',
                    y: 35,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Designers',
                    y: 15
                }, {
                    name: 'HRD',
                    y: 10
                }, {
                    name: 'Sales Representatives',
                    y: 10
                }, {
                    name: 'Other',
                    y: 5
                }]
            }]
        });

    });

</script>

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
    var toastMixin = Swal.mixin({
        toast: true,
        icon: 'success',
        title: 'General Title',
        animation: false,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
</script>

@if(session('success'))
    <script>
        toastMixin.fire({
            animation: true,
            title: '{{ session('success') }}'
        });
    </script>
@endif
