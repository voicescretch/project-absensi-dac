@props(['monthly'])

<div
    class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 sm:px-6 sm:pt-6 dark:border-gray-800 dark:bg-white/[0.03]">

    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
            Rata-Rata Karyawan Hadir Bulanan
        </h3>
    </div>

    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <div id="avg_attendance_month" data-present='@json($monthly)'
            class="-ml-5 h-[280px] min-w-[690px] pl-2 xl:min-w-full">
        </div>
    </div>
</div>


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const el = document.querySelector('#avg_attendance_month');
    if (!el) return;

    const seriesData = JSON.parse(el.dataset.present);

    new ApexCharts(el, {
        chart: {
            type: 'bar',
            height: 280,
            toolbar: {
                show: false
            }
        },
        series: [{
            name: 'Hadir',
            data: seriesData
        }],
        plotOptions: {
            bar: {
                borderRadius: 6,
                columnWidth: '35%'
            }
        },
        dataLabels: {
            enabled: false
        },
        grid: {
            borderColor: '#E5E7EB',
            strokeDashArray: 4
        },
        xaxis: {
            categories: [
                'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
            ],
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            }
        },
        fill: {
            colors: ['#4F46E5']
        },
        tooltip: {
            y: {
                formatter: val => val + ' orang'
            }
        }
    }).render();
});
</script>
@endpush