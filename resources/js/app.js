import './bootstrap';
import GLightbox from 'glightbox';
import 'glightbox/dist/css/glightbox.css';
import 'swiper/css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

document.addEventListener('DOMContentLoaded', () => {
	    new Swiper('.services-swiper', {
        slidesPerView: 3,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		autoplay: {
            delay: 4000, // 3 segundos entre cada cambio
            disableOnInteraction: false, // sigue funcionando aunque el usuario interactúe
        },
        loop: true, // que vuelva al inicio al terminar
        breakpoints: {
            640: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        zoomable: true
    });
});
