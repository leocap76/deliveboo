import axios from 'axios';
import Vue from 'vue';

var app = new Vue(
  {
    el: '#app',
    data: {
      cart_plates: [],
      tot_price: 0
    },    
    methods: {
      push_plate: function(name,price){
        var isNew = true;
        this.tot_price = 0;

        this.cart_plates.forEach((item) => {

          if (item.name == name) {
            item.amount++;
            item.price = price * item.amount;
            isNew = false;
          }

          this.tot_price += item.price;
        });

        if(isNew) {

          this.cart_plates.push({ 'name': name, 'price': price, 'amount' : 1}); 
          this.tot_price += price;
          
        }

        var li = document.getElementById('item_plate');
        li.classList.remove('animazione');

        setTimeout(function(){ li.classList.add('animazione'); }, 100);
      }
    }
  });
