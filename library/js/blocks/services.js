



// class

class Services {

  constructor (options) {
    this.container = options.container
    this.cards =  Array.from(this.container.querySelectorAll('.types__card'))
    this.backgroundImages = Array.from(this.container.querySelectorAll('.types__img'))
    this.cardImages = this.container.querySelectorAll('.card__bg')
    this.cardContent = this.container.querySelectorAll('.card__content')

    // run the app
    this.init()

  }

  mousein (event) {


  const target =  event.target
  // hide all cards
   this.cardImages.forEach(image => {image.style.opacity = 0})
   // hide all title
   this.cardContent.forEach(content => {content.style.opacity = 0})

  // show current card
   target.querySelector('.card__bg').style.opacity = 1

   // show matching background image
   for (let i = 0; i < this.backgroundImages.length; i++) {
    if ( this.backgroundImages[i].dataset.title == target.dataset.title){
      this.backgroundImages[i].style.opacity = 0.5
      this.cardContent[i].style.opacity = 1
   }
  
  }

}

  mouseout(card) {

    this.cardImages.forEach(image => {image.style.opacity = 1})
    this.backgroundImages.forEach(image => {image.style.opacity = 0})
    this.cardContent.forEach(content => {content.style.opacity = 1})
  
  }

  eventListeners() {

    this.cards.forEach(card => {
      card.addEventListener('mouseenter', this.mousein.bind(this))
      card.addEventListener('mouseout', this.mouseout.bind(this))
    });

  }

  init() {
    this.eventListeners()
  }

}

const servicesSection = document.querySelector('.ns-types')

const Homepage = new Services({ container: servicesSection })



