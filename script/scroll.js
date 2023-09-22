// Define the topFunction function in the global scope
function topFunction() {
    const scrollToTop = () => {
        const c = document.documentElement.scrollTop || document.body.scrollTop;
        if (c > 0) {
            window.requestAnimationFrame(scrollToTop);
            window.scrollTo(0, c - c / 10); // You can adjust the division value to control the animation speed
        }
    };
    scrollToTop();
}

// Get the button:
let mybutton = document.getElementById("UpBtn");


// Attach the topFunction to the button's click event
mybutton.addEventListener("click", topFunction);
