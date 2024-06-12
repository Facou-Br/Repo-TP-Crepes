function creerStackedBars(dateDebut, dateFin, jourDebut, jourFin, type) {
    let anneeLabel = [];
    const nomsMois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet",
        "Août", "Septembre", "Octobre", "Novembre", "Décembre"];

    if (type === "annee") {
        for (let i = dateDebut; i <= dateFin; i++) {
            anneeLabel.push(nomsMois[i]);
        }
    }
    else if (type === 'mois') {
        if (dateDebut === dateFin) {
            for (let j = jourDebut; j <= jourFin; j++) {
                anneeLabel.push(j + "/" + nomsMois[dateDebut]);
            }
        } else {
            for (let i = dateDebut; i <= dateFin; i++) {
                for (let j = jourDebut; j <= 30; j++) {
                    anneeLabel.push(j + "/" + nomsMois[i]);
                }
            }
        }

    }
    console.log(anneeLabel);

    const color = Chart.helpers.color;
    const barChartData = {
        labels: anneeLabel,
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