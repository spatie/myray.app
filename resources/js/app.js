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
        this.initToc();
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

    initToc() {
        const toc = document.querySelector(".docs-toc");
        if (!toc) {
            return;
        }

        const tocList = toc.querySelector("ul");
        if (!tocList) {
            return;
        }

        const topLevelItems = tocList.querySelectorAll(":scope > li");

        topLevelItems.forEach((li) => {
            const nestedUl = li.querySelector("ul");
            if (nestedUl) {
                li.classList.add("has-children");

                const link = li.querySelector(":scope > a");
                if (link) {
                    link.addEventListener("click", (e) => {
                        // Allow cmd/ctrl+click to open in new tab
                        if (!e.metaKey && !e.ctrlKey) {
                            e.preventDefault();
                            li.classList.toggle("expanded");
                        }
                    });
                }
            }
        });

        const headings = document.querySelectorAll(".markup h2, .markup h3");

        if (headings.length === 0) return;

        headings.forEach((h, i) => {
            if (i < 3) {
                const anchor = h.querySelector("a.heading-permalink");
            }
        });

        let currentActiveH2 = null;
        let currentActiveH3 = null;

        const getHeadingId = (heading) => {
            let id = heading.getAttribute("id");
            if (!id) {
                const anchor = heading.querySelector("a.heading-permalink");
                if (anchor) {
                    const href = anchor.getAttribute("href");
                    if (href && href.startsWith("#")) {
                        id = href.substring(1);
                    }
                }
            }
            return id;
        };

        const getParentH2Li = (h3Li) => {
            return h3Li.closest(".docs-toc > div > ul > li");
        };

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    const id = getHeadingId(entry.target);
                    if (!id) return;

                    const tocLink = toc.querySelector(`a[href="#${id}"]`);
                    if (!tocLink) return;

                    const tocLi = tocLink.parentElement;
                    const isH3 = entry.target.tagName === "H3";

                    if (entry.isIntersecting) {

                        if (isH3) {
                            if (currentActiveH3 && currentActiveH3 !== tocLi) {
                                currentActiveH3.classList.remove("active");
                            }
                            tocLi.classList.add("active");
                            currentActiveH3 = tocLi;

                            // Find and activate parent H2
                            const parentLi = getParentH2Li(tocLi);
                            if (parentLi && parentLi !== currentActiveH2) {
                                if (currentActiveH2) {
                                    currentActiveH2.classList.remove(
                                        "active",
                                        "expanded"
                                    );
                                }
                                parentLi.classList.add("active", "expanded");
                                currentActiveH2 = parentLi;
                            }
                        } else {
                            // H2: activate this item, collapse previous
                            if (currentActiveH2 && currentActiveH2 !== tocLi) {
                                currentActiveH2.classList.remove(
                                    "active",
                                    "expanded"
                                );
                            }
                            if (currentActiveH3) {
                                currentActiveH3.classList.remove("active");
                                currentActiveH3 = null;
                            }
                            tocLi.classList.add("active", "expanded");
                            currentActiveH2 = tocLi;
                        }
                    }
                });
            },
            {
                rootMargin: "0px 0px -80% 0px",
                threshold: 0,
            }
        );

        headings.forEach((heading) => {
            observer.observe(heading);
        });

    }
}
document.addEventListener("livewire:navigated", () => {
    new App();
});
