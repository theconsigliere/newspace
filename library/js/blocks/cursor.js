const cursor = document.querySelector('.js-ns-cursor')
const section = document.querySelector('.ns-slider__section')

section.addEventListener('mousemove', function (e) {


  cursor.classList.add('show-cursor')
  const size = cursor.getBoundingClientRect()

  cursor.style.left = e.pageX + 'px';
  cursor.style.top = e.pageY + 'px';




//  console.log( 'mouse position ' + event.clientX, event.clientY)

//  gsap.to( cursor, {
//   x: (event.clientX - (size.width * 3)),
//   y: (event.clientY - (size.width * 3))
// });

//  console.log( 'corsur position ' + size.x, size.y)





// cursor.setAttribute('style', `top: ${event.pageY - (size.width / 2 )}px; left: ${event.pageX - (size.height / 2)}px;`)





})

section.addEventListener('mouseout', function(event) {

     cursor.classList.remove('show-cursor')

})

// section.addEventListener('mousedown', function(event) { 
//   // simulating hold event

//  gsap.to(cursor, { scale: 0.8, ease: 'power4.inout', duration: 0.5 })

// });
