@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
@endassets

<div class="">
  <canvas id="bpChart"></canvas>
  <flux:separator />
  {{-- <canvas id="ppChart"></canvas> --}}
</div>

@script
<script>
const bpctx = document.getElementById('bpChart').getContext('2d');
const bpdata = $wire.bloodPressureData;

const bpchart = new Chart(bpctx, {
    type: 'line',
    data: {
        labels: bpdata.map(item => item.date).reverse(),
        datasets: [
            {
                label: 'Systolic',
                data: bpdata.map(item => item.systolic).reverse(),
                tension: 0.1,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: false,
                yAxisID: 'y',
            },
            {
                label: 'Diastolic',
                data: bpdata.map(item => item.diastolic).reverse(),
                tension: 0.1,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                fill: false,
                yAxisID: 'y1',
            },
            {
                label: 'Pulse Pressure',
                data: bpdata.map(item => item.pulse_pressure).reverse(),
                borderColor: 'rgba(255, 255, 255, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                showLine: true,
                yAxisID: 'y1',
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
            },
            title: {
                display: true,
                text: 'Blood Pressure Chart',
            },
            tooltip: {
                callbacks: {
                    footer: ((ctx) => {
                        return bpdata[ctx[0].dataIndex].blood_pressure_status;
                    })
                }
            }
        },
        scales: {
            y: {
                type: 'linear',
                display: true,
                position: 'left',
                title: {
                    display: true,
                    text: 'Blood Pressure (mmHg)',
                    color: 'rgba(255, 99, 132, 0.7)',
                }
            },
            y1: {
                type: 'linear',
                display: true,
                position: 'right',
                title: {
                    display: true,
                    text: 'Diastolic Pressure (mmHg)',
                    color: 'rgba(54, 162, 235, 0.7)',
                }
            }
        }
    },
});
</script>
@endscript
