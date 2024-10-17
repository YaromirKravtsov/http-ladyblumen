
document.addEventListener('DOMContentLoaded', () => {
    const lenSwitch = document.querySelector('.header__len');

    lenSwitch.addEventListener('click', () => {
        lenSwitch.classList.toggle('open');

    })


});
/* function wrapContainer() {
    const poster = document.querySelector('.poster');
    const leftImg = document.querySelector('.poster-left-img');
    const mainRow = document.querySelector('.poster__main-row');
    const rightImg = document.querySelector('.poster-right-img');
    console.log(window.innerWidth, window.innerHeight);
    if (window.innerWidth < 1170 && !document.querySelector('.poster .container')) {

        const container = document.createElement('div');
        container.classList.add('container');

        poster.insertBefore(container, leftImg);

        container.appendChild(leftImg);
        container.appendChild(mainRow);
        container.appendChild(rightImg);
    } else if (window.innerWidth >= 1150 && document.querySelector('.poster .container')) {
        const container = document.querySelector('.poster .container');
        poster.insertBefore(leftImg, container);
        poster.insertBefore(mainRow, container);
        poster.insertBefore(rightImg, container);
        container.remove();
    }
}
 */
const mobileHeader = () => {
    if (window.innerWidth < 770) {
        document.body.classList.add('mobile');
    } else {
        document.body.classList.remove('mobile');
    }

    document.querySelector('.burger-icon').addEventListener('click', () => {
        document.body.classList.toggle('open');
    });
    const navItems = document.querySelectorAll('.header__item');
    navItems.forEach(navItem => {
        navItem.addEventListener('click', () => {
            const isMobile = document.body.classList.contains('mobile');
            if (isMobile) document.body.classList.remove('open')
        })
    })

}
window.addEventListener('scroll', function () {
    var header = document.querySelector('header');

    if (window.scrollY > 0) {
        header.classList.add('header-shadow');
    } else {
        header.classList.remove('header-shadow');
    }
});



document.addEventListener("DOMContentLoaded", function () {

    mobileHeader();
    wrapContainer();
    window.addEventListener('resize', wrapContainer);
    window.addEventListener('resize', mobileHeader);
});





