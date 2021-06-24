gsap.registerPlugin(ScrollTrigger)

//variables

const scrollContainer = document.querySelector('.locomotive-scroll-container')
const timelineBlock = document.querySelectorAll('.case-kit')
const faqNav = document.querySelector('.ns-faq-main-nav')
const faqAnswers = document.querySelector('.faq-qa-inner')
const withParallax = gsap.utils.toArray(".with-parallax")
const ourPortfolioPage = document.querySelector('.portfolio-our-projects-m')

let lastScroll = 0


// Locomotive Scroll
//---------------------------------------------------------------------------------------------------------


const locoScroll = new LocomotiveScroll({
    el: scrollContainer,
    smooth: true,
    getDirection: true,
    direction: 'vertical'
  }); 


  // each time Locomotive Scroll updates, tell ScrollTrigger to update too (sync positioning)
  locoScroll.on("scroll", ScrollTrigger.update);

    // when we scroll with locomotive scroll update scrolltrigger
  // locoScroll.on("scroll", ScrollTrigger.update);

  ScrollTrigger.scrollerProxy(scrollContainer, {
      scrollTop(value) {
        return arguments.length ? locoScroll.scrollTo(value, 0, 0) :    locoScroll.scroll.instance.scroll.y;
  }, // we don't have to define a scrollLeft because we're only scrolling vertically.
  getBoundingClientRect() {
  return {top: 0, left: 0, width: window.innerWidth, height: window.innerHeight};
  },
  // LocomotiveScroll handles things completely differently on mobile devices - it doesn't even transform the container at all! So to get the correct behavior and avoid jitters, we should pin things with position: fixed on mobile. We sense it by checking to see if there's a transform applied to the container (the LocomotiveScroll-controlled element).
  pinType: scrollContainer.style.transform ? "transform" : "fixed"
  });


  locoScroll.on("scroll", function (args) {

    // onscroll remove line from header
    const line = document.querySelector('.homepage-line')

    if (line) {
        gsap.to( line,{ yPercent: 110, duration: 0.3, ease: "back.inOut(1.7)", transformOrigin: 'top'})
    }


    const hero = args.currentElements['hero']
    const header = document.querySelector('header')
    const menuToggle = document.querySelector('.menu_toggle')
    const logo = document.querySelector('.logo-container')
    const button = document.querySelector('.h-top-button')



    if (hero) {

      if (hero.el.classList.contains('basic-hero')) {
        header.classList.add('header-frosted-js')
        return
      }
      
      // if hero make logo white 

      if (hero.progress >= 0.8) {
        header.classList.add('header-frosted-js')
        menuToggle.classList.remove('white_toggle')
        logo.classList.remove('white_letter')
        button.classList.remove('white_background')

      } else {
        menuToggle.classList.add('white_toggle')
        header.classList.remove('header-frosted-js')
        logo.classList.add('white_letter')
        button.classList.add('white_background')

      }

      hero.progress >= 0.8 ?  header.classList.add('header-frosted-js') :  header.classList.remove('header-frosted-js')
    }



   // console.log(args)

  });



  //---------------------------------------------------------------------------------------------------------

// HELPER STUFF


    // get viewport height
    const getVh = () => {
      const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
      return vh;
  }

  // about half height
 const halfHeight = (item) => {
      const height = (item.clientHeight / 2 ) - item.clientHeight * 0.2
   // console.log(height)

      return height
      
    }

//----------------------------------------------------------------------------------------------------------




    // Gutenberg blocks
    //----------------------------------------------------------------------------------------------------------



    if (withParallax) {

      withParallax.forEach(section => {
        //get the image from each section
        const image =  section.querySelector("img")
    
        //create tween for the image parallax effeckt
        gsap.to(image, { 
          yPercent: 25,
          ease: "none",
        
          scrollTrigger: {
            trigger: section,
            start: "top center+=20%",
            end: "bottom top",
            scrub: true,
            scroller: scrollContainer
          }
        })
      }) //end with parallax
    }


    if (timelineBlock) {

      timelineBlock.forEach(block => {

          // variables
          const pinSteps = block.querySelector('.scroll-tab')
          const stages = gsap.utils.toArray(block.querySelectorAll('.ck-stage'))
          const lastStage = stages.length - 1

         // console.log(stages, stages[lastStage])

          // pin scroll-box
          ScrollTrigger.create({
              trigger: pinSteps,
              start: "top center",
              endTrigger: stages[lastStage],
              end: "center center",
              scroller: scrollContainer,
              pin: true

          })

          stages.forEach((stage, index) => {
              const links = gsap.utils.toArray(pinSteps.querySelectorAll('.scroll--menu_item'))
              const color = links[index].getAttribute('data-color')
              const title = stage.querySelector('.case__title')
              const desc = stage.querySelector('.case__desc')
              const circle = links[index].querySelector('.inner-circle')
              let newIndex
            

              if (index === 0) {
                newIndex = -1
              } else if (index > 0) {
                newIndex = index - 1
              }



              let tl = gsap.timeline()

              gsap.set(title, { autoAlpha: 0, yPercent: 105})
              gsap.set(desc, { autoAlpha: 0, yPercent: 20})

              tl
                  .to(title, { autoAlpha: 1, yPercent: 0, duration: 1, ease: "Power4.easeOut.easeOut", }, 0)
                  .to(desc, { autoAlpha: 1, yPercent: 0, duration: 1, ease: "Power4.easeOut.easeOut", }, 0.2)
                  .to(circle, { backgroundColor: color, width: '100%', height: '100%', duration: 0.2 }, 0)

              if (newIndex >= 0) {
                const pipe = links[newIndex].querySelector('.inner-pipe')
                tl.to(pipe, {backgroundColor: color, height: '100%', duration: 0.2 }, 0)
              }

                 


             // console.log('link colour is' + color)

              //add active class
              ScrollTrigger.create({
                  trigger: stage,
                  start: 'top center',
                  animation: tl,
                  scroller: scrollContainer,
                  end: () =>`+=${stage.clientHeight+ getVh() / 10}`,
               //   end: () =>`+=${lastStage.clientHeight / 2}`,
                //  markers: true,
                  toggleClass: {
                      targets: links[index],
                      className: "js-tab-visible",
                  }
              })

              // when we click on a link scroll to that section

              links.forEach(link => {
          
                  const target = link.getAttribute('href');
                
          
                  link.addEventListener('click', (e) => {
                      e.preventDefault();
                      // use loco scroll to scroll to section

                      locoScroll.scrollTo(target, {offset: -halfHeight(stage)})
                  });
          
              });
              
          })




      })
  }


// CLASS COMPONENTS
//------------------------------------------------------------------------
if (faqNav) {

  // TODO! Collapse all FAQ'S when clicking on new top-link
class FAQmenu {

  constructor (options) {
      this.faqBar = options.menu
      this.faqAnswers = options.answers
      this.innerFaqBar = this.faqBar.querySelector('.ns-nav-faqs')
      this.faqQuestions = [...this.innerFaqBar.querySelectorAll('.faq-sm-link')]
      this.faqTopLevel = [...this.innerFaqBar.querySelectorAll('.top-level details')]
      this.stages = [...this.faqAnswers.querySelectorAll('.faq-qa-item')]
      this.lastStage = this.stages.length - 1



      // init menu
      this.init()

  }

  linkTo () {


      this.stages.forEach( stage => {

          // when we click on a link scroll to that section

          this.faqQuestions.forEach(link => {

              const target = link.getAttribute('href');
              
      
              link.addEventListener('click', (e) => {
                  e.preventDefault();
                  // use loco scroll to scroll to section
  
                  locoScroll.scrollTo(target, {offset: -halfHeight(stage)})
              });
      
          });

      })



  }

  collapse() {

 // close all tabs when opening a new tab

      // Add the onclick listeners.
      this.faqTopLevel.forEach((targetDetail) => {
          targetDetail.addEventListener("click", () => {
          // Close all the details that are not targetDetail.
          this.faqTopLevel.forEach((detail) => {
              if (detail !== targetDetail) {
              detail.removeAttribute("open");
              }
          });
          });
      });

  }

  fixInPlace () {

          // pin scroll-box
          ScrollTrigger.create({
          trigger: this.faqBar,
          start: "top top+=10%",
          endTrigger: this.stages[this.lastStage],
          end: "center center",
          scroller: scrollContainer,
          pin: true

      })

  }



  init () {

      this.fixInPlace()

      this.collapse()

      this.linkTo()



  }


}


  const faqMenu = new FAQmenu({ menu: faqNav, answers: faqAnswers })
}

if (ourPortfolioPage) {
  class PortfolioSlider {

    constructor (options) {

        locoScroll.destroy()

        this.horizonScroll = new LocomotiveScroll({
            el: scrollContainer,
            smooth: true,
            direction: 'horizontal'
          }); 

          this.map = (x, a, b, c, d) => (x - a) * (d - c) / (b - a) + c;
          this.clamp = (num, min, max) => num <= min ? min : num >= max ? max : num
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


  const portfolioPage = new PortfolioSlider()
}
  


  // last bits of the locomotive scroll
  //-------------------------------------------------------------------------------------------


    // PUT SCROLL TRIGGER + GSAP CODE HERE

    // each time the window updates, we should refresh ScrollTrigger and then update LocomotiveScroll. 
    ScrollTrigger.addEventListener("refresh", () => locoScroll.update());

    // after everything is set up, refresh() ScrollTrigger and update LocomotiveScroll because padding may have been added for pinning, etc.
    ScrollTrigger.refresh();