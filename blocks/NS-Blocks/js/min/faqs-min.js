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

// TODO! Collapse all FAQ'S when clicking on new top-link
var FAQmenu = /*#__PURE__*/function () {
  function FAQmenu(options) {
    _classCallCheck(this, FAQmenu);

    this.faqBar = options.menu;
    this.faqAnswers = options.answers;
    this.innerFaqBar = this.faqBar.querySelector('.ns-nav-faqs');
    this.faqQuestions = _toConsumableArray(this.innerFaqBar.querySelectorAll('.faq-sm-link'));
    this.faqTopLevel = _toConsumableArray(this.innerFaqBar.querySelectorAll('.top-level details'));
    this.stages = _toConsumableArray(this.faqAnswers.querySelectorAll('.faq-qa-item'));
    this.lastStage = this.stages.length - 1; // init menu

    this.init();
  }

  _createClass(FAQmenu, [{
    key: "linkTo",
    value: function linkTo() {
      var _this = this;

      this.stages.forEach(function (stage) {
        // when we click on a link scroll to that section
        _this.faqQuestions.forEach(function (link) {
          var target = link.getAttribute('href');
          link.addEventListener('click', function (e) {
            e.preventDefault(); // use loco scroll to scroll to section

            locoScroll.scrollTo(target, {
              offset: -halfHeight(stage)
            });
          });
        });
      });
    }
  }, {
    key: "collapse",
    value: function collapse() {
      var _this2 = this;

      // close all tabs when opening a new tab
      // Add the onclick listeners.
      this.faqTopLevel.forEach(function (targetDetail) {
        targetDetail.addEventListener("click", function () {
          // Close all the details that are not targetDetail.
          _this2.faqTopLevel.forEach(function (detail) {
            if (detail !== targetDetail) {
              detail.removeAttribute("open");
            }
          });
        });
      });
    }
  }, {
    key: "fixInPlace",
    value: function fixInPlace() {
      // pin scroll-box
      ScrollTrigger.create({
        trigger: this.faqBar,
        start: "top top+=10%",
        endTrigger: this.stages[this.lastStage],
        end: "center center",
        scroller: scrollContainer,
        pin: true
      });
    }
  }, {
    key: "init",
    value: function init() {
      this.fixInPlace();
      this.collapse();
      this.linkTo();
    }
  }]);

  return FAQmenu;
}();

//# sourceMappingURL=faqs-min.js.map
