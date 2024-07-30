import gsap from "gsap";

export default class Teaser {
    constructor(args = {}) {
        this.teaserEl = args.el || null;

        this.shapes = this.teaserEl.querySelector("#bg");
        this.overlayVeil = this.teaserEl.querySelector("#veil");
        this.window = this.teaserEl.querySelector("#window");
        this.form = this.teaserEl.querySelector("#form");
        this.icon = this.teaserEl.querySelector("#icon");
        this.iconIndicator = this.teaserEl.querySelector("#indicator");

        this.timeline = gsap.timeline({
            defaults: {
                duration: 1,
            },
            delay: 0.5
        });

        this.keyframes();

    }

    keyframes() {

        const iconTl = gsap.timeline({
            ease: "ease-in-out",
            repeat: 1,
            duration: 0,
            delay: 0,
            repeatDelay: 0,
            repeatRefresh: false
        })

        iconTl.to(this.icon, {
            yPercent: -20,
        }).to(this.icon, {
            yPercent: 0
        })

        this.timeline
            .add(iconTl)
            .add("start")
            .to(this.iconIndicator, {
                opacity: 1
            })
            .to(this.overlayVeil, {
                opacity: 0,
                duration: 2
            }).to(this.window, {
                y: 0,
                opacity: 1,
                duration: 2
            }, "start").to(this.shapes, {
                opacity: 0.2,
                y: 0,
                duration: 2
            }, "start")
            .to(this.window, {
                delay: 0.5,
                scale: 0.99,
                filter: "blur(2px)"
            })
            .to(this.form, {
                opacity: 1,
                scale: 1
            }, "-=1")
    }

}