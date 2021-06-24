class PortfolioSlider {

    constructor (options) {

        locoScroll.destroy()

        this.horizonScroll = new LocomotiveScroll({
            el: scrollContainer,
            smooth: true,
            direction: 'horizontal'
          }); 

 
          this.progressBar = document.querySelector('.inner-pb')

          this.scroll = {cache: 0, current: 0};
          this.images = [...document.querySelectorAll('.blog__image')]


          // portfolio page info
          this.page = document.querySelector('.portfolio-our-projects-m')
          this.pageInner = this.page.querySelector('.inner-pp-section')
          this.scrollItems = [...this.pageInner.querySelectorAll('.pp__item')]

          this.horizonScroll.update()



                  // init menu
        this.init()




    }

    fadeIn() {

        setTimeout( () => {

       // fade them in up and in one by one
        gsap.to(this.scrollItems, {yPercent:0, duration:1.2, stagger: 0.6, autoAlpha: 1,  ease: "power1.easeIn"})
        }, 500);


 

    }

    eventListeners() {

        // add event listener to toggle menu button
        document.addEventListener('DOMContentLoaded',  this.fadeIn.bind(this))


      }

    init() {

        // set all scrollitems to invisible
        gsap.set( this.scrollItems,{ autoAlpha: 0, yPercent: 25 })

        this.eventListeners()

        this.horizonScroll.on('scroll', (obj) => {

            console.log(obj.currentElements)
            this.scroll.current = obj.scroll.x;
            const distance = this.scroll.current - this.scroll.cache;
            this.scroll.cache = this.scroll.current;
            const skewVal = this.map(distance, -50, 50, -15, 15);

        //    this.images.forEach(el => el.style.transform = 'skewX('+ this.clamp(skewVal, -3, 3)+'deg)');

            console.log('how muc we scrolled ' + obj.scroll.x + 'how much too scroll' + obj.limit.x)

            //update progress bar with width using gsap utility
            // map range from pixels to 100
            let widthToProgress = gsap.utils.mapRange(0, obj.limit.x, 0, 100)
            let howMuchScrolled = widthToProgress(obj.scroll.x)

            this.progressBar.style.width = `${howMuchScrolled}%`

            console.log(howMuchScrolled)


            for (const key of Object.keys(obj.currentElements)) {
                if ( obj.currentElements[key].el.classList.contains('pp-item-block__inner') ) {
                    let progress = obj.currentElements[key].progress;
                    
                    const brightnessVal = progress < 0.5 ? this.clamp(this.map(progress,0,0.5,0,1),0.2,1) : this.clamp(this.map(progress,0.5,1,1,0),0.2,1);
                    obj.currentElements[key].el.style.filter = `opacity(${brightnessVal})`
                }
            }
        });

          this.horizonScroll.update()
    }
}

