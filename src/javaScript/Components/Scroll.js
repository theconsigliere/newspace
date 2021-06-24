
import locomotiveScroll from 'locomotive-scroll'
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger)


export default class Scroll {
    constructor ({ container }) {

        this.scrollContainer = container

        this.scroll = new locomotiveScroll({
            el: this.scrollContainer,
            smooth: true,
            getDirection: true,
            direction: 'vertical',
            reloadOnContextChange: 'true'
        })

        this.init()

   
    }

    isScrolling () {
        ScrollTrigger.update()
      //  console.log(this)

         // remove line on homepage scroll

       if ( this.header.line ) {
        gsap.to( this.header.line,{ yPercent: 110, duration: 0.3, ease: "back.inOut(1.7)", transformOrigin: 'top'})
       }

       const hero = this.smoothScroll.scroll.scroll.currentElements['hero']

       // if hero in view animate as we scorll


    if (hero) {



        if (hero.el.classList.contains('basic-hero')) {
          this.header.header.classList.add('header-frosted-js')
          return
        }
        
        // if hero make logo white 
  
        if (hero.progress >= 0.8) {
          this.header.header.classList.add('header-frosted-js')
          this.header.toggleIcon.classList.remove('white_toggle')
          this.header.logo.classList.remove('white_letter')
          this.header.button.classList.remove('white_background')
  
        } else {
            this.header.toggleIcon.classList.add('white_toggle')
            this.header.header.classList.remove('header-frosted-js')
            this.header.logo.classList.add('white_letter')
            this.header.button.classList.add('white_background')
  
        }
  
        hero.progress >= 0.8 ?  this.header.header.classList.add('header-frosted-js') :  this.header.header.classList.remove('header-frosted-js')
      }

         // add background to header after scrolling past header


    }

    scrollTo (target, options) {
        return this.scroll.scrollTo(target, { options })
    }

    init () {

        ScrollTrigger.scrollerProxy(this.scrollContainer, {
            scrollTop: (value) => {
                return arguments.length ? this.scroll.scrollTo(value, 0, 0) :    this.scroll.scroll.instance.scroll.y;
            },

            getBoundingClientRect() {
                return {top: 0, left: 0, width: window.innerWidth, height: window.innerHeight};
            },

            // LocomotiveScroll handles things completely differently on mobile devices - it doesn't even transform the container at all! So to get the correct behavior and avoid jitters, we should pin things with position: fixed on mobile. We sense it by checking to see if there's a transform applied to the container (the LocomotiveScroll-controlled element).
            pinType: this.scrollContainer.style.transform ? "transform" : "fixed"
              
        });

    
        ScrollTrigger.defaults({
            scroller: this.scrollContainer
        })

        // after everything is set up, refresh() ScrollTrigger and update LocomotiveScroll because padding may have been added for pinning, etc.
        ScrollTrigger.refresh();

    }


}