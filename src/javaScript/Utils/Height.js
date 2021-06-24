// HELPER STUFF

    // get viewport height
    export const getVh = () => {
        const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
        return vh;
    }
  
    // about half height
   export const halfHeight = (item) => {
        const height = (item.clientHeight / 2 ) - item.clientHeight * 0.2
        return height  
   }