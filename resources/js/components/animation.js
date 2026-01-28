import gsap from "gsap";
import TextPlugin from "gsap/TextPlugin";

gsap.registerPlugin(TextPlugin);

export default class Animation {
    static LG_BREAKPOINT = 1024;

    constructor(args = {}) {
        this.animationEl = args.el || null;
        if (!this.animationEl) return;

        this.codeEl = this.animationEl.querySelector(".js-anim-code");
        this.codeBlocks = this.animationEl.querySelectorAll(".js-anim-block");
        this.windowTargets = this.animationEl.querySelectorAll(".js-anim-message");
        this.loader = this.animationEl.querySelector(".js-animation-loader");
        this.loadButton = this.animationEl.querySelector(".js-anim-load");
        this.loadIcon = this.animationEl.querySelector(".js-anim-load-icon");

        this.timeline = gsap.timeline({
            paused: false,
            delay: 0.75,
        });

        this.initialize();
        this.bindEvents();

        if (!this.isLargeViewport()) {
            this.timeline.progress(1);
        }
    }

    isLargeViewport() {
        return window.innerWidth >= Animation.LG_BREAKPOINT;
    }

    bindEvents() {
        if (this.loadButton) {
            this.loadButton.addEventListener("click", () => this.finish());
        }
    }

    finish() {
        if (this.loadIcon) {
            gsap.to(this.loadIcon, {
                rotation: 360,
                duration: 0.5,
                ease: "power2.out",
                onComplete: () => {
                    gsap.set(this.loadIcon, { rotation: 0 });
                },
            });
        }
        this.timeline.progress(1);
    }

    initialize() {
        this.codeBlocks.forEach((block, index) => {
            this.timeline.add(this.doTypewriterEffect(block, index));
        });
    }

    getTimestamp() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, "0");
        const minutes = String(now.getMinutes()).padStart(2, "0");
        const seconds = String(now.getSeconds()).padStart(2, "0");

        return `${hours}:${minutes}:${seconds}`;
    }

    doTypewriterEffect(element, index) {
        const lines = element.querySelectorAll("p");
        const timeline = gsap.timeline();

        lines.forEach((line, i) => {
            const originalHTML = line.innerHTML;
            const text = line.textContent;
            line.textContent = "";

            timeline.to(line, {
                duration: 0.035 * text.length,
                text: {
                    value: text,
                    delimiter: "",
                },
                ease: "none",
                onStart: () => {
                    line.classList.add("start");
                    this.codeEl.classList.add("started");
                    gsap.set(
                        this.animationEl.querySelector(".screen-code-caret"),
                        {
                            display: "none",
                        }
                    );
                },
                onComplete: () => {
                    line.innerHTML = originalHTML;
                    line.classList.add("finish");
                },
            });
        });

        timeline.add(() => {
            const target = this.windowTargets[index];

            if (index == 0) {
                gsap.to(this.loader, {
                    opacity: 0,
                    duration: 0.25,
                });
            }

            if (target) {
                const timestamp = target.querySelector(".js-anim-timestamp");

                gsap.to(target, {
                    opacity: 1,
                    y: 0,
                    duration: 0.5,
                });

                timestamp.innerText = this.getTimestamp();
            }
        });

        timeline.set({}, {}, "+=0.75");

        return timeline;
    }
}
