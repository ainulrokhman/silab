<div class="card shadow">
    <div class="card-header">
        <h2 class="m-0 font-weight-bold text-primary">Asal Pasien</h2>
    </div>
    <div class="card-body">
        <div class="chart-bar">
            <canvas id="myPieChart"></canvas>
        </div>
        <hr>
        Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
    </div>
</div>
<script src="<?= base_url(); ?>vendor/chart.js/Chart.min.js"></script>
<script>
    // Pie Chart Example
    var ctx = document.getElementById("myPieChart").getContext('2d');
    const randomColor = Math.floor(Math.random() * 16777215).toString(16);
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                <?php foreach ($d as $value) : ?>
                    <?= '"' . $value['data'] . '",'; ?>
                <?php endforeach; ?>
            ],
            datasets: [{
                label: 'kok',
                data: [
                    <?php foreach ($d as $value) : ?>
                        <?= '"' . $value['jml'] . '",'; ?>
                    <?php endforeach; ?>
                ],
                backgroundColor: [
                    <?php foreach ($d as $value) : ?>
                        <?= "colrand(),"; ?>
                    <?php endforeach; ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                displayColors: false,
            },
            legend: {
                position: "right",
            },
            legendCallback: function(chart) {
                console.log(chart.data);
                var text = [];
                text.push('<ul>');
                for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                    text.push('<li>');
                    text.push('<span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">' + chart.data.datasets[0].data[i] + '</span>');
                    if (chart.data.labels[i]) {
                        text.push(chart.data.labels[i]);
                    }
                    text.push('</li>');
                }
                text.push('</ul>');
                return text.join("");
            }
        },
    });

    function colrand() {
        const randomColor = Math.floor(Math.random() * 16777215).toString(16);
        return "#" + randomColor;
    }
</script>