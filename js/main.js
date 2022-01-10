// get canva for display chart
const canva = document.getElementById('myChart').getContext('2d');
const totalAmount = document.getElementById('totalAmount');
const errorMsg = document.getElementById('errorMessage');

//set default valut on chart
let val1 = 0;
let val2 = 0;
let val3 = 0;
let val4 = 0;
let val5 = 0;

const reg = new RegExp('^[0-9]*\[.]?[0-9]{0,2}$');
// display chart
const myChart = new Chart(canva, {
    type: 'line',
    data: {
        labels: ['Année 0', 'Année 1', 'Année 2', 'Année 3', 'Année 4', 'Année 5'],
        datasets: [{
            label: 'Retour sur investissement en €',
            data: [0, val1, val2, val3, val4, val5],
            fill: true,
            backgroundColor: 'rgba(63, 194, 202, 0.5)',
            borderColor: 'rgb(63, 194, 202)',
            borderWidth: 2,
            tension: 0.1
        }],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
// called function at each change in input
function calculInvest() {
    // get value in input
    const input = document.getElementById('amount').value;
    const compareReg = reg.test(input);

    //display error message
    errorMsg.classList.toggle('active', compareReg === false);
    if(compareReg) {

        val1 = input * multiplierA1;
        val2 = input * multiplierA2;
        val3 = input * multiplierA3;
        val4 = input * multiplierA4;
        val5 = input * multiplierA5;

        // add value in myChart array
        myChart.data.datasets[0].data = [0, val1, val2, val3, val4, val5]
        // update chart
        myChart.update()

        totalAmount.innerHTML = val5.toFixed(2) + "€";
    }
}

let burgerButton = document.getElementById('btnBurger');
let nav = document.getElementById('nav');
let menu = document.getElementById('menu-item');
let menuWP = document.getElementById('primary-menu');
burgerButton.addEventListener('click', displayBurgerMenu);

function displayBurgerMenu(){
    nav.classList.toggle('height-full');
    menu.classList.toggle('menu-element-active');
    menuWP.classList.toggle('menuWP-element-active');
}
