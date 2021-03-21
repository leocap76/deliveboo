import axios from 'axios';
import Vue from 'vue';

var app = new Vue(
  {
    el: '#app',
    data: {
      cart_plates: [],
      tot_price: 0,
      delivery: 2.50,
      plate: {
          "name": "",
          "price": 0,
          "description": "",
          "ingredients": "",
          "img": ""
        }
    },   

    mounted: function(){
      // this.tot_price = this.delivery;
      // console.log(this.tot_price);
    },

    methods: {
      close_box: function() {
        var box = document.getElementById('box');
        box.style.display = 'none';
      },
      open_box: function (name,price,description,ingredients,img){
        var box = document.getElementById('box');
        box.style.display = 'inline-block';

        this.plate.name = name;
        this.plate.price = price;
        this.plate.description = description;
        this.plate.ingredients = ingredients;
        this.plate.img = img;
      },
      push_plate: function(name,price){
        var box = document.getElementById('box');
        box.style.display = 'none';
        
        let isNew = true;

        this.tot_price = this.delivery;
        

        this.cart_plates.forEach((item) => {

          if (item.name == name) {
            item.amount++;
            item.original_price = price;
            item.price = price * item.amount;
            isNew = false;
          }

          this.tot_price += item.price;
        });

        if(isNew) {

          this.cart_plates.push({ 'name': name, 'price': price, 'original_price': price, 'amount' : 1}); 
          this.tot_price += price;
          
        }

        setTimeout(function() {
          var li = document.getElementById('item_plate');
          li.classList.remove('price_animation');
          setTimeout(function(){ li.classList.add('price_animation'); }, 100);
        }, 100);
        
      },

      plate_remove: function(index){
        this.tot_price -= this.cart_plates[index].price;
        this.cart_plates.splice(index,1);
      },
      plate_minus: function(index){
        this.cart_plates[index].amount--;
        this.cart_plates[index].price -= this.cart_plates[index].original_price;
        this.tot_price -= this.cart_plates[index].original_price;
        if (this.cart_plates[index].amount == 0) {
          this.cart_plates.splice(index,1);
        }

        var li = document.getElementById('item_plate');
        li.classList.remove('price_animation');
        setTimeout(function(){ li.classList.add('price_animation'); }, 100);
      },
      plate_plus: function(index){
        this.cart_plates[index].amount++;
        this.cart_plates[index].price += this.cart_plates[index].original_price;
        this.tot_price += this.cart_plates[index].original_price;

        var li = document.getElementById('item_plate');
        li.classList.remove('price_animation');
        setTimeout(function(){ li.classList.add('price_animation'); }, 100);
      }

    }
  });
