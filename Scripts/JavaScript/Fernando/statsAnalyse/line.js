let labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July'];

const data = {
    labels: labels,
    datasets: [{
        label: 'Ventes des crêpes au chocolat',
        data: [65, 59, 80, 81, 56, 55, 40],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
    }]
};

const config = {
    type: 'line',
    data: data,
};

let lineChart = new Chart("lineChart", config);