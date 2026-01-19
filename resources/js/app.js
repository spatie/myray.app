import Animation from "./components/animation";
import Teaser from "./components/teaser";
import confetti from "canvas-confetti";

class App {
    constructor() {
        this.initAnimation();
        this.initTeaser();
        this.initTooltipPermalinks();
        this.initCodeCopyButtons();
        this.initConfetti();
    }

    initAnimation() {
        new Animation({
            el: document.querySelector(".js-animation"),
        });
    }

    initTeaser() {
        new Teaser({
            el: document.querySelector(".js-page-teaser"),
        });
    }

    initTooltipPermalinks() {
        document.querySelectorAll(".heading-permalink").forEach((el) => {
            el.addEventListener("click", (e) => {
                e.preventDefault();
                const target = el.getAttribute("href");

                navigator.clipboard.writeText(document.documentURI + target);

                // Add a span with a text to the clicked element
                const div = document.createElement("div");
                div.classList.add("copy-tooltip");
                div.textContent = "Copied URL!";
                el.prepend(div);

                setTimeout(() => {
                    div.remove();
                }, 1500);
            });
        });
    }

    initCodeCopyButtons() {
        document.querySelectorAll(".markup pre").forEach((pre) => {
            const code = pre.querySelector("code");
            const content = code ? code.textContent : pre.textContent;

            const button = document.createElement("button");
            button.className = "copy-code-button";
            button.textContent = "Copy";
            button.addEventListener("click", () => {
                navigator.clipboard.writeText(content);
                button.textContent = "Copied!";
                setTimeout(() => {
                    button.textContent = "Copy";
                }, 1500);
            });
            pre.appendChild(button);
        });
    }

    initConfetti() {
        const scale = 4;
        const confettiEl = document.querySelector(".js-confetti");
        const defaults = {
            origin: { y: 0.6 },
            shapes: [confetti.shapeFromText({ text: "🕺" }, scale)],
        };

        if (confettiEl) {
            confettiEl.addEventListener("click", () => {
                function shoot() {
                    confetti({
                        ...defaults,
                        particleCount: 20,
                        spread: 70,
                        scalar: scale,
                    });

                    confetti({
                        ...defaults,
                        particleCount: 30,
                        spread: 120,
                        scalar: scale,
                    });
                }

                setTimeout(shoot, 0);
                setTimeout(shoot, 100);
                setTimeout(shoot, 200);
            });
        }

        // function randomInRange(min, max) {
        //     return Math.random() * (max - min) + min;
        // }
    }
}
document.addEventListener("livewire:navigated", () => {
    new App();
});
