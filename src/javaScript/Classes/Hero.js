import each from 'lodash/each'

export default class Hero {
    constructor ({ heroID, heroClassname, heroItems}) {
        this.id = heroID
        this.selector = heroClassname
        this.items = {
            ...heroItems
        }
       
    } 

    create () {

        this.element = document.querySelector(this.selector)

        this.heroItems = {}


        each(this.items, (entry, key) => {

            if (entry instanceof window.HTMLElement || entry instanceof window.NodeList || Array.isArray(entry)) {
                this.heroItems[key] = entry
            } else {
                this.heroItems[key] = [...document.querySelectorAll(entry)]

                if (this.heroItems[key].length === 0) {
                    this.heroItems[key] = null
                } else if (this.heroItems[key].length === 1) {
                    this.heroItems[key] = document.querySelector(entry)
                }
            }
        })

    }

    onResize () {
        
    }

}