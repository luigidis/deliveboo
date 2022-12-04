/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/createPlate.js":
/*!*************************************!*\
  !*** ./resources/js/createPlate.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// controllo prezzo incompleto
// se inserisco un prezzo gli errori si buggano

window.addEventListener('load', function () {
  // Input del file >> Aggiorna il nome del label, in sostituzione all'input, con il nome del file
  var photoInputEl = document.getElementById('img');
  var photoLabelEl = document.getElementById('fileLabel');
  photoLabelEl.innerHTML = 'Foto del piatto*';
  photoInputEl.addEventListener('change', function (el) {
    var fileName = el.target.files[0].name;
    photoLabelEl.innerHTML = "File selezionato: ".concat(fileName);
  });
  var form = document.getElementById('form');
  var inputEl = document.querySelectorAll('.input_color');
  var namePlate = document.getElementById('name_plate');
  var description = document.getElementById('description');
  var price = document.getElementById('price');
  var isVisible = document.getElementById('is_visible');
  var submitButton = document.getElementById('submitBtn');
  var submitButtonModal = document.getElementById('submitBtnModal');
  submitButton.addEventListener('click', function (e) {
    e.preventDefault();
    if (validateInputs()) {
      submitButton.setAttribute('data-toggle', 'modal');
    } else {
      submitButton.setAttribute('data-toggle', '');
      inputEl.forEach(function (el) {
        el.addEventListener('focus', function () {
          el.innerHTML = '';
          el.setAttribute('value', '');
          el.classList.remove('error');
        });
      });
    }
  });
  submitButtonModal.addEventListener('click', function (e) {
    e.preventDefault();
    form.submit();
  });
  var setError = function setError(element, message) {
    var inputControl = element.parentElement;
    var errorDisplay = document.querySelectorAll('.error_js');
    errorDisplay.forEach(function (el) {
      el.innerHTML = message;
      el.setAttribute('value', message);
      el.classList.add('error');
      el.classList.remove('success');
    });
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
  };
  var setSuccess = function setSuccess(element) {
    var inputControl = element.parentElement;
    var errorDisplay = document.querySelectorAll('.error_js');
    errorDisplay.forEach(function (el) {
      el.innerHTML = '';
      el.setAttribute('value', '');
      el.classList.add('success');
      el.classList.remove('error');
    });
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
  };
  function validateInputs() {
    var nameValue = namePlate.value.trim();
    var descriptionValue = description.value.trim();
    var priceValue = price.value.trim();
    var isVisibleVlue = isVisible.value.trim();
    var validate = true;
    if (photoLabelEl.innerHTML === 'Foto del piatto*') {
      setError(photoLabelEl, 'Campo Obbligatorio');
      validate = false;
    } else {
      setSuccess(photoLabelEl);
    }
    if (nameValue === '') {
      setError(namePlate, 'Campo Obbligatorio');
      validate = false;
    } else {
      setSuccess(namePlate);
    }
    if (descriptionValue === '') {
      setError(description, 'Campo Obbligatorio');
      validate = false;
    } else {
      setSuccess(description);
    }
    if (priceValue === '') {
      setError(price, 'Campo Obbligatorio');
      validate = false;
    } else {
      setSuccess(price);
    }
    return validate;
  }
});

/***/ }),

/***/ 2:
/*!*******************************************!*\
  !*** multi ./resources/js/createPlate.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/giusscos/dev/boolean/progetto_finale/deliveboo/resources/js/createPlate.js */"./resources/js/createPlate.js");


/***/ })

/******/ });