import axios from 'axios';
import Vue from 'vue';

var app = new Vue( 
    {
      el: "#app",
      data: {
          arrItems: [],
          tot_price: 0,
          delivery: 0
      },
      mounted: function() {
        this.arrItems = JSON.parse(localStorage.getItem('plates'));
        this.tot_price = localStorage.getItem('tot_price');
        this.delivery = localStorage.getItem('delivery');

        setInterval(function(){ document.getElementById('amount').type = 'hidden'; document.getElementById('amount').value = parseFloat(localStorage.getItem('tot_price')).toFixed(2) }, 100);
      }
})