import gsap from 'gsap'
import Component from "../Classes/Component"


export default class Header extends Component {

    constructor ({ container }) {

      super({
        element: 'header',
        elements: {
            toggleIcon: 'header .menu_toggle',
            logo: 'header .logo-container',
            button: 'header .h-top-button',
            pageBackground : '.page-cover',
            page : '.page-cover .page-in-full',
            fullscreenHeader : 'header .fullscreen-nav-js',
            bottomLayer : 'header .fn-nav-inner',
            topLayer : 'header .fn-nav-inner-top-layer',
            columns : 'header .fullscreen-nav-js .inner-fs-column',
            socials : 'header .fullscreen-nav-js .button-social-menu-item',
            line : 'header .homepage-line',
            menuItems : 'header .fullscreen-nav-js .fc_menu-item',
            menuItemsUnderlines : 'header .fullscreen-nav-js .fc-underline-inner',
            imageArea : ' header .fullscreen-nav-js.js-fc-image-area',
            imageAreaMask : 'header .fullscreen-nav-js.js-fc-image-area .fc-image-area-mask',
            imageAreaImg : 'header .fullscreen-nav-js.js-fc-image-area .fc-image-area-mask img',
            menuItemsWithSubMenu : 'header .fullscreen-nav-js .fc-menu-has-children'
        },
        scrollContainer : container
    })

  
      // run 
      this.init()
  
    }

    init () {

      super.create()

      // run 
      this.init()
  
      // Hide menu on page load
      window.setTimeout(() => {
        this.elements.fullscreenHeader.classList.remove('js-nav-hide')
      }, 1000);
     
      gsap.set([this.elements.fullscreenHeader, this.elements.socials], { autoAlpha:0})
      gsap.set(this.elements.imageArea, { xPercent: -110 })
      gsap.set(this.elements.imageAreaMask, { xPercent: 110 })
  
      gsap.set(this.elements.menuItemsUnderlines, {xPercent:-100})
      gsap.set([this.elements.bottomLayer, this.elements.topLayer], {  height: 0, transformOrigin: "right top" })
      gsap.set(this.elements.menuItems, {autoAlpha: 0, yPercent: -100})
  
      this.eventListeners()
    }
  
    runMenu () {
  
          // close menu if already open
          if (this.menuOn == false ) {
            this.closeMenu()
            return
          }
  
        this.openMenu()
    }
  
  
    openMenu () {
  
      this.elements.toggleIcon.disabled = true
  
      // make sure logo can be seen
      this.elements.toggleIcon.classList.remove('white_toggle')
      this.elements.logo.classList.remove('white_letter')
      this.elements.button.classList.remove('white_background')
  
  
      // remove line as soon as nav is used
      gsap.to( this.elements.line,{ yPercent: 110, duration: 0.6, ease: "back.inOut(1.7)", transformOrigin: 'top'})
  
  
      let tIn = gsap.timeline({ onComplete: () => {
              // when timeline has run
              this.elements.toggleIcon.disabled = false
          }
      })
  
  
      tIn
       // background fades in
      .to(this.elements.fullscreenHeader, {autoAlpha: 1, duration:0.1, xPercent: 0} )
      .to([this.elements.bottomLayer, this.elements.topLayer], {
        duration: 0.8,
        height: '100%',
      //  skewY: 2,
        ease: "power3.inOut",
        stagger: {
          amount: 0.1
        }
      })
     // .to([this.elements.bottomLayer, this.elements.topLayer], { skewY: 0, height:'100%', duration:0.1})
      .to(this.elements.menuItems.reverse(), {yPercent:0, duration:0.6, stagger: 0.15, autoAlpha: 1,  ease: "power4.out"}, '-=0.6')
      .to([this.elements.imageArea, this.elements.imageAreaMask], {xPercent:0, duration:0.6, ease: "power4.out"}, '-=0.8')
      .to(this.elements.menuItemsUnderlines.reverse(), {xPercent:0, duration:0.3,  ease: "back.inOut(1.7)", stagger:0.15, autoAlpha:1 }, '-=1')
      .to(this.elements.socials, {autoAlpha: 1, duration:0.2, stagger:0.1, ease: "power4.out"}, '-=1' )
  
    this.elements.toggleIcon.classList.add('toggle_on');
  
    // change checker to false, for next time
    this.menuOn = false
  
  
  
  }

  
  
    closeMenu () {
  
      this.elements.toggleIcon.disabled = true
  
          let tOut = gsap.timeline({ onComplete: () => {
            // when timeline has run
            this.elements.toggleIcon.disabled = false
          } })
  
          tOut
          .to(this.elements.imageArea, {xPercent:-110, duration:0.6, ease: "power4.out"})
          .to(this.elements.imageAreaMask, {xPercent:110, duration:0.6, ease: "power4.out"}, 0)
          .to(this.elements.socials, {duration:0.3, stagger: 0.1, autoAlpha: 0,  ease: "power3.inOut"}, '-=0.6')
          .to(this.elements.menuItems, {yPercent:-100, duration:0.3, stagger: 0.1, autoAlpha: 0,  ease: "power3.inOut"}, '-=0.6')
          .to(this.elements.menuItemsUnderlines, {xPercent:-100, duration:0.3, stagger: 0.1, autoAlpha: 0,  ease: "power3.inOut"}, "-=1")
  
            .to([this.elements.topLayer, this.elements.bottomLayer], {
              duration: 0.8,
              height: 0,
              ease: "power3.inOut",
              stagger: {
                amount: 0.07
              },
              onComplete: ()=> {
                // check if hero is underneath, if it is make logo white
                if (this.scrollContainer.scroll.els.hero.class === 'is-inview') {
                  this.elements.toggleIcon.classList.add('white_toggle')
                  this.elements.logo.classList.add('white_letter')
                  this.elements.button.classList.add('white_background')
                }   
             } 
            },'-=0.4')
            .to(this.elements.fullscreenHeader, {autoAlpha:0, duration:0.1})
  
  
          this.elements.toggleIcon.classList.remove('toggle_on')
  
  
  
        
  
          // change checker to true, to run next time
          this.menuOn = true
  
    }
  
  
    mousein (event) {
  
      // get menu item image
      const image = event.target.getAttribute('data-image')
  
      // replace imagearea image with new image
      this.imageAreaImg.srcset = image
  
  
    }
  
    showSubMenu(event) {
  
  
      const item = event.target
  
      if (item.classList.contains('fc-round-outer-plus')) {
  
        console.log(item.parentElement)
  
        const subMenu = item.parentElement.parentElement
  
        event.preventDefault()
        item.classList.toggle('menu-icon-rotate')
        subMenu.classList.toggle('fc-sub-menu-show')
  
      }
    }
  
    eventListeners() {
  
      // add event listener to toggle menu button
      this.elements.toggleIcon.addEventListener('click', this.runMenu.bind(this))
  
  
      this.elements.menuItems.forEach(item => {
        item.addEventListener('mouseenter', this.mousein.bind(this))
       // item.addEventListener('mouseout', this.mouseout.bind(this))
      });
  
      this.elements.menuItemsWithSubMenu.forEach(item => {
        item.addEventListener('click', this.showSubMenu.bind(this))
      })
  
    }
  
  }
  

  
  