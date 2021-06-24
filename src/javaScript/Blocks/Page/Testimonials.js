import Block from "../../Classes/Block";
// core version + navigation, pagination modules:
import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';

// configure Swiper to use modules
Swiper.use([Navigation, Pagination, Autoplay]);

// import Swiper styles
// import 'swiper/swiper-bundle.css';

export default class Testimonials extends Block {
    constructor () {

        super({
            id: 'ns-testimonial',
            blockClassname: '.ns-testimonial',
            blockItems: {
                slider: '.swiper-container',
                items: '.testimonial__item',
                quotes: '.testimonial__quote',
                names: '.testimonial__name',
                companies: '.testimonial__name',
            }
        })
    }

    create ({ scroll, container}) {
        super.create()
        this.init()

        this.scroll = scroll
        this.container = container

    }


    swiperInit () {

        this.swiper = new Swiper(this.blockItems.slider, {
          slidesPerView: 1,
          spaceBetween: 30,
          simulateTouch: true,
          loop: true,
          pagination: {
            el: ".swiper-pagination",
            clickable: true
          },
          autoplay: {
            delay: 2500,
            disableOnInteraction: false
          },

          });

    }






  init () {

  this.swiperInit()



}


}

