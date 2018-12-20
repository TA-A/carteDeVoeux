var sound = new Audio()
var perenoel = document.getElementById("Pere-Noel")

perenoel.addEventListener("click", playSound)

// const sound = new Audio()
// const button = document.querySelector(‘button’)
// button.addEventListener(‘click’, playSound)

function playSound() {
  sound.src = "perenoel.mp3"
  sound.play()
}


var sound = new Audio()
var perenoel = document.getElementById("Atelier")

perenoel.addEventListener("click", playSound2)

function playSound2() {
    sound.src = "atelier.mp3"
    sound.play()
  }