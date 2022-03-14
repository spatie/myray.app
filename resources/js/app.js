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
let timeLineOpenTestimonials = gsap.timeline();
timeLineOpenTestimonials.fromTo('#testimonial-wrapper', {
    maxHeight: '24rem',
}, {
    height: '100vh',
    width: '100vw',
    maxHeight: '100vh',
    top: 0,
    left: 0,
    paddingBottom: 0,
    margin: 0,
    onStart : function() {
        this.targets()[0].scrollIntoView({behavior: 'smooth'});
    }

}).fromTo('.xtra-testimonials',{
    display: 'inline-block',
    opacity: 0.2,
}, {
    display: 'inline-block',
    opacity: 1,
}, '-=.2').pause()

let scrollTestimonialsDown = gsap.timeline();
scrollTestimonialsDown.to('.testimonial-down', {
    y: '-100%',
    duration: 100,
    ease: Power0.easeNone,
}).pause()

let scrollTestimonialsUp = gsap.timeline();
scrollTestimonialsUp.fromTo('.testimonial-up', {
    y: '0'
}, {
    y: '100%',
    duration: 100,
    ease: Power0.easeNone,
}).pause()



function handleMouseWheel (e){
    if(e.deltaY > 0){
        scrollTestimonialsUp.pause()
        scrollTestimonialsUp.progress(scrollTestimonialsUp.progress() + e.deltaY/10000)
        scrollTestimonialsUp.play()
    
        scrollTestimonialsDown.pause()
        scrollTestimonialsDown.progress(scrollTestimonialsUp.progress() + e.deltaY/10000)
        scrollTestimonialsDown.play()
    }
    
    
}

const showMoreTestimonialsButton = document.getElementById('showMoreTestimonials');
const closeMoreTestimonialsButton = document.getElementById('closeMoreTestimonials');


showMoreTestimonialsButton.addEventListener('click', () => {

    window.addEventListener('wheel', handleMouseWheel)

    

    // Stop scrolling 
    document.documentElement.style.overflowY = 'hidden'
    
    timeLineOpenTestimonials.restart()

    scrollTestimonialsDown.repeat('-1');
    scrollTestimonialsDown.restart().timeScale(1);

    scrollTestimonialsUp.repeat('-1');
    scrollTestimonialsUp.restart().timeScale(1);

    closeMoreTestimonialsButton.classList.remove('hidden')
    showMoreTestimonialsButton.classList.add('hidden')

    window.addEventListener('wheel', handleMouseWheel)

})

closeMoreTestimonialsButton.addEventListener('click', () => {
    scrollTestimonialsUp.pause().repeat(0).timeScale(500);
    scrollTestimonialsUp.reverse()

    scrollTestimonialsDown.pause().repeat(0).timeScale(500);
    scrollTestimonialsDown.reverse()
   
    timeLineOpenTestimonials.reverse();
    // Stop scrolling 
    document.documentElement.style.overflowY = 'auto'


    showMoreTestimonialsButton.classList.remove('hidden')
    closeMoreTestimonialsButton.classList.add('hidden')

    window.removeEventListener('wheel', handleMouseWheel);
    
})


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