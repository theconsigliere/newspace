

class Slider {
  constructor( slider ) {
    this.dom = {};
    this.dom.el = slider.querySelector('.js-slider');
    this.dom.container = this.dom.el.querySelector('.js-container');
    this.dom.items = this.dom.el.querySelectorAll('.js-item');
    this.dom.images = this.dom.el.querySelectorAll('.js-img-wrap');
    this.dom.headings = this.dom.el.querySelectorAll('.js-heading');
    this.dom.buttons = this.dom.el.querySelectorAll('.js-button');
    this.dom.progressWrap = this.dom.el.querySelector('.js-progress-wrap');
    this.dom.progress = this.dom.el.querySelector('.js-progress');
    this.dom.content = document.querySelector('.js-content');

    this.state = {
      open: false,
      scrollEnabled: false,
      progress: 0,
    };
  }

  setCache() {
    this.items = [];
    [...this.dom.items].forEach((el) => {
      const bounds = el.getBoundingClientRect();

      this.items.push({
        img: el.querySelector('img'),
        bounds,
        x: 0,
      });
    });
  }

  render = () => {
   // if (constants.isDevice) return;

  // console.log(last)

  

    const scrollLast = lastScroll.y;

    this.items.forEach((item) => {
      const { bounds } = item;
      const inView = scrollLast + window.innerWidth >= bounds.left && scrollLast < bounds.right;

      if (inView) {
        const min = bounds.left - window.innerWidth;
        const max = bounds.right;
        const percentage = ((scrollLast - min) * 100) / (max - min);
        const newMin = -(window.innerWidth / 12) * 3;
        const newMax = 0;
        item.x = ((percentage - 0) / (100 - 0)) * (newMax - newMin) + newMin;

        item.img.style.transform = `translate3d(${item.x}px, 0, 0) scale(1.75)`;
      }
    });

    if (this.state.scrollEnabled) {
      const min = 0;
      const max = -instances.scroll.state.bounds.width + window.innerWidth;
      this.state.progress = ((instances.scroll.state.last - min) * 100) / (max - min) / 100;

      this.dom.progress.style.transform = `scaleX(${this.state.progress})`;
    }
  }


  handleResize = () => {
    this.setCache();
  }

  addListeners() {
    window.addEventListener('resize', this.handleResize);
  }

  init() {
    gsap.ticker.add(this.render);
    this.setCache();
    this.addListeners();
  }
}


