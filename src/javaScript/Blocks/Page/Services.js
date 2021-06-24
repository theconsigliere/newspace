import Block from "../../Classes/Block";
import gsap from "gsap";

export default class Services extends Block {
    constructor () {

        super({
            id: 'ns-slider',
            blockClassname: '.ns-slider',
            blockItems: {
                cards: '.types__card',
                backgroundImages: '.types__img',
                cardImages: '.card__bg',
                cardContent: '.card__content'
            }
        })
    }

    create ({ scroll, container}) {
        super.create()
        this.init()

        this.scroll = scroll
        this.container = container

    }

    eventListeners() {

      //  console.log(this.blockItems.cards)

        this.blockItems.cards.forEach(card => {
          card.addEventListener('mouseenter', this.mousein.bind(this))
          card.addEventListener('mouseout', this.mouseout.bind(this))
        });
    
      }

      mousein (event) {

        const target =  event.target
        // hide all cards
         this.blockItems.cardImages.forEach(image => {image.style.opacity = 0})
         // hide all title
         this.blockItems.cardContent.forEach(content => {content.style.opacity = 0})
      
        // show current card
         target.querySelector('.card__bg').style.opacity = 1
      
         // show matching background image
         for (let i = 0; i < this.blockItems.backgroundImages.length; i++) {
          if ( this.blockItems.backgroundImages[i].dataset.title == target.dataset.title){
            this.blockItems.backgroundImages[i].style.opacity = 0.5
            this.blockItems.cardContent[i].style.opacity = 1
         }
        
        }
      
      }
      
        mouseout(card) {
      
          this.blockItems.cardImages.forEach(image => {image.style.opacity = 1})
          this.blockItems.backgroundImages.forEach(image => {image.style.opacity = 0})
          this.blockItems.cardContent.forEach(content => {content.style.opacity = 1})
        
        }




  init () {

    this.eventListeners()



}


}

