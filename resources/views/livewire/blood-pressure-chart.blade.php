@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
@endassets

<div>
  <canvas id="bpChart"></canvas>
</div>

@script
<script>
const ctx = document.getElementById('bpChart').getContext('2d');
const bpdata = $wire.bloodPressureData;

const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: bpdata.map(item => item.date),
        datasets: [
            {
                label: 'Systolic',
                data: bpdata.map(item => item.systolic),
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: true,
                yAxisID: 'y',
            },
            {
                label: 'Diastolic',
                data: bpdata.map(item => item.diastolic),
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                fill: true,
                yAxisID: 'y1',
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Blood Pressure Chart',
            },
        },
        scales: {
            y: {
                type: 'linear',
                display: true,
                position: 'left',
            },
            y1: {
                type: 'linear',
                display: true,
                position: 'right',
            }
        }
    },
});
</script>
@endscript
