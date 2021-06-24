"use strict";

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var PortfolioSlider = /*#__PURE__*/function () {
  function PortfolioSlider(options) {
    _classCallCheck(this, PortfolioSlider);

    locoScroll.destroy();
    this.horizonScroll = new LocomotiveScroll({
      el: scrollContainer,
      smooth: true,
      direction: 'horizontal'
    });

    this.map = function (x, a, b, c, d) {
      return (x - a) * (d - c) / (b - a) + c;
    };

    this.clamp = function (num, min, max) {
      return num <= min ? min : num >= max ? max : num;
    };

    this.progressBar = document.querySelector('.inner-pb');
    this.scroll = {
      cache: 0,
      current: 0
    };
    this.images = _toConsumableArray(document.querySelectorAll('.blog__image')); // portfolio page info

    this.page = document.querySelector('.portfolio-our-projects-m');
    this.pageInner = this.page.querySelector('.inner-pp-section');
    this.scrollItems = _toConsumableArray(this.pageInner.querySelectorAll('.pp__item'));
    this.horizonScroll.update(); // init menu

    this.init();
  }

  _createClass(PortfolioSlider, [{
    key: "fadeIn",
    value: function fadeIn() {
      var _this = this;

      setTimeout(function () {
        // fade them in up and in one by one
        gsap.to(_this.scrollItems, {
          yPercent: 0,
          duration: 1.2,
          stagger: 0.6,
          autoAlpha: 1,
          ease: "power1.easeIn"
        });
      }, 500);
    }
  }, {
    key: "eventListeners",
    value: function eventListeners() {
      // add event listener to toggle menu button
      document.addEventListener('DOMContentLoaded', this.fadeIn.bind(this));
    }
  }, {
    key: "init",
    value: function init() {
      var _this2 = this;

      // set all scrollitems to invisible
      gsap.set(this.scrollItems, {
        autoAlpha: 0,
        yPercent: 25
      });
      this.eventListeners();
      this.horizonScroll.on('scroll', function (obj) {
        console.log(obj.currentElements);
        _this2.scroll.current = obj.scroll.x;
        var distance = _this2.scroll.current - _this2.scroll.cache;
        _this2.scroll.cache = _this2.scroll.current;

        var skewVal = _this2.map(distance, -50, 50, -15, 15); //    this.images.forEach(el => el.style.transform = 'skewX('+ this.clamp(skewVal, -3, 3)+'deg)');


        console.log('how muc we scrolled ' + obj.scroll.x + 'how much too scroll' + obj.limit.x); //update progress bar with width using gsap utility
        // map range from pixels to 100

        var widthToProgress = gsap.utils.mapRange(0, obj.limit.x, 0, 100);
        var howMuchScrolled = widthToProgress(obj.scroll.x);
        _this2.progressBar.style.width = "".concat(howMuchScrolled, "%");
        console.log(howMuchScrolled);

        for (var _i = 0, _Object$keys = Object.keys(obj.currentElements); _i < _Object$keys.length; _i++) {
          var key = _Object$keys[_i];

          if (obj.currentElements[key].el.classList.contains('pp-item-block__inner')) {
            var progress = obj.currentElements[key].progress;
            var brightnessVal = progress < 0.5 ? _this2.clamp(_this2.map(progress, 0, 0.5, 0, 1), 0.2, 1) : _this2.clamp(_this2.map(progress, 0.5, 1, 1, 0), 0.2, 1);
            obj.currentElements[key].el.style.filter = "opacity(".concat(brightnessVal, ")");
          }
        }
      });
      this.horizonScroll.update();
    }
  }]);

  return PortfolioSlider;
}();

//# sourceMappingURL=portfolio-min.js.map
