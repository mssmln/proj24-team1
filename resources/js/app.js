/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import axios from 'axios';
import Swal from 'sweetalert2/src/sweetalert2.js';

let forms = document.getElementsByClassName("form-delete");

console.log(forms);

for( let i = 0; i < forms.length; i++ ) {
    forms[i].addEventListener('submit',function(e) {
        e.preventDefault();
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.'
                    // 'success'
                );
                forms[i].submit();
            }
        })
    });
};

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */




const app = new Vue({
    el: '#app',
    data: {
        flats: [],
        query: '',
        googleApiResults: [],
        tomtomApiResults: [],
        address: ''
    },
    created(){
        axios
        .get("http://127.0.0.1:8000/api/boolbnb-flats-api")
        .then((result) =>{
            this.flats.push(...result.data.response.flat);
            // this.flats = result.data.response.flat; the same as above
            // console.log(this.flats); it worked perfectly 
        })
        .catch((error) => alert('this API (flat) does not work'));

    },
    methods: {
        // googleAdresses(){ it worked perfectly, we just use tomtom's one
        //     // api di google
        //     axios
        //     .get("https://maps.googleapis.com/maps/api/geocode/json?address=" + this.address + "&key=AIzaSyBPI9z1Z6lK5DCUc_TjbqmKRoRRI9L1Oqc")
        //     .then((result) =>{
        //         this.googleApiResults = result.data.results;
        //         console.log(this.googleApiResults); 
        //     })
        //     .catch((error) => console.log('this API (Google) does not work',error));
            
        // },
        tomtomAdresses(){
            // api di Tomtom
            axios
            .get('https://api.tomtom.com/search/2/geocode/' +  this.address + '.json?typeahead=true&limit=3&key=mGfJKGsowMXK1iso83qv0DUuAL4xlpWN')
            .then((result) =>{
                this.tomtomApiResults = result.data.results;
                // console.log(result); 
                console.log(this.tomtomApiResults);
            })
            .catch((error) => alert('this API (Tomtom) does not work',error));
        }
    }
    
});
