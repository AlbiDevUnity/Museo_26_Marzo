var fp = flatpickr(myInput);
fp.config.enableTime = false;
fp.config.minDate = new Date("1818-09-18");

myInput.addEventListener('input', function (evt) {
    OndateChange(this.value);
});

var myChart;
const labels = 
[
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
    "Sunday",
];

OndateChange(myInput.value);

function OndateChange(date)
{
    date = date.split(' ')[0];
    var json = HttpGet("php/chart.php?orario=" + date);

    var values = JSON.parse(json);

    var real = [];
    values.forEach(e => {
        real.push(
            {
                x: e[1],
                y: e[0]
            });
    });

    DrawGraph(real);
}

function HttpGet(url)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", url, false); // false for synchronous request
    xmlHttp.send();
    return xmlHttp.responseText;
}

function DrawGraph(array)
{
    const data = 
    {
        labels: labels,
        datasets: 
        [
            {
                label: 'My First dataset',
                lineTension: 0.3,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                data: array,
            }
        ]
      };

    const config = 
    {
        type: 'line',
        data: data,
        options: {
            bezierCurve: true,
            spanGaps:true,
            fill:true,
            responsive: true,
            scales: 
            {
                y: 
                {
                beginAtZero: true
                }
            }
        },
      };

    if(myChart != null) { myChart.destroy(); }

     myChart = new Chart(document.getElementById('myChart'), config);
}