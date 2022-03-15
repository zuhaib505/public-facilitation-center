/******/
(function(modules) { // webpackBootstrap
    /******/ // The module cache
    /******/
    var installedModules = {};
    /******/
    /******/ // The require function
    /******/
    function __webpack_require__(moduleId) {
        /******/
        /******/ // Check if module is in cache
        /******/
        if (installedModules[moduleId]) {
            /******/
            return installedModules[moduleId].exports;
            /******/
        }
        /******/ // Create a new module (and put it into the cache)
        /******/
        var module = installedModules[moduleId] = {
            /******/
            i: moduleId,
            /******/
            l: false,
            /******/
            exports: {}
            /******/
        };
        /******/
        /******/ // Execute the module function
        /******/
        modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
        /******/
        /******/ // Flag the module as loaded
        /******/
        module.l = true;
        /******/
        /******/ // Return the exports of the module
        /******/
        return module.exports;
        /******/
    }
    /******/
    /******/
    /******/ // expose the modules object (__webpack_modules__)
    /******/
    __webpack_require__.m = modules;
    /******/
    /******/ // expose the module cache
    /******/
    __webpack_require__.c = installedModules;
    /******/
    /******/ // define getter function for harmony exports
    /******/
    __webpack_require__.d = function(exports, name, getter) {
        /******/
        if (!__webpack_require__.o(exports, name)) {
            /******/
            Object.defineProperty(exports, name, { enumerable: true, get: getter });
            /******/
        }
        /******/
    };
    /******/
    /******/ // define __esModule on exports
    /******/
    __webpack_require__.r = function(exports) {
        /******/
        if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
            /******/
            Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
            /******/
        }
        /******/
        Object.defineProperty(exports, '__esModule', { value: true });
        /******/
    };
    /******/
    /******/ // create a fake namespace object
    /******/ // mode & 1: value is a module id, require it
    /******/ // mode & 2: merge all properties of value into the ns
    /******/ // mode & 4: return value when already ns object
    /******/ // mode & 8|1: behave like require
    /******/
    __webpack_require__.t = function(value, mode) {
        /******/
        if (mode & 1) value = __webpack_require__(value);
        /******/
        if (mode & 8) return value;
        /******/
        if ((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
        /******/
        var ns = Object.create(null);
        /******/
        __webpack_require__.r(ns);
        /******/
        Object.defineProperty(ns, 'default', { enumerable: true, value: value });
        /******/
        if (mode & 2 && typeof value != 'string')
            for (var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
        /******/
        return ns;
        /******/
    };
    /******/
    /******/ // getDefaultExport function for compatibility with non-harmony modules
    /******/
    __webpack_require__.n = function(module) {
        /******/
        var getter = module && module.__esModule ?
            /******/
            function getDefault() { return module['default']; } :
            /******/
            function getModuleExports() { return module; };
        /******/
        __webpack_require__.d(getter, 'a', getter);
        /******/
        return getter;
        /******/
    };
    /******/
    /******/ // Object.prototype.hasOwnProperty.call
    /******/
    __webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
    /******/
    /******/ // __webpack_public_path__
    /******/
    __webpack_require__.p = "/";
    /******/
    /******/
    /******/ // Load entry module and return exports
    /******/
    return __webpack_require__(__webpack_require__.s = 23);
    /******/
})
/************************************************************************/
/******/
({

    /***/
    "./src/js/plugins/toastr.js":
    /*!**********************************!*\
      !*** ./src/js/plugins/toastr.js ***!
      \**********************************/
    /*! no static exports found */
    /***/
        (function(module, exports) {

        (function() {
            'use strict';

            toastr.primary = function(message, title, optionsOverride) {
                return this.success(message, title, $.extend({
                    iconClass: 'toast-primary'
                }, optionsOverride));
            };

            $('[data-toggle="toastr"]').on('click', function(e) {
                e.preventDefault();
                var element = $(this);
                var type = element.data('toastr-type') || 'success';
                var message = element.data('toastr-message');
                var title = element.data('toastr-title');
                var options = {
                    closeButton: void 0 !== element.data('toastr-close-button') ? element.data('toastr-close-button') : false,
                    debug: false,
                    newestOnTop: void 0 !== element.data('toastr-newest-on-top') ? element.data('toastr-newest-on-top') : true,
                    progressBar: void 0 !== element.data('toastr-progress-bar') ? element.data('toastr-progress-bar') : true,
                    positionClass: void 0 !== element.data('toastr-position-class') ? element.data('toastr-position-class') : "toast-top-right",
                    preventDuplicates: void 0 !== element.data('toastr-prevent-duplicates') ? element.data('toastr-prevent-duplicates') : false,
                    onclick: null,
                    showDuration: void 0 !== element.data('toastr-show-duration') ? element.data('toastr-show-duration') : 300,
                    hideDuration: void 0 !== element.data('toastr-hide-duration') ? element.data('toastr-hide-duration') : 1000,
                    timeOut: void 0 !== element.data('toastr-time-out') ? element.data('toastr-time-out') : 5000,
                    extendedTimeOut: void 0 !== element.data('toastr-extended-time-out') ? element.data('toastr-extended-time-out') : 1000,
                    showEasing: void 0 !== element.data('toastr-show-easing') ? element.data('toastr-show-easing') : 'swing',
                    hideEasing: void 0 !== element.data('toastr-hide-easing') ? element.data('toastr-hide-easing') : 'linear',
                    showMethod: void 0 !== element.data('toastr-show-method') ? element.data('toastr-show-method') : 'fadeIn',
                    hideMethod: void 0 !== element.data('toastr-hide-method') ? element.data('toastr-hide-method') : 'fadeOut'
                };
                toastr[type](message, title, options);
            });


        })();

        /***/
    }),

    /***/
    23:
    /*!****************************************!*\
      !*** multi ./src/js/plugins/toastr.js ***!
      \****************************************/
    /*! no static exports found */
    /***/
        (function(module, exports, __webpack_require__) {

        module.exports = __webpack_require__( /*! /Users/demi/Documents/GitHub/admin-flowdash/src/js/plugins/toastr.js */ "./src/js/plugins/toastr.js");


        /***/
    })

    /******/
});