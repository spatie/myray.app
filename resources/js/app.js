import Alpine from 'alpinejs'
import { gsap, Power3, Power0 } from "gsap"
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);



// ANiMATION HERO

function setupTypewriter(t) {

    let event = new CustomEvent(`${t.id}_finished`);

    let HTML = t.innerHTML.replace(/&gt;/g, ">");

    t.innerHTML = "";

    var cursorPosition = 0,
        tag = "",
        writingTag = false,
        tagOpen = false,
        typeSpeed = 5,
        tempTypeSpeed = 0;

    var type = function () {

        t.classList.remove('hideafter');

        if (writingTag === true) {
            tag += HTML[cursorPosition];
        }

        if (HTML[cursorPosition] === "<") {
            tempTypeSpeed = 0;
            if (tagOpen) {
                tagOpen = false;
                writingTag = true;
            } else {
                tag = "";
                tagOpen = true;
                writingTag = true;
                tag += HTML[cursorPosition];
            }
        }
        if (!writingTag && tagOpen) {
            tag.innerHTML += HTML[cursorPosition];
        }
        if (!writingTag && !tagOpen) {
            if (HTML[cursorPosition] === " ") {
                tempTypeSpeed = 0;
            }
            else {
                tempTypeSpeed = (Math.random() * typeSpeed) + 50;
            }
            t.innerHTML += HTML[cursorPosition];
        }
        if (writingTag === true && HTML[cursorPosition] === ">") {
            tempTypeSpeed = (Math.random() * typeSpeed) + 50;
            writingTag = false;
            if (tagOpen) {
                var newSpan = document.createElement("span");
                t.appendChild(newSpan);
                newSpan.innerHTML = tag;
                tag = newSpan.firstChild;
            }
        }

        cursorPosition += 1;
        if (cursorPosition < HTML.length - 1) {
            setTimeout(type, tempTypeSpeed);
        }
        else {
            // Remove caret
            t.classList.add('hideafter');
            window.dispatchEvent(event)
        }

    };

    return {
        type: type
    };
}

const typer0 = document.getElementById('typewriter_0');
const typer1 = document.getElementById('typewriter_1');
const typer2 = document.getElementById('typewriter_2');

let typewriter0 = setupTypewriter(typer0);
let typewriter1 = setupTypewriter(typer1);
let typewriter2 = setupTypewriter(typer2);


// SETUP GSAP TIMELINES

let heroTimeline1 = gsap.timeline();
heroTimeline1.fromTo('.ray-line-01', {
    opacity: 0,
    scaleY: .85,
}, {
    opacity: 1,
    scaleY: 1,
    delay: .2,
    duration: .1,
    ease: Power3.easeOut,
    onComplete: () => {
        typewriter1.type();
    }
}).pause()

heroTimeline1.fromTo('.ray-loading', {
    opacity: 1,
}, {
    opacity: 0,
    duration: .1,
    ease: Power3.easeOut,
    onComplete: () => {
        typewriter1.type();
    }
}).pause()

let heroTimeline2 = gsap.timeline();
heroTimeline2.fromTo('.ray-line-02', {
    opacity: 0,
    scaleY: .85,
}, {
    opacity: 1,
    scaleY: 1,
    delay: .2,
    duration: .1,
    ease: Power3.easeOut,
    onComplete: () => {
        typewriter2.type();
    }
}).pause()

let heroTimeline3 = gsap.timeline();
heroTimeline3.fromTo('.ray-line-03', {
    opacity: 0,
    scaleY: .85,
}, {
    opacity: 1,
    scaleY: 1,
    delay: .2,
    duration: .1,
    ease: Power3.easeOut,
}).pause()



// START TYPING FIRST TYPER And LISTEN WHEN DONE
typewriter0.type();
window.addEventListener('typewriter_0_finished', () => {
    heroTimeline1.play()
});
window.addEventListener('typewriter_1_finished', () => {
    heroTimeline2.play();
})
window.addEventListener('typewriter_2_finished', () => {
    heroTimeline3.play();
})



// Animation Testimonials








// SCREENSHOTS SCROLL EFFECT
gsap.fromTo('#screenshots', {
    y: '-20%'
}, {
    y: '20%',
    ease: Power0.easeNone,
    scrollTrigger: {
        trigger: '#screenshots-wrapper',
        scrub: true,
    }
});
