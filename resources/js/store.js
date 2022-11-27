import Vue from 'vue';

const state = Vue.observable({
    error: false,
    lastPlate: '',
    totalItems: localStorage.getItem('totalItems') || 0,
});

export default state;