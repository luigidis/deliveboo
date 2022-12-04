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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/register.js":
/*!**********************************!*\
  !*** ./resources/js/register.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*****************************************************************************
 * per un corretto funzionamento dei controlli devo eseguire il tutto dopo
 * il caricamento della pagina
*****************************************************************************/
window.addEventListener('load', function () {
  /*****************************************************************************
   * recupero tutti gli elementi su cui eseguire i controlli
  *****************************************************************************/
  var form = document.getElementById('form');
  // console.log(form.submit());
  var username = document.getElementById('name');
  var email = document.getElementById('email');
  var password = document.getElementById('password');
  var password2 = document.getElementById('password-confirm');
  var restaurant = document.getElementById('restaurant_name');
  var address = document.getElementById('address');
  var phone = document.getElementById('phone');
  var pIva = document.getElementById('p_iva');
  var image = document.getElementById('image');
  var imageLabel = document.getElementById('imageLabel');
  var submitButton = document.getElementById('submitBtn');
  submitButton.addEventListener('click', function (e) {
    e.preventDefault();
    if (validateInputs()) form.submit();
  });

  /*****************************************************************************
   * gestisco la label dell-immagine
  *****************************************************************************/
  image.addEventListener('change', function (el) {
    var fileName = el.target.files[0].name;
    imageLabel.innerHTML = "File selezionato: ".concat(fileName);
  });

  /*****************************************************************************
   * gestisco l'errore
  *****************************************************************************/
  var setError = function setError(element, message) {
    var inputControl = element.parentElement;
    var errorDisplay = inputControl.querySelector('.error');
    errorDisplay.innerText = message;
    errorDisplay.classList.add('pt-2');
    inputControl.classList.add('error');
    element.classList.add('shadow_stroke_error');
    inputControl.classList.remove('success');
  };

  /*****************************************************************************
   * gestisco l'errore nelle categorie
  *****************************************************************************/
  var setErrorCat = function setErrorCat(message) {
    var inputControl = document.getElementById('errorCat');
    inputControl.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
  };

  /*****************************************************************************
   * gestisco il successo
  *****************************************************************************/
  var setSuccess = function setSuccess(element) {
    var inputControl = element.parentElement;
    var errorDisplay = inputControl.querySelector('.error');
    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    element.classList.remove('shadow_stroke_error');
    inputControl.classList.remove('error');
  };

  /*****************************************************************************
   * gestisco il successo nelle categorie
  *****************************************************************************/
  var setSuccessCat = function setSuccessCat() {
    var inputControl = document.getElementById('errorCat');
    inputControl.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
  };

  /*****************************************************************************
   * inizio validazione
  *****************************************************************************/
  function validateInputs() {
    /*****************************************************************************
     * recupero i valori di cui ho bisogno
    *****************************************************************************/
    var usernameValue = username.value.trim();
    var emailValue = email.value.trim();
    var passwordValue = password.value.trim();
    var password2Value = password2.value.trim();
    var restaurantValue = restaurant.value.trim();
    var addressValue = address.value.trim();
    var phoneValue = phone.value.trim();
    var phoneInt = parseInt(phoneValue);
    var pIvaValue = pIva.value.trim();
    var pIvaInt = parseInt(pIvaValue);
    var categories = document.querySelectorAll('[type="checkbox"]');
    // console.dir(categories[2].checked);
    var categoriesValues = [];
    categories.forEach(function (element) {
      categoriesValues.push(element.value);
    });
    var img = document.getElementById('image');
    var validated = true;

    /*****************************************************************************
     * controllo username
    *****************************************************************************/
    if (usernameValue === '') {
      setError(username, 'Campo obbligatorio');
      validated = false;
    } else {
      setSuccess(username);
    }

    /*****************************************************************************
     * controllo email
    *****************************************************************************/
    if (emailValue === '') {
      setError(email, 'Campo obbligatorio');
      validated = false;
    } else if (!ValidateEmail(emailValue)) {
      setError(email, 'Indirizzo email non valido');
      validated = false;
    } else {
      setSuccess(email);
    }

    /*****************************************************************************
     * controllo password
    *****************************************************************************/
    if (passwordValue === '') {
      setError(password, 'Campo obbligatorio');
      validated = false;
    } else if (passwordValue.length < 8) {
      setError(password, 'La Password deve contenere almeno 8 caratteri');
      validated = false;
    } else {
      setSuccess(password);
    }
    if (password2Value === '') {
      setError(password2, 'Conferma la tua password');
      validated = false;
    } else if (password2Value !== passwordValue) {
      setError(password2, 'La Password non coincide');
      validated = false;
    } else {
      setSuccess(password2);
    }

    /*****************************************************************************
     * controllo nome ristorante
    *****************************************************************************/
    if (restaurantValue === '') {
      setError(restaurant, 'Campo obbligatorio');
      validated = false;
    } else if (restaurantValue.length < 2) {
      setError(restaurant, 'Il nome deve contenere almeno 2 caratteri');
      validated = false;
    } else if (restaurantValue.length > 255) {
      setError(restaurant, 'Il nome non può contenere più di 255 caratteri');
      validated = false;
    } else {
      setSuccess(restaurant);
    }

    /*****************************************************************************
     * controllo indirizzo
    *****************************************************************************/
    if (addressValue === '') {
      setError(address, 'Campo obbligatorio');
      validated = false;
    } else if (addressValue.length < 4) {
      setError(address, 'Deve contenere almeno 4 caratteri');
      validated = false;
    } else if (addressValue.length > 255) {
      setError(address, 'Non può contenere più di 255 caratteri');
      validated = false;
    } else {
      setSuccess(address);
    }

    /*****************************************************************************
     * controllo numero di telefono
    *****************************************************************************/
    if (phoneValue === '') {
      setError(phone, 'Campo obbligatorio');
      validated = false;
    } else if (isNaN(phoneInt)) {
      setError(phone, 'Sono ammessi sono caretteri numerici');
      validated = false;
    } else {
      setSuccess(phone);
    }

    /*****************************************************************************
     * controllo partita iva
    *****************************************************************************/
    if (pIvaValue === '') {
      setError(pIva, 'Campo obbligatorio');
      validated = false;
    } else if (isNaN(pIvaInt)) {
      setError(pIva, 'Sono ammessi sono caretteri numerici');
      validated = false;
    } else {
      setSuccess(pIva);
    }

    /*****************************************************************************
     * controllo categorie
    *****************************************************************************/
    var anyChecked = false;
    var categoriesChecked = [];
    categories.forEach(function (element) {
      if (element.checked) {
        anyChecked = true;
        categoriesChecked.push(element.value);
      }
    });
    if (!anyChecked) {
      setErrorCat('Seleziona almeno una categoria');
      validated = false;
    } else {
      categoriesChecked.forEach(function (element) {
        console.log(categoriesValues);
        console.log(parseInt(element));
        categoriesValues.includes(element) ? '' : anyChecked = false;
      });
      if (!anyChecked) {
        setErrorCat('Categoria inesistente');
        validated = false;
      } else {
        setSuccessCat();
      }
    }

    /*****************************************************************************
     * controllo immagine
    *****************************************************************************/
    var re = /(\.jpg|\.jpeg|\.bmp|\.webp|\.png)$/i;
    if (!img.files.length) {
      setError(image, 'Immagine obbligatoria');
      validated = false;
    } else {
      var imgName = img.files[0].name;
      if (!re.exec(imgName)) {
        setError(image, 'File non supportato');
        validated = false;
      } else {
        setSuccess(image);
      }
    }
    return validated;
  }
});

/*****************************************************************************
 * funzione di supporto alla validazione della email
*****************************************************************************/
function ValidateEmail(email) {
  var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  return email.match(pattern);
}

/***/ }),

/***/ 1:
/*!****************************************!*\
  !*** multi ./resources/js/register.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\franc\Documents\boolean-dev\full-stack-dev\php\deliveboo\resources\js\register.js */"./resources/js/register.js");


/***/ })

/******/ });