
const features = document.querySelector('.features');
let isDark = document.getElementsByClassName('isDark');
let isDark2 = document.getElementsByClassName('isDark2');
let cards = document.getElementsByClassName('card');
console.log(cards);
let element =  window.getComputedStyle(features);    
let currentColor = element.getPropertyValue('background-color');

let setColor = (currentColor == 'rgb(255, 255, 255)') ? '#0e192b' : '#FFFFFF';
let setColor2 = (currentColor == 'rgb(255, 255, 255)') ? '#182947' : '#f4f9fc';
let setColorCards = (currentColor == 'rgb(255, 255, 255)') ? '#FFC107' : '#FFFFFF';

for(let i = 0; i < isDark.length; i++){
    isDark[i].style.background = setColor;
}
for (let e in isDark2) {
isDark2[e].style.background = setColor2;
}

for (let j in cards) {
cards[j].style.background = setColorCards;
}