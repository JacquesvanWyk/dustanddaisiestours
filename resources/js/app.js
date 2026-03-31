import './bootstrap';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

Alpine.plugin(collapse);
window.Alpine = Alpine;
Alpine.start();

gsap.registerPlugin(ScrollTrigger);

window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

document.addEventListener('DOMContentLoaded', () => {
    gsap.utils.toArray('.section-shell').forEach((section) => {
        const header = section.querySelector('.section-header');
        const cards = section.querySelectorAll('.expedition-card, .gallery-item, .form-shell, .contact-card');

        if (header) {
            gsap.fromTo(
                header.children,
                { opacity: 0, y: 28 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: header,
                        start: 'top 82%',
                        once: true,
                    },
                }
            );
        }

        cards.forEach((card, index) => {
            gsap.fromTo(
                card,
                { opacity: 0, y: 48, rotate: index % 2 === 0 ? -1.2 : 1.2 },
                {
                    opacity: 1,
                    y: 0,
                    rotate: 0,
                    duration: 0.8,
                    ease: 'power3.out',
                    delay: Math.min(index * 0.05, 0.18),
                    scrollTrigger: {
                        trigger: card,
                        start: 'top 86%',
                        once: true,
                    },
                }
            );
        });
    });

    document.querySelectorAll('.hero-bg img').forEach((img) => {
        const section = img.closest('.hero-shell');
        if (!section) return;

        gsap.to(img, {
            y: 96,
            ease: 'none',
            scrollTrigger: {
                trigger: section,
                start: 'top top',
                end: 'bottom top',
                scrub: 1,
            },
        });
    });

    document.querySelectorAll('.hero-route').forEach((route) => {
        const stops = route.querySelectorAll('.hero-route-stop');

        gsap.fromTo(
            route,
            { opacity: 0, x: 22 },
            {
                opacity: 1,
                x: 0,
                duration: 0.7,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: route,
                    start: 'top 88%',
                    once: true,
                },
            }
        );

        if (stops.length > 0) {
            gsap.fromTo(
                stops,
                { opacity: 0, y: 14 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.5,
                    stagger: 0.12,
                    delay: 0.12,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: route,
                        start: 'top 88%',
                        once: true,
                    },
                }
            );
        }
    });
});
