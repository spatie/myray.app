import focus from '@alpinejs/focus'
import clipboard from "@ryangjchandler/alpine-clipboard"
import Animation from './components/animation';
import Teaser from './components/teaser';
import confetti from 'canvas-confetti';

Alpine.plugin(clipboard);
Alpine.plugin(focus);

Alpine.start();

class App {
    constructor() {
        this.initAnimation();
        this.initTeaser();
        this.initTooltipPermalinks();
        this.initConfetti();
    }

    initAnimation() {
        new Animation({
            el: document.querySelector(".js-animation")
        })
    }

    initTeaser() {
        new Teaser({
            el: document.querySelector(".js-page-teaser")
        })
    }

    initTooltipPermalinks() {
        document.querySelectorAll('.heading-permalink').forEach((el) => {
            el.addEventListener('click', (e) => {
                e.preventDefault();
                const target = el.getAttribute('href');

                navigator.clipboard.writeText(document.documentURI + target);

                // Add a span with a text to the clicked element
                const div = document.createElement('div');
                div.classList.add('copy-tooltip');
                div.textContent = 'Copied URL!';
                el.prepend(div);

                setTimeout(() => {
                    div.remove();
                }, 1500);
            });
        });
    }

    initConfetti() {
        const confettiEl = document.querySelector(".js-confetti");
        console.log(confettiEl);

        if (confettiEl) {
            confettiEl.addEventListener("click", () => {
                confetti({
                    angle: randomInRange(55, 125),
                    spread: randomInRange(50, 70),
                    particleCount: randomInRange(50, 100),
                    origin: { y: 0.6 }
                });
            })
        }

        function randomInRange(min, max) {
            return Math.random() * (max - min) + min;
        }

    }

}

new App();