let btnBar = document.querySelector('.btnBar')
let btnBarDiv = document.querySelectorAll('.btnBar div')
let bgColor = document.querySelector('.bgColor')


btnBar.addEventListener('click', ()=>{
    btnBarDiv.forEach((el)=>{
        if(!el.classList.contains('change')){
            el.classList.add('change')
        }else{
            el.classList.remove('change')
        }
        })
});

document.addEventListener('scroll', ()=>{
    let scrolled = window.scrollY;
    if(scrolled >=1){
        if(!bgColor.classList.contains('navanimation')){
            setTimeout(()=>{
                bgColor.classList.remove('navbarCust')
            }, 1)
            bgColor.classList.add('navanimation')
        }
    }else{
        setTimeout(()=>{
            bgColor.classList.remove('navanimation')

        }, 1)
        bgColor.classList.add('navbarCust')
    }
})
