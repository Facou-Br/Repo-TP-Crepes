function prepareAndPlotData()  {
    $.ajax({
        url: '../../../Scripts/PhP/getStocksData.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);

            var uniqueDates = [...new Set(data.dates)];

            var initialData = prepareInitialData(data, uniqueDates[0]);
            var frames = prepareFrames(data, uniqueDates);
            var layout = prepareLayout(uniqueDates);

            Plotly.newPlot('chart', initialData, layout).then(function() {
                Plotly.addFrames('chart', frames);
            });
            
            // Ecouteur d'événement pour le changement de slider
            document.getElementById('chart').on('plotly_sliderchange', function(e) {
                var currentDate = e.slider.active;
                adjustYAxisRange(currentDate, data, uniqueDates);
            });
            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX request failed:", textStatus, errorThrown);
        }
    });
}

function prepareInitialData(data, initialDate) {
    var indices = data.dates.map((date, i) => date === initialDate ? i : -1).filter(i => i !== -1);
    return indices.map(i => ({
        x: [data.productNames[data.ids[i]]],
        y: [data.percentages[i]],
        type: 'bar',
        marker: {
            color: getColorForPercentage(data.percentages[i])
        },
        hoverinfo: 'text',
        hovertext: generateHoverText(data, i),
        name: data.productNames[data.ids[i]]
    }));
}

function prepareFrames(data, uniqueDates) {
    return uniqueDates.map(date => {
        var indices = data.dates.reduce((acc, currentDate, index) => {
            if(currentDate === date) acc.push(index);
            return acc;
        }, []);
        
        var frameData = indices.map(index => ({
            x: [data.productNames[data.ids[index]]],
            y: [data.percentages[index]],
            type: 'bar',
            marker: {
                color: getColorForPercentage(data.percentages[index])
            },
            hoverinfo: 'text',
            hovertext: generateHoverText(data, index)
        }));
        
        return {
            name: date,
            data: frameData
        };
    });
}

function prepareLayout(uniqueDates) {
    var sliderSteps = uniqueDates.map(date => ({
        label: date,
        method: 'animate',
        args: [[date], {
            mode: 'immediate',
            frame: {redraw: true, duration: 500},
            transition: {duration: 300}
        }]
    }));

    return {
        title: 'Écarts de stock exprimés en pourcentage du réapprovisionnement recommandé par produit',
        xaxis: {
            title: 'Produit',
            automargin: true
        },
        yaxis: {
            title: 'Écart en pourcentage',
            autorange: true
        },
        height: 600,
        margin: {
            l: 50,
            r: 50,
            b: 100,
            t: 100,
            pad: 4
        },
        sliders: [{
            pad: {t: 75},
            currentvalue: {
                visible: true,
                prefix: 'Date: ',
                xanchor: 'center'
            },
            steps: sliderSteps
        }],
        showlegend: true
    };
}


function adjustYAxisRange(dateIndex, data, uniqueDates) {
    // Filtrer les indices où la date correspond à la date actuelle
    var indices = [];
    for (let i = 0; i < data.dates.length; i++) {
        if (data.dates[i] === uniqueDates[dateIndex]) {
            indices.push(i);
        }
    }

    // S'assurer qu'il y a des indices à traiter
    if (indices.length === 0) {
        console.error("Aucun indice trouvé pour la date actuelle.");
        return;
    }

    var minY = Math.min(...indices.map(i => Number(data.percentages[i])));
    var maxY = Math.max(...indices.map(i => Number(data.percentages[i])));

    if (isFinite(minY) && isFinite(maxY)) {
        // Calculer le nouvel intervalle pour l'axe des Y
        var newYaxisRange = minY < 0 ? [minY * 1.1, maxY * 1.1] : [0, maxY * 1.1];
        Plotly.relayout('chart', 'yaxis.range', newYaxisRange);
    } else {
        console.error("minY ou maxY sont non finis.");
    }
}



// Fonction pour générer le texte d'infobulle
function generateHoverText(data, index) {
    var text = `Produit: ${data.productNames[data.ids[index]]}<br>`;
    text += `Quantité: ${data.quantities[index]}<br>`;
    text += `Stock théorique: ${data.theoreticalStocks[index]}<br>`;
    text += `Écart: ${data.percentages[index].toFixed(2)}%`;
    return text;
}

let currentThreshold = 5; // Valeur initiale du seuil

function updateThreshold() {
    const newThreshold = parseFloat(document.getElementById('threshold').value);
    if (!isNaN(newThreshold)) {
        currentThreshold = newThreshold;
        prepareAndPlotData(); 
    } else {
        alert('Veuillez entrer une valeur numérique valide.');
    }
}

function getColorForPercentage(percentage) {
    if (percentage < 0) return 'red';
    else if (percentage >= 0 && percentage <= currentThreshold) return 'green';
    else if (percentage > currentThreshold) return 'yellow';
}

prepareAndPlotData();

