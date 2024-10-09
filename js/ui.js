const headerElem = document.querySelector("header");
const separatorElem = document.querySelector("header > .separator");
const mobileMenuElem = document.querySelector("header > .main-nav > .navbar > .mobile-menu")
const navbarMenuElem = document.querySelector("header > .main-nav > .navbar > .navbar-menu")
const navbarMenuMobileElem = document.querySelector("header > .main-nav > .navbar > .navbar-menu-mobile")
const primaryButtonElem = document.querySelector("header > .main-nav > .navbar > .btn-primary")
const logoElem = document.querySelector("header > .main-nav > .logo > a > img");
const logoContainerElem = document.querySelector("header > .main-nav > .logo");
const navbarElem = document.querySelector("header > .main-nav > .navbar");
const menuItemsWithChildArray = document.querySelectorAll("ul:not(.navbar-menu-mobile) > .menu-item-has-children");
const mobileItemsWithChildArray = navbarMenuMobileElem.querySelectorAll(".menu-item-has-children");

const logo = {
    white: `${wpData.templateUrl}/img/ospa-white.svg`,
    black: `${wpData.templateUrl}/img/ospa-black.svg`
}

let isMobileMenuOpen = false;

function triggerNavScroll(state) {
    if (state) {
        headerElem.classList.add("bg-soft-white-100", "shadow-lg");
        headerElem.classList.remove("text-pure-white");
        separatorElem.classList.remove("bg-pure-white");
        separatorElem.classList.add("bg-outer-space-200");
        mobileMenuElem.classList.add("border-outer-space-700");
        mobileMenuElem.classList.remove("border-soft-white-100/25");
        primaryButtonElem.classList.remove("bg-pure-white", "text-mineral-green-800", "hover:bg-soft-white-300");
        logoElem.src = logo.black;
        headerElem.classList.add("transition", "duration-300");
        if(window.innerWidth > 768){
            logoContainerElem.classList.remove("md:w-112", "md:h-112");
            navbarElem.classList.remove("-mt-32");
        }
    } else {
        headerElem.classList.remove("bg-soft-white-100", "shadow-lg");
        headerElem.classList.add("text-pure-white");
        separatorElem.classList.add("bg-pure-white");
        separatorElem.classList.remove("bg-outer-space-200");
        mobileMenuElem.classList.add("border-soft-white-100/25");
        mobileMenuElem.classList.remove("border-outer-space-700");
        primaryButtonElem.classList.add("bg-pure-white", "text-mineral-green-800", "hover:bg-soft-white-300");
        logoElem.src = logo.white;
        if(window.innerWidth > 768){
            logoContainerElem.classList.add("md:w-112", "md:h-112");
            navbarElem.classList.add("-mt-32");
        }
    }
}

function triggerMobileMenu() {
    if(!isMobileMenuOpen){
        navbarMenuMobileElem.classList.replace("hidden", "flex");
        isMobileMenuOpen = true;
    }else{
        navbarMenuMobileElem.classList.replace("flex", "hidden");
        mobileItemsWithChildArray.forEach(elem => {
            const subMenu = elem.querySelector(".sub-menu-mobile");
            const chevron = elem.querySelector("i");
            subMenu.classList.replace("block", "hidden");
            subMenu.classList.remove("open");
            chevron.style.transform = "rotate(0)";
        });
        isMobileMenuOpen = false;
    }
}

// Change menu for articles + scroll event for others
if(document.body.classList.contains("single")){
    triggerNavScroll(true);
}else{
    window.addEventListener("scroll", (event) => {
        let scrollPosition = window.scrollY;
        if (scrollPosition > 2) {
            triggerNavScroll(true);
        } else {
            triggerNavScroll(false);
        }
    });
}

menuItemsWithChildArray.forEach(menuItem => {
    const dropdown = menuItem.querySelector(".sub-menu");
    menuItem.addEventListener("mouseover", (event) => {
        dropdown.classList.add("open");
    })
    menuItem.addEventListener("mouseout", (event) => {
        dropdown.classList.remove("open");
    })
})

mobileMenuElem.addEventListener("click", (event) => {
    event.stopPropagation();
    triggerMobileMenu();
})

function initMobileMenu(){
    mobileItemsWithChildArray.forEach(item => {
        item.querySelector("a").insertAdjacentHTML("beforeend", "<i class='bx bx-chevron-down bx-sm chevron'></i>");
        item.querySelector("a").classList.add( "flex", "justify-between");
        item.querySelector(".sub-menu").classList.replace("sub-menu", "sub-menu-mobile");
        item.querySelector(".sub-menu-mobile").classList.add("hidden");
    });

    mobileItemsWithChildArray.forEach(elem => {
        elem.addEventListener("click", event => {
            const subMenu = elem.querySelector(".sub-menu-mobile");
            const chevron = elem.querySelector("i");
            if(subMenu.classList.contains("open")){
                subMenu.classList.replace("block", "hidden");
                subMenu.classList.remove("open");
                chevron.style.transform = "rotate(0)";

            }else{
                subMenu.classList.replace("hidden", "block")
                subMenu.classList.add("open");
                chevron.style.transform = "rotate(180deg)";

            }
        })
    });

    // Close mobile menu if clicking outside
    
    window.addEventListener("click", event => {
        if(isMobileMenuOpen){
            const elem = event.target;
            if(!elem.closest(".navbar-menu-mobile")){
                triggerMobileMenu();
            }
        }
    });

    // Close mobile menu if resize
    window.addEventListener("resize", event => {
        if(isMobileMenuOpen){
            if(window.innerWidth > 768){
                triggerMobileMenu();
            }
        }
    })

}

initMobileMenu();

function initSlider(sliderId){
    const slider = document.querySelector(`#${sliderId}`);
    const slideLeft = slider.querySelector(".slide-left");
    const slideRight = slider.querySelector(".slide-right");
    const sliderContainer = slider.querySelector(".slider-content");
    let itemsWidth = sliderContainer.querySelector('.slider-item').offsetWidth + 24;
    const maxItems = sliderContainer.querySelectorAll('.slider-item').length;
    if(maxItems < 3){
        slideRight.classList.add("text-outer-space-100");
    }
    const maxControlValue = {
        mobile: 0,
        web: 2,
    }
    let itemsIndex = 1;
    let translateValuePx = 0;

    window.addEventListener("resize", event => {
        itemsWidth = sliderContainer.querySelector('.slider-item').offsetWidth + 24;
        sliderContainer.style.transform = `translateX(0px)`;
        if(maxItems >= 3){
            slideRight.classList.remove("text-outer-space-100");
        }
        slideLeft.classList.add("text-outer-space-100");
        itemsIndex = 1;
        translateValuePx = 0;
    })

    slideLeft.classList.add("text-outer-space-100");

    function refreshControls(){

        slideLeft.classList.remove("text-outer-space-100");
        slideRight.classList.remove("text-outer-space-100");

        if(itemsIndex === ( maxItems - (window.innerWidth > 768 ? maxControlValue.web : maxControlValue.mobile) ) ){
            slideRight.classList.add("text-outer-space-100");
        }
        else if(itemsIndex === 1){
            slideLeft.classList.add("text-outer-space-100");
        }

    }
    
    slideRight.addEventListener("click", event => {

        if(window.innerWidth > 768){
            triggerMobileMenu();
        }
        
        if(itemsIndex < ( maxItems - (window.innerWidth > 768 ? maxControlValue.web : maxControlValue.mobile) ) ){
            translateValuePx -= itemsWidth;
            sliderContainer.style.transform = `translateX(${translateValuePx}px)`;
            itemsIndex+= 1;
            refreshControls();
        }
    })
    slideLeft.addEventListener("click", event => {
        if(itemsIndex > 1){
            translateValuePx += itemsWidth;
            sliderContainer.style.transform = `translateX(${translateValuePx}px)`;
            itemsIndex+= -1;
            refreshControls();
        }
    });

}

initSlider("slider");

