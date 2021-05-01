var crustaceo = document.getElementById('crustaceo').value
crustaceo = JSON.parse(crustaceo)

var molusco = document.getElementById('molusco').value
molusco = JSON.parse(molusco)

var demersal = document.getElementById('demersal').value
demersal = JSON.parse(demersal)

var pelagico = document.getElementById('pelagico').value
pelagico = JSON.parse(pelagico)

var data = document.getElementById('data').value
data = JSON.parse(data)
console.log(crustaceo)

crustaceo = Object.keys(crustaceo).map((key) => [key, crustaceo[key]]);
molusco = Object.keys(molusco).map((key) => [key, molusco[key]]);
pelagico = Object.keys(pelagico).map((key) => [key, pelagico[key]]);
demersal = Object.keys(demersal).map((key) => [key, demersal[key]]);

Highcharts.chart('capture-by-species', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 60,
            beta: 5,
            depth: 50,
            viewDistance: 100
        }
    },
    title: {
        text: 'Relatório de Captura por Espécie'
    },
    subtitle: {
        text: 'Sistema de Gestão de Armadores'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    tooltip: {
        pointFormat: '{point.percentage:.0f}%</b>'
    },
    legend: {
        labelFormat: '{name} ({percentage:.0f}%)',
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            showInLegend: true,
            depth: 35,
            edgeWidth: 1,
            edgeColor: "white",
            dataLabels: {
                enabled: false,
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                },
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        type: 'pie',
        colorByPoint: true,
        name: 'Descarga',
        data: [
            crustaceo[0],
            molusco[0],
            demersal[0],
            pelagico[0]
        ]
    }]
});
