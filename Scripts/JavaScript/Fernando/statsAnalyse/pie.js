let xValues = ["Crêpe au fromage", "Crêpe au jambon", "Crêpe au sucre", "Crêpe au chocolat", "Crêpe au caramel"];
let yValues = [55, 49, 44, 24, 15];
const barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

const dataPie = {
  labels: xValues,
  datasets: [{
    backgroundColor: barColors,
    data: yValues
  }]
}

const optionsPie = {
  title: {
    display: true,
    text: "Ventes de crêpes par type de crêpe en 2021"
  }
};

const configPie = {
  type: 'pie',
  data: dataPie,
  options: optionsPie
};

let pieChart = new Chart("pieChart", configPie);