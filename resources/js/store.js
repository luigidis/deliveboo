import Vue from 'vue';

const ids = new Array;
const quantity = new Array;

for (var i = 0; i < localStorage.length - 1; i++) {
    if (localStorage.key(i).includes("quantity")) {
        ids.push(parseInt(localStorage.key(i).split("%")[1]));
        quantity.push(localStorage.getItem(localStorage.key(i)));
    }
}

const state = Vue.observable({
    error: false,
    lastPlate: '',
    totalItems: localStorage.getItem('totalItems') || 0,
    ids: ids,
    quantity: quantity,
});

export default state;