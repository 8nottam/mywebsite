const rightbtn = document.querySelector('.fa-chevron-right')
const imgNuber = document.querySelectorAll('.slider-content-left-top img')
let index=0
console.log(imgNuber.length)
const leftbtn = document.querySelector('.fa-chevron-left')
rightbtn.addEventListener ("click",function(){
    index = index + 1
    if(index>imgNuber.length-1){
        index = 0
    }
    document.querySelector(".slider-content-left-top").style.right = index *100+"%"
})
leftbtn.addEventListener ("click",function(){
    index = index - 1
    if(index<0){
        index = imgNuber.length - 1
    }
    document.querySelector(".slider-content-left-top").style.right = index *100+"%"
})

//Slide 1-------------------------------------
const imgNuber1 = document.querySelectorAll('.slider-content-left-bottom li')
let imgactive = document.querySelector('.active')
imgNuber1.forEach(function(image,index){
    image.addEventListener("click",function(){
        removeactive()
        document.querySelector(".slider-content-left-top").style.right = index *100+"%"
        imgactive.classList.remove("active")
        image.classList.add("active")
    })
})
function removeactive(){
    let imgactive = document.querySelector('.active')
    imgactive.classList.remove("active")
}