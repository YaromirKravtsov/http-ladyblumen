
document.addEventListener('DOMContentLoaded', () => {
    const lenSwitch = document.querySelector('.header__len');

    lenSwitch.addEventListener('click', () => {
        lenSwitch.classList.toggle('open');

    })


});
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

const animations = () => {
    const handleIntersection = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            } 
        });
    };

    const observer = new IntersectionObserver(handleIntersection);

    const elements = document.querySelectorAll('.animation');

    elements.forEach(element => {
        observer.observe(element);
    });

}

document.addEventListener("DOMContentLoaded", function () {
    animations();
    mobileHeader();
    window.addEventListener('resize', mobileHeader);
});





