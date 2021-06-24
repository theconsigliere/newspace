import Page from "../Classes/Page";
import LocomotiveScroll from 'locomotive-scroll'
import gsap from "gsap";

export default class Portfolio extends Page {
    constructor () {
        super({
            selector: '.portfolio-our-projects-m',
            items: {
                progressBar : '.inner-pb',
                images : '.blog__image',
                page : '.portfolio-our-projects-m',
                pageInner : '.inner-pp-section',
                scrollItems : '.pp__item'
            }
        })

        this.map = (x, a, b, c, d) => (x - a) * (d - c) / (b - a) + c;
        this.clamp = (num, min, max) => num <= min ? min : num >= max ? max : num
        this.newScroll = {cache: 0, current: 0};
    }

    create ({ scroll, container, header}) {
        super.create()
       

        this.scroll = scroll
        this.container = container
        this.header = header

        console.log(this.header)

        this.scroll.scroll.destroy()

        this.horizonScroll = new LocomotiveScroll({
            el: this.container,
            smooth: true,
            direction: 'horizontal'
         }); 

         this.horizonScroll.update()

        // console.log(this.items.lengthSlide.textContent)

        // this.lengthSlide = document.querySelector(this.items.lengthSlide.textContent) 
        // this.currentSlide = document.querySelector(this.items.currentSlide.textContent)

        // this.lengthSlide = `${this.items.scrollItems.length}`

         console.log(this.horizonScroll)
         
        this.init()

    }


    animate(obj) {
       
     //   console.log(obj.currentElements)
        this.newScroll.current = obj.scroll.x;
        const distance = this.newScroll.current - this.newScroll.cache;
        this.newScroll.cache = this.newScroll.current;

    //   const skewVal = this.map(distance, -50, 50, -15, 15);
    //    this.images.forEach(el => el.style.transform = 'skewX('+ this.clamp(skewVal, -3, 3)+'deg)');

    //    console.log('how muc we scrolled ' + obj.scroll.x + 'how much too scroll' + obj.limit.x)

        //update progress bar with width using gsap utility
        // map range from pixels to 100
        let widthToProgress = gsap.utils.mapRange(0, obj.limit.x, 0, 100)
        let howMuchScrolled = widthToProgress(obj.scroll.x)

     //   console.log(this.items.progressBar.offsetWidth)

        document.querySelector(this.items.progressBar).style.width = `${howMuchScrolled}%`

     //   console.log(howMuchScrolled)


        for (const key of Object.keys(obj.currentElements)) {
            if ( obj.currentElements[key].el.classList.contains('pp-item-block__inner') ) {
                let progress = obj.currentElements[key].progress;
                
                const brightnessVal = progress < 0.5 ? this.clamp(this.map(progress,0,0.5,0,1),0.2,1) : this.clamp(this.map(progress,0.5,1,1,0),0.2,1);
                obj.currentElements[key].el.style.filter = `opacity(${brightnessVal})`
                console.log( obj.currentElements[key].id.split('el').join(''))

            //     this.currentSlide = `${obj.currentElements[key].id.split('el').join('')}`
            }
        }
    }


    fadeIn() {

        setTimeout( () => {

       // fade them in up and in one by one
        gsap.to(this.items.scrollItems, {yPercent:0, duration:1.2, stagger: 0.6, autoAlpha: 1,  ease: "power1.easeIn"})
        }, 500);



    }

    eventListeners() {

        // add event listener to toggle menu button
        document.addEventListener('DOMContentLoaded',  this.fadeIn.bind(this))

        this.horizonScroll.on('scroll', this.animate.bind(this))

      }

      setHeader() {
         
      }


    init () {

        this.setHeader()

        // set all scrollitems to invisible
        gsap.set( this.items.scrollItems,{ autoAlpha: 0, yPercent: 25 })

        this.eventListeners()


          this.horizonScroll.update()
      
    }
}


