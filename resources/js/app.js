import focus from '@alpinejs/focus'
import clipboard from "@ryangjchandler/alpine-clipboard"
import Animation from './components/animation';
import Teaser from './components/teaser';

Alpine.plugin(clipboard);
Alpine.plugin(focus);

Alpine.start();

class App {
    constructor() {
        this.initAnimation();
        this.initTeaser();
        this.initTooltipPermalinks();
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

}

new App();