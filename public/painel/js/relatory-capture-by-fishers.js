var names = document.getElementById('names').value
names = JSON.parse(names)

var weights = document.getElementById('weights').value
weights = JSON.parse(weights)


const chart = new Highcharts.Chart({
    chart: {
        renderTo: 'capture-by-fishers',
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 27,
            beta: 1,
            depth: 100,
            viewDistance: 25
        }
    },
    title: {
        text: 'Relatório de Capturas por Armadores'
    },
    subtitle: {
        text: 'Sistema de Gestão de Armadores'
    },
    plotOptions: {
        column: {
            depth: 25,
            dataLabels: {
                enabled: true,
                format: '{point.y:.0f} ton'
            }
        }
    },
    xAxis: {
        categories: names,
        labels: {
            skew3d: true,
            style: {
                fontSize: '15px'
            }
        }
    },
    yAxis: {
        title: {
            text: null
        }
    },
    series: [{
        name: 'Pescado capturado',
        data: weights
    }]
});

function showValues() {
    document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
    document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
    document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
}
document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
    chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
    showValues();
    chart.redraw(false);
}));
