import axios from 'axios';
import Vue from 'vue';

var app = new Vue(
  {
    el: '#app',
    data: {
      cart_plates: [],
      tot_price: 0,
    },    
    methods: {
      push_plate: function(name,price){
        this.tot_price = 0;
        if (this.cart_plates.length == 0) {
          this.cart_plates.push({ 'name': name, 'price': price, 'amount' : 1});
          this.tot_price += price;
        }else{
          this.cart_plates.forEach((item) => {
            if (item.name == name) {
              item.amount++;
              item.price = price * item.amount;
            }else{
              this.cart_plates.push({ 'name': name, 'price': price, 'amount' : 1}); 
              this.tot_price += price;
            }
            this.tot_price += item.price;
          });
        }
        
        console.log(this.cart_plates);
      }
    }
  });
