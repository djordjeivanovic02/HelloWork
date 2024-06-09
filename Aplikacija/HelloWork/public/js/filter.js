const mobileBackground = document.querySelector('.mobile-background');
const mobileSearch = document.querySelector('.mobile-search');
const filterTriger = document.querySelector('#filter-triger');
const closeFilterIcon = document.querySelector('.close-mobile-filter');
const mobileBG = document.querySelector('.mobile-bg');

filterTriger.addEventListener('click', openMobileFilters);
mobileBG.addEventListener('click', hideMobileFilters);
closeFilterIcon.addEventListener('click', hideMobileFilters);
mobileSearch.addEventListener('click', function (event) {
    event.stopPropagation();
})

function openMobileFilters() {
    document.body.style.overflowY = 'hidden';
    mobileBG.style.display = 'block';
    mobileBackground.classList.add('active');
    mobileSearch.classList.remove('hide');
    mobileSearch.classList.add('show');
}

function hideMobileFilters() {
    mobileSearch.classList.remove('show');
    mobileSearch.classList.add('hide');
    setTimeout(() => {
        mobileBackground.classList.remove('active');
        mobileBG.style.display = 'none';
        document.body.style.overflowY = 'auto';
    }, 300);
}


