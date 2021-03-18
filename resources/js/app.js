require('./bootstrap');
import axios from 'axios';
import Vue from 'vue';

var app = new Vue(
  {
      el: '#app',
      data: {
          restaurants: [],
          restaurantIsVisible: false,
          category: ""

      },
      created: function() {
            },
            methods: {
                getRestaurants: function(id, name) {
                    this.category = name.toUpperCase();
                    axios
                    .get(`http://127.0.0.1:8000/api/restaurants/${id}`)
                    .then( (response) => {
                        this.restaurants = response.data;

                        this.restaurantIsVisible = true;
                    });
               },
               switchSection: function() {
                   if (this.restaurantIsVisible) {
                        this.restaurantIsVisible = false;
                   } else {
                        this.restaurantIsVisible = true;
                   }

                   setTimeout(() => {
                       this.restaurants = [];
                   }, 1000);

               },
      }
  }
);
