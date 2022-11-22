const model = document.getElementById('model')
const volume = document.getElementById('volume')
const power = document.getElementById('power')
const transmission = document.getElementById('transmission')
const acceleration = document.getElementById('acceleration')
const top_speed = document.getElementById('top_speed')
const fuel_consumption = document.getElementById('fuel_consumption')
const price = document.getElementById('price')
const form = document.getElementById('form')
//const  = document.getElementsByID('model')

form.addEventListener('submit', (e) => {
    let success = true
    if(isNaN(volume.value) ){
        window.alert("Objem motora musi byt cislo")
        success = false
    }
    if(!Number.isInteger(power.value)){
        window.alert("Vykon motora musi byt cele cislo")
        success = false
    }
    if(isNaN(acceleration.value)){
        window.alert("Zrychlenie auta musi byt cislo")
        success = false
    }
    if(!Number.isInteger(price.value)){
        window.alert("Cena auta musi byt cele cislo")
        success = false
    }
    if(!Number.isInteger(top_speed.value)){
        window.alert("Najvyssia rychlost auta musi byt cele cislo")
        success = false
    }
    if(isNaN(fuel_consumption.value)){
        window.alert("Spotreba auta musi byt cislo")
        success = false
    }
    if(!success){
        e.preventDefault()
    }
})