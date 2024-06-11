function creerStackedBars(dateDebut, dateFin) {
    const nomsMois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet",
        "Août", "Septembre", "Octobre", "Novembre", "Décembre"];

    let moisLabel = [];

    for (let i = dateDebut; i <= dateFin; i++) {
        moisLabel.push(nomsMois[i]);
    }
    console.log(moisLabel);

    const color = Chart.helpers.color;
    const barChartData = {
        labels: moisLabel,
        datasets: [
            {
                label: "Crêpes au sucre",
                backgroundColor: 'rgba(0, 128, 0, 1)',
                borderColor: 'rgba(0, 128, 0, 1)',
                borderWidth: 1,
                data: [
                    10,
                    20,
                    15,
                    7,
                    28,
                    17,
                    69,
                ],
            },
            {
                label: "Crêpes au chocolat",
                backgroundColor: 'rgba(255, 201, 14, 1)',
                borderColor: 'rgba(255, 201, 14, 1)',
                borderWidth: 1,
                data: [
                    10,
                    7,
                    3,
                    14,
                    8,
                    34,
                    5,
                ],
            },
        ],
    };

    const ctx = stackedBarChar;
    let verticalBar = new Chart(ctx, {
        type: "bar",
        data: barChartData,
        options: {
            responsive: true,
            legend: {
                position: "top",
            },
            title: {
                display: true,
                text: "Crêpes au sucre vs Crêpes au chocolat",
            },
        },
    });
}