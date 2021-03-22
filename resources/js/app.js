require('./bootstrap');
import axios from 'axios';
import Vue from 'vue';

var app = new Vue(
  {
      el: '#app',
      data: {
          restaurants: [],
          allRestaurants: [],
          restaurantIsVisible: false,
          category: "",
          categoryColor: "",
          searchTextRestaurant: ""
      },
      created: function() {
        
            },
            methods: {

                getSearchedRestaurants: function () {

                    if(this.searchTextRestaurant != "")
                    axios
                        .get(`http://127.0.0.1:8000/api/all-restaurants/${this.searchTextRestaurant}`)
                        .then( (response) => {
                            this.allRestaurants = response.data;
                            console.log(this.allRestaurants);
                    } );
                },

                getRestaurants: function(id, name, color) {
                    this.category = name.toUpperCase();
                    this.categoryColor = color;
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
