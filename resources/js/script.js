let searchbar = document.querySelector('#searchbar');

let input = document.querySelector('#searchbarInput');

let overlay = document.querySelector('#overlay');

input.addEventListener('click', ()=>{
    searchbar.classList.toggle('myWidth')
    overlay.classList.add('overlay')
    
})

overlay.addEventListener('click', ()=>{
    overlay.classList.remove('overlay')
    searchbar.classList.remove('myWidth')
})