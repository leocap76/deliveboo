const { default: axios } = require('axios');

require('./bootstrap');
import Vue from 'vue';

var app = new Vue(
  {
      el: '#app',
      data: {
          categories: [],
      },
      created: function() {
          var self = this;
          axios   
              .get('http://127.0.0.1:8000/api/categories')
              .then( function(response) {
                  console.log(response.data);
                  self.categories = response.data;
              });
      },
      // methods: {
          
      // }
  }
);
