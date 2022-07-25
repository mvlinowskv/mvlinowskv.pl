/*Open Menu mobile */
 
// function OpenMenu() {
//   var checkbox = document.getElementById("menu-btn");
//   var menu = document.getElementById("navbarResponsive");
 
//   if(checkbox.checked) {
//     menu.style.left = 0;
//     menu.style.top = "0rem";
//   } else {
//     menu.style.left="-100vw";
//     menu.style.top = "0rem";
//   }

//   console.log("dziala");
// }



document.addEventListener('click', function(event){
  let nav = document.querySelector('nav');
  
  if (event.target.closest('.btn-menu')) {
      nav.classList.add('open');
      
  }

  if (event.target.closest('.container-menu')) {
    nav.classList.remove('open');
  }

  if (event.target.closest('.btn-menu-close')) {
    if(nav.classList.contains('open')){
        nav.classList.remove('open');
    }
  }



  // 
  

  console.log("dziala");


});
