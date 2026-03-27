import './bootstrap';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// Make gsap available globally for Alpine components
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

// Scroll-triggered reveal animations
document.addEventListener('DOMContentLoaded', () => {
    // Animate sections on scroll
    gsap.utils.toArray('section').forEach((section) => {
        const heading = section.querySelector('h2');
        const cards = section.querySelectorAll('.tour-card');
        const images = section.querySelectorAll('.washi-tape, .gallery-item');

        if (heading) {
            gsap.fromTo(heading,
                { opacity: 0, y: 40 },
                { opacity: 1, y: 0, duration: 0.8, ease: 'power3.out',
                    scrollTrigger: { trigger: heading, start: 'top 85%', once: true }
                }
            );
        }

        cards.forEach((card, i) => {
            gsap.fromTo(card,
                { opacity: 0, y: 50 },
                { opacity: 1, y: 0, duration: 0.7, delay: i * 0.1, ease: 'power3.out',
                    scrollTrigger: { trigger: card, start: 'top 85%', once: true }
                }
            );
        });

        images.forEach((img, i) => {
            gsap.fromTo(img,
                { opacity: 0, scale: 0.95 },
                { opacity: 1, scale: 1, duration: 0.6, delay: i * 0.08, ease: 'power2.out',
                    scrollTrigger: { trigger: img, start: 'top 85%', once: true }
                }
            );
        });
    });

    // Parallax on hero images
    document.querySelectorAll('[x-ref^="slide-"] img').forEach((img) => {
        const section = img.closest('section');
        if (!section) return;
        gsap.to(img, {
            y: 80,
            ease: 'none',
            scrollTrigger: {
                trigger: section,
                start: 'top top',
                end: 'bottom top',
                scrub: 1,
            }
        });
    });
});
