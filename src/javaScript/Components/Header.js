import gsap from 'gsap'


export default class Header {

    constructor ({ scroll, container }) {
  
      // header
      this.scroll = scroll
      this.container = container
      this.header = document.querySelector('header')


      this.toggleIcon = this.header.querySelector('.menu_toggle');
      this.logo = this.header.querySelector('.logo-container');
      this.button = this.header.querySelector('.h-top-button');
      this.menuOn
     
      this.pageBackground = document.querySelector('.page-cover');
      this.page = this.pageBackground.querySelector('.page-in-full');
  
      // Full screen Nav
      this.fullscreenHeader = this.header.querySelector('.fullscreen-nav-js')
      this.bottomLayer = this.header.querySelector('.fn-nav-inner')
      this.topLayer = this.header.querySelector('.fn-nav-inner-top-layer')
  
      this.columns = this.fullscreenHeader.querySelectorAll('.inner-fs-column')
      this.socials = [...this.fullscreenHeader.querySelectorAll('.button-social-menu-item')]
      this.line = this.header.querySelector('.homepage-line')
      this.menuItems = [...this.fullscreenHeader.querySelectorAll('.fc_menu-item')]
      this.menuItemsUnderlines = [...this.fullscreenHeader.querySelectorAll('.fc-underline-inner')]
  
      this.imageArea = this.fullscreenHeader.querySelector('.js-fc-image-area')
      this.imageAreaMask = this.imageArea.querySelector('.fc-image-area-mask')
      this.imageAreaImg = this.imageAreaMask.querySelector('img')
      this.menuItemsWithSubMenu = [...this.fullscreenHeader.querySelectorAll('.fc-menu-has-children')]
  
      this.openSubMenu = true

      // run 
      this.init()
  
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
  
      this.toggleIcon.disabled = true
  
      // make sure logo can be seen
      this.toggleIcon.classList.remove('white_toggle')
      this.logo.classList.remove('white_letter')
      this.button.classList.remove('white_background')
  
  
      // remove line as soon as nav is used
      gsap.to( this.line,{ yPercent: 110, duration: 0.6, ease: "back.inOut(1.7)", transformOrigin: 'top'})
  
  
      let tIn = gsap.timeline({ onComplete: () => {
              // when timeline has run
              this.toggleIcon.disabled = false
          }
      })
  
  
      tIn
       // background fades in
      .to(this.fullscreenHeader, {autoAlpha: 1, duration:0.1, xPercent: 0} )
      .to([this.bottomLayer, this.topLayer], {
        duration: 0.8,
        height: '100%',
      //  skewY: 2,
        ease: "power3.inOut",
        stagger: {
          amount: 0.1
        }
      })
     // .to([this.bottomLayer, this.topLayer], { skewY: 0, height:'100%', duration:0.1})
      .to(this.menuItems.reverse(), {yPercent:0, duration:0.6, stagger: 0.15, autoAlpha: 1,  ease: "power4.out"}, '-=0.6')
      .to([this.imageArea, this.imageAreaMask], {xPercent:0, duration:0.6, ease: "power4.out"}, '-=0.8')
      .to(this.menuItemsUnderlines.reverse(), {xPercent:0, duration:0.3,  ease: "back.inOut(1.7)", stagger:0.15, autoAlpha:1 }, '-=1')
      .to(this.socials, {autoAlpha: 1, duration:0.2, stagger:0.1, ease: "power4.out"}, '-=1' )
  
    this.toggleIcon.classList.add('toggle_on');
  
    // change checker to false, for next time
    this.menuOn = false
  
  
  
  }

  
  
    closeMenu () {
  
      this.toggleIcon.disabled = true
  
          let tOut = gsap.timeline({ onComplete: () => {
            // when timeline has run
            this.toggleIcon.disabled = false
          } })
  

          console.log(this.smoothScroll.scroll)

          tOut
          .to(this.imageArea, {xPercent:-110, duration:0.6, ease: "power4.out"})
          .to(this.imageAreaMask, {xPercent:110, duration:0.6, ease: "power4.out"}, 0)
          .to(this.socials, {duration:0.3, stagger: 0.1, autoAlpha: 0,  ease: "power3.inOut"}, '-=0.6')
          .to(this.menuItems, {yPercent:-100, duration:0.3, stagger: 0.1, autoAlpha: 0,  ease: "power3.inOut"}, '-=0.6')
          .to(this.menuItemsUnderlines, {xPercent:-100, duration:0.3, stagger: 0.1, autoAlpha: 0,  ease: "power3.inOut"}, "-=1")
          .to([this.topLayer, this.bottomLayer], {
              duration: 0.8,
              height: 0,
              ease: "power3.inOut",
              stagger: {
                amount: 0.07
              },
              onComplete: ()=> {
                // check if hero is underneath, if it is make logo white
                if (this.smoothScroll.scroll.scroll.els.hero.class === 'is-inview') {
                  this.toggleIcon.classList.add('white_toggle')
                  this.logo.classList.add('white_letter')
                  this.button.classList.add('white_background')
                }   
             } 
            },'-=0.4')
            .to(this.fullscreenHeader, {autoAlpha:0, duration:0.1})
  
  
          this.toggleIcon.classList.remove('toggle_on')
  
  
  
        
  
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
  
      // remove all open submenus
      this.menuItemsWithSubMenu.forEach(menuSubmenu => {
        const circle = menuSubmenu.querySelector('.fc-round-outer-plus')

      //  console.log(menuSubmenu, circle)
        menuSubmenu.classList.remove('fc-sub-menu-show')
        circle.classList.remove('menu-icon-rotate')

      })
  

      
      // show selected submenu
      if (item.classList.contains('fc-round-outer-plus')) {
      //  this.subMenus.classList.remove('fc-sub-menu-show')

         event.preventDefault()
        
        const subMenu = item.parentElement.parentElement


          if (item.getAttribute('data-open') === 'open') {
         
            item.classList.remove('menu-icon-rotate')
            subMenu.classList.remove('fc-sub-menu-show')

         //   item.setAttribute('data-open') = 'closed'
            

          } else if (item.getAttribute('data-open') === 'closed' ) {
           
            item.classList.add('menu-icon-rotate')
            subMenu.classList.add('fc-sub-menu-show')
         //   item.setAttribute('data-open') = 'open'

          } else {

            item.classList.add('menu-icon-rotate')
            subMenu.classList.add('fc-sub-menu-show')
         //   item.setAttribute('data-open') = 'open'

          }

      
  
      }
    }
  
    eventListeners(scroll) {

      this.smoothScroll = scroll
  
      // add event listener to toggle menu button
      this.toggleIcon.addEventListener('click', this.runMenu.bind(this))
  
  
      this.menuItems.forEach(item => {
        item.addEventListener('mouseenter', this.mousein.bind(this))
       // item.addEventListener('mouseout', this.mouseout.bind(this))
      });
  
      this.menuItemsWithSubMenu.forEach(item => {
        item.addEventListener('click', this.showSubMenu.bind(this))
      })
  
    }
  
    init () {
  


      // Hide menu on page load
      window.setTimeout(() => {
        this.fullscreenHeader.classList.remove('js-nav-hide')
      }, 1000);

      this.toggleIcon.classList.add('white_toggle')
      this.logo.classList.add('white_letter')
      this.button.classList.add('white_background')
     
      gsap.set([this.fullscreenHeader, this.socials], { autoAlpha:0})
      gsap.set(this.imageArea, { xPercent: -110 })
      gsap.set(this.imageAreaMask, { xPercent: 110 })
  
      gsap.set(this.menuItemsUnderlines, {xPercent:-100})
      gsap.set([this.bottomLayer, this.topLayer], {  height: 0, transformOrigin: "right top" })
      gsap.set(this.menuItems, {autoAlpha: 0, yPercent: -100})
  
      this.eventListeners(this.scroll)
    }
  }
  

  
  