// Quicklink icons for the banner
$(document).ready(function() {
    $("#welcomeMessage").fadeIn(3000).fadeOut();
    $("#quickLinks").delay(4000).fadeIn();
});

// Google Charts
google.charts.load('current', {packages: ['corechart', 'line']});
//        google.charts.load('current', {'packages': ['corechart']});
google.charts.setOnLoadCallback(drawLineGraph);
google.charts.setOnLoadCallback(drawCurvedLineGraph);
google.charts.setOnLoadCallback(drawDonut);
google.charts.setOnLoadCallback(drawSummaryDonut);

function drawLineGraph() {
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'X');
    data.addColumn('number', '2016');
    data.addColumn('number', '2017');

    data.addRows([
        [0, 0, 0], [1, 25, 50], [2, 23, 15], [3, 17, 9], [4, 18, 10], [5, 9, 5],
        [6, 11, 3], [7, 27, 19], [8, 33, 25], [9, 40, 32], [10, 32, 24], [11, 35, 27],
        [12, 30, 22], [13, 40, 32], [14, 42, 34], [15, 47, 39], [16, 44, 36], [17, 48, 40],
        [18, 52, 44], [19, 54, 46], [20, 42, 34], [21, 55, 47], [22, 56, 48], [23, 57, 49],
        [24, 60, 52], [25, 50, 42], [26, 52, 44], [27, 51, 43], [28, 49, 41], [29, 53, 45],
        [30, 55, 47], [31, 60, 52], [32, 61, 53], [33, 59, 51], [34, 62, 54], [35, 65, 57],
        [36, 62, 54], [37, 58, 50], [38, 55, 47], [39, 61, 53], [40, 64, 56], [41, 65, 57],
        [42, 63, 55], [43, 66, 58], [44, 67, 59], [45, 69, 61], [46, 69, 61], [47, 70, 62],
        [48, 72, 64], [49, 68, 60], [50, 66, 58], [51, 65, 57], [52, 67, 59], [53, 70, 62],
        [54, 71, 63], [55, 72, 64], [56, 73, 65], [57, 75, 67], [58, 70, 62], [59, 68, 60],
        [60, 64, 56], [61, 60, 52], [62, 65, 57], [63, 67, 59], [64, 68, 60], [65, 69, 61],
        [66, 70, 62], [67, 72, 64], [68, 75, 67], [69, 80, 72]
    ]);

    var options = {
        title: 'Line Chart',
        curveType: 'function',
        legend: {position: 'bottom'},
        hAxis: {
            title: 'Time'
        },
        vAxis: {
            title: 'Sales'
        },
        series: {
            1: {curveType: 'function'}
        },
        backgroundColor: '#c5c6c6'
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

function drawCurvedLineGraph() {
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses'],
        ['2004', 1000, 400],
        ['2005', 1170, 460],
        ['2006', 660, 1120],
        ['2007', 1030, 540]
    ]);

    var options = {
        title: 'Curved Graph',
        curveType: 'function',
        legend: {position: 'bottom'},
        hAxis: {
            title: 'Time'
        },
        vAxis: {
            title: 'Sales'
        },
        series: {
            1: {curveType: 'function'}
        },
        backgroundColor: '#c5c6c6'
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
}

function drawDonut() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 11],
        ['Eat', 2],
        ['Commute', 2],
        ['Watch TV', 2],
        ['Sleep', 7]
    ]);

    var options = {
        title: 'My Daily Activities',
        pieHole: 0.4,
        backgroundColor: '#c5c6c6'
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
}

function drawSummaryDonut() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Sleep', 7],
        ['work', 23]
    ]);

    var options = {
        title: '',
        pieHole: 0.6,
        backgroundColor: '#c5c6c6'
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutcheckOne'));
    chart.draw(data, options);
}














