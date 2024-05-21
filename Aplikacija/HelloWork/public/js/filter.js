const mobileBackground = document.querySelector('.mobile-background');
const mobileSearch = mobileBackground.querySelector('.mobile-search');
const filterTriger = document.querySelector('#filter-triger');
const closeFilterIcon = document.querySelector('.close-mobile-filter');

filterTriger.addEventListener('click', openMobileFilters);
mobileBackground.addEventListener('click', hideMobileFilters);
closeFilterIcon.addEventListener('click', hideMobileFilters);
mobileSearch.addEventListener('click', function(event){
    event.stopPropagation();
})

function openMobileFilters(){
    document.body.style.overflowY = 'hidden';
    mobileBackground.classList.add('active');
    mobileSearch.classList.remove('hide');
    mobileSearch.classList.add('show');
}

function hideMobileFilters(){
    mobileSearch.classList.remove('show');
    mobileSearch.classList.add('hide');
    setTimeout(()=>{
        mobileBackground.classList.remove('active');
        document.body.style.overflowY = 'auto';
    }, 300);
}