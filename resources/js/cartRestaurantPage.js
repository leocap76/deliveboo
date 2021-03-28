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
        },
      restaurant_id: 0
    },   

    mounted: function(){
      this.restaurant_id = restaurant_id_js;
      if(localStorage.getItem('tot_price') != undefined && this.restaurant_id == localStorage.getItem('restaurant_id')) {
        this.tot_price = parseFloat(localStorage.getItem('tot_price')).toFixed(2);
        this.delivery = parseFloat(localStorage.getItem('delivery')).toFixed(2);
        this.cart_plates = JSON.parse(localStorage.getItem('plates'));
      }

      this.tot_price = parseFloat(this.tot_price);
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
      push_plate: function(name, price, img_path){
        var box = document.getElementById('box');
        box.style.display = 'none';
        let isNew = true;

        this.tot_price = parseFloat(this.delivery);

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

          this.cart_plates.push({ 'name': name, 'price': price, 'original_price': price, 'amount' : 1, 'img_path': img_path }); 
          this.tot_price += price;
          
        }

        setTimeout(function() {
          var li = document.getElementById('item_plate');
          li.classList.remove('price_animation');
          setTimeout(function(){ li.classList.add('price_animation'); }, 100);
        }, 100);

        localStorage.setItem('tot_price', this.tot_price);
        localStorage.setItem('delivery', this.delivery);
        localStorage.setItem('plates', JSON.stringify(this.cart_plates));
        localStorage.setItem('restaurant_id', this.restaurant_id);
        
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

        localStorage.setItem('tot_price', this.tot_price);
        localStorage.setItem('delivery', this.delivery);
        localStorage.setItem('plates', JSON.stringify(this.cart_plates));
        localStorage.setItem('restaurant_id', this.restaurant_id);
      },
      plate_plus: function(index){
        this.cart_plates[index].amount++;
        this.cart_plates[index].price += this.cart_plates[index].original_price;
        this.tot_price += this.cart_plates[index].original_price;

        var li = document.getElementById('item_plate');
        li.classList.remove('price_animation');
        setTimeout(function(){ li.classList.add('price_animation'); }, 100);

        localStorage.setItem('tot_price', this.tot_price);
        localStorage.setItem('delivery', this.delivery);
        localStorage.setItem('plates', JSON.stringify(this.cart_plates));
        localStorage.setItem('restaurant_id', this.restaurant_id);

      },
      save: function () {
        localStorage.setItem('tot_price', this.tot_price);
        localStorage.setItem('delivery', this.delivery);
        localStorage.setItem('plates', JSON.stringify(this.cart_plates));
        localStorage.setItem('restaurant_id', this.restaurant_id);
      }

    }
  });
