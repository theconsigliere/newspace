import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
import _, { keys } from 'lodash'
gsap.registerPlugin(ScrollTrigger)


import Header from 'components/Header'
import Preloader from 'components/Preloader'
import Scroll from 'components/Scroll'

//blocks
import FAQ from 'blocks/page/Faq'
import Timeline from 'blocks/page/Timeline'
import Services from 'blocks/page/Services'
import Welcome from 'blocks/page/Welcome'
import Testimonials from 'blocks/page/Testimonials'
import PortfolioBlock from 'blocks/page/Portfolio'
import Gallery from 'blocks/page/Gallery'
import Parallax from 'blocks/page/Parallax'

// Hero
import Boxed from 'blocks/hero/Boxed'
import Service from 'blocks/hero/Service'



//pages
import Portfolio from 'pages/Our-Portfolio'


class App {
    constructor () {
        this.createContent()
        this.createPreloader()
        this.createHero()
        this.createBlocks()
        this.addEventListeners()
    }

    createContent() {
        this.scrollWrapper = document.querySelector('.locomotive-scroll-container')
        this.smoothScroll = new Scroll({ container: this.scrollWrapper })

        this.header = new Header({  scroll: this.smoothScroll, container: this.scrollWrapper })

        this.preloaderInView = document.querySelector('.pre_loader')
        this.body = document.querySelector('body')
    }

    createPreloader () {
        if (this.preloaderInView ) {
            this.preloader = new Preloader()
         //   this,preloader.once('completed', this.onPreloaded.bind(this))
        }
    }


    onPreloaded () {
      // this doesn't work
        this.preloader.destroy()
    }

    createHero() {
        // only one hero per page so don't have to check for activating multiple heros

        this.heros = {
            boxed: new Boxed(),
            service: new Service()
        }


        this.currentHero = document.querySelector('[data-hero]')

        if (this.currentHero) {
            this.currentHeroValue = this.currentHero.getAttribute('data-hero')
            const selectors = Object.keys(this.heros); //get keys from object as an array


            selectors.forEach((hero) => {

            if (this.currentHeroValue.includes(hero) ) {
                //  console.log(this.heros[hero])
                this.heros[hero].create()
            } 
            
            // else {
                // console.log('no matches')
            // }
        })

        }

    }

    createBlocks() {
        // add all gutenberg blocks with js
        this.blocks = {
            faq: new FAQ(),
            timeline: new Timeline(),
            services: new Services(),
            welcome: new Welcome(),
            testimonials: new Testimonials(),
            portfolio: new PortfolioBlock(),
            gallery: new Gallery(),
            parallax: new Parallax()
        }
        
        // check how many blocks are on page load
        this.dataBlocks = [...document.querySelectorAll('[data-block]')]
        this.blocksOnPage = []
       
        // check each blocks on page and grab their classname
        this.dataBlocks.forEach(entry => {
            const classname = '.' + entry.getAttribute('data-block')
            this.blocksOnPage.push(classname)
        })

        
        // create array of blocks functions
        for ( const [block, value ] of Object.entries(this.blocks)) {

      //  console.log(this.blocksOnPage, value.selector)
            
            if ( _.includes(this.blocksOnPage, value.selector)) {
                  //  console.log('this is true' + value.selector)
                 console.log(`this block is on the page ${block}`)

                    // create block on page
                    this.blocks[block].create({ scroll: this.smoothScroll, container: this.scrollWrapper })
                    // enable gutenberg for blocks on the page
            } else {
              //  console.log('no blocks on this page')
            }       
        }

       // if no blocks on the page, run createPages
        if (!this.blocksOnPage.length) {
            this.createPages()
        }
    }

    createPages() {

     //   console.log('this is a page')
     
        this.pages = {
            portfolio: new Portfolio()
        }
            
        // add a if statement for each page
       if ( this.body.classList.contains('our-portfolio') ) {
         this.pages.portfolio.create({ scroll: this.smoothScroll, container: this.scrollWrapper, header: this.header })
       } else {
         //  console.log('no pages here')
       }

    


    }

    addEventListeners() {



       this.smoothScroll.scroll.on('scroll', this.smoothScroll.isScrolling.bind(this))

        // each time the window updates, we should refresh ScrollTrigger and then update LocomotiveScroll. 
        ScrollTrigger.addEventListener("refresh", () => this.smoothScroll.scroll.update());

    }
}

const website = new App()





