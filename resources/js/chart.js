import axios from 'axios';
import Vue from 'vue';

let app = new Vue({
    el: "#chart",
    data: {
        delivery: 2.5,
    },

    mounted: function() {

        axios
        .get(`http://127.0.0.1:8000/api/orders/${userId}`)
        .then((response) => {
            console.log(response.data);

            let ordersPerMonth = [];
            let orders = response.data; 

            for (let i = 1; i <= 12; i++) {
                            
                let ordersSum = 0;

                orders.forEach((element) => {

                    if ( i == parseInt(element.created_at.substr(5, 2)) ) {
                        element.price -= this.delivery;
                        ordersSum += element.price; 
                    }

                });

                ordersPerMonth.push(ordersSum);
                
            }

            let ctx = document.getElementById('myChart').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['gen', 'feb', 'mar', 'apr', 'mag', 'giu', 'lug', 'ago', 'set', 'ott', 'nov', 'dic'],
                    datasets: [{
                        label: 'Vendite totali',
                        data: ordersPerMonth, 
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        })
    }
});
