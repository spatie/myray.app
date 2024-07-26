import gsap from "gsap";
import TextPlugin from "gsap/TextPlugin";

gsap.registerPlugin(TextPlugin)

export default class Animation {
    constructor(args = {}) {
        this.animationEl = args.el || null;
        if (!this.animationEl) return;

        this.codeBlocks = this.animationEl.querySelectorAll(".js-anim-block");
        this.windowTargets = this.animationEl.querySelectorAll(".js-anim-message");
        this.loader = this.animationEl.querySelector(".js-animation-loader");

        this.timeline = gsap.timeline();

        this.initialize();

    }

    initialize() {
        this.codeBlocks.forEach((block, index) => {
            this.timeline.add(this.doTypewriterEffect(block, index));
        });
    }

    getTimestamp() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        return `${hours}:${minutes}:${seconds}`;
    }

    doTypewriterEffect(element, index) {
        const lines = element.querySelectorAll('p');
        const timeline = gsap.timeline();

        lines.forEach((line, i) => {        
            const originalHTML = line.innerHTML;
            const text = line.textContent;
            line.textContent = '';

            timeline.to(line, {
                duration: 0.04 * text.length,
                text: {
                    value: text,
                    delimiter: '',
                },
                ease: 'none',
                onStart: () => {
                    line.classList.add("start");
                },
                onComplete: () => {
                    line.innerHTML = originalHTML;
                    line.classList.add("finish");
                }
            });
        });

        timeline.add(() => {

            const target = this.windowTargets[index];

            if (index == 0) {
                gsap.to(this.loader, {
                    opacity: 0,
                    duration: 0.25
                })
            }

            if (target) {
                const timestamp = target.querySelector(".js-anim-timestamp");

                gsap.to(target, {
                    opacity: 1,
                    y: 0,
                    duration: 0.5
                });

                timestamp.innerText = this.getTimestamp();

            }
        });

        return timeline;
    }
}