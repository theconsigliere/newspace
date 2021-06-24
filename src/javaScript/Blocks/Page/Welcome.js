import Block from "../../Classes/Block";
import { gsap, ScrollTrigger, DrawSVGPlugin, SplitText } from "gsap/all";
gsap.registerPlugin(ScrollTrigger, DrawSVGPlugin, SplitText)


export default class Welcome extends Block {
    constructor () {

        super({
            id: 'welcome__scroll',
            blockClassname: '.welcome__scroll',
            blockItems: {
                pin: '.welcome__scroll__info',
                slides: '.ws__box',
                logo: '.welcome__symbol svg path',
                titles: '.ws__title',
                descs: '.welcome__slide_desc',
                titleDescs: '.pn__page__title',
                buttons: '.welcome__title__choice .text-button',
                pipe: '.ws__box .pipe .pipe-inner'
            }
        })

      

        
    }

    create ({ scroll, container}) {
        super.create()


        this.scroll = scroll
        this.container = container


        // hide everything
       
        this.titles =  new SplitText(this.blockItems.titles, {type: "lines", linesClass: "lineChild"});
        this.innerTitles =  new SplitText(this.blockItems.titles, {type: "lines", linesClass: "lineParent"});
        this.descs =  new SplitText(this.blockItems.descs, {type: "lines", linesClass: "lineChild"});
        this.innerDescs =  new SplitText(this.blockItems.descs, {type: "lines", linesClass: "lineParent"});

        gsap.set(this.blockItems.logo, { drawSVG: "0%"})
        gsap.set([this.titles.lines, this.blockItems.pipe, this.descs.lines], { yPercent: 100})
        gsap.set([ this.blockItems.buttons, this.blockItems.titleDescs], { autoAlpha: 0})

        this.init()
        this.onResize()

    }

    fix() {

        ScrollTrigger.create({
            trigger: this.blockItems.pin,
            start: "top top",
            endTrigger: this.blockItems.slides[this.blockItems.slides.length - 1],
            end: "center center",
            pin: true
           // markers: true
    })


    }

    animateIn() {




       
        this.blockItems.slides.forEach((slide, index) => {

            

           const backgroundColour =  slide.getAttribute('data-colour');
           const logo = slide.querySelector('.welcome__symbol svg path')
           const titles = slide.querySelectorAll('.ws__title .lineChild')
           const descs = slide.querySelectorAll('.welcome__slide_desc .lineChild')
           const button = slide.querySelector('.text-button')
           const pipe = slide.querySelector('.pipe-inner')


           // split into lines

          // console.log(titles, descs)

        //    if (titles.lines || descs.lines) {
        //     gsap.set([titles.lines[index], descs.lines[index]], { yPercent: -100})
        //    }
           
         
  

           
            this.animationIn = gsap.timeline({
                defaults: {
                    duration: 0.8,
                  //  ease: "back.inOut(1.7)"
                  ease: 'expo.out'
                },
                // add scrolltrigger to timelinex
                scrollTrigger:{
                    trigger: slide,
                    start:"center bottom",
                    end:"bottom bottom",
                    toggleActions:"play pause restart reset",
                  //  markers: true,
                    scrub: true
                }

            })

            if (slide.classList.contains('ws__box__slide__desc')) {
                this.animationIn
                    .to(this.blockItems.pin, { backgroundColor: backgroundColour })
                    .to(logo, { drawSVG: "100%"})
                    .to(descs, { yPercent: 0, stagger: '0.3'})

            //    .to([this.titles.words, this.descs.words], {autoAlpha: 1, stagger: 0.1, yPercent: '0%'})
            }



            if (slide.classList.contains('ws__box__slide__title')) {
                this.animationIn
                    .to(this.blockItems.pin, { backgroundColor: backgroundColour })
                    .to(logo, { drawSVG: "100%"})
                    .to(titles, { yPercent: 0, stagger: '0.3'})
                    .to([button], {autoAlpha: 1})
                    .to(pipe, { yPercent: 0, duration: 0.4, ease: "back.inOut(1.7)" })
                   
            }

          // FADE OUT SLIDE WHEN OUT OF VIEW

        gsap.to(slide, {
            autoAlpha: 0,
            scrollTrigger:{
                trigger: slide,
                start:"center+=25% center",
                end:"bottom center",
                toggleActions:"play pause restart reset",
              //  markers: true,
                scrub: true
            }
        })






            
        })

               // FADE LAST STAGE OUT

               gsap.to(this.blockItems.pin, {
                autoAlpha: 0,
                scrollTrigger:{
                    trigger: this.blockItems.slides[this.blockItems.slides.length - 1],
                    start:"center center",
                    end:"center+=25% center",
                    toggleActions:"play pause restart reset",
                 //   markers: true,
                    scrub: true
                }
            })
    }

   




        onResize () {
        
        }
  


    init() {
        this.fix()
        this.animateIn()


      // FOR EACH SLIDE    
      // Logo fade in, line in, on scroll logo fade out and line in   
      //  first slide text, description and button fade in 
    }

}