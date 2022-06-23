let categoryMobile = document.querySelector('.category-mobile-query');
let searchMobile = document.getElementById('searchMobile')



document.addEventListener('scroll', ()=>{
    let scrolled = window.scrollY;
    if(scrolled >=1){
        if(!categoryMobile.classList.contains('category-mobile-custom')){
            setTimeout(()=>{
                categoryMobile.classList.remove('category-mobile')
            }, 1)
            categoryMobile.classList.add('category-mobile-custom')
        }
    }else{
        setTimeout(()=>{
            categoryMobile.classList.remove('category-mobile-custom')

        }, 1)
        categoryMobile.classList.add('category-mobile')
    }
})

document.addEventListener('scroll', ()=>{
    let scrolled = window.scrollY;
    if(scrolled >=1){
        if(!searchMobile.classList.contains('category-mobile-search-scroll')){
            setTimeout(()=>{
                searchMobile.classList.remove('category-mobile-search')
            }, 1)
            searchMobile.classList.add('category-mobile-search-scroll')
        }
    }else{
        setTimeout(()=>{
            searchMobile.classList.remove('category-mobile-search-scroll')

        }, 1)
        searchMobile.classList.add('category-mobile-search')
    }
})