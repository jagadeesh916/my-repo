document.addEventListener("DOMContentLoaded", function () {
    function animateCounter(id, targetValue, duration) {
        let element = document.getElementById(id);
        let startValue = 0;
        let increment = targetValue / (duration / 10);
        let currentValue = startValue;

        let counter = setInterval(() => {
            currentValue += increment;
            element.innerText = Math.floor(currentValue) + "+";
            if (currentValue >= targetValue) {
                clearInterval(counter);
                element.innerText = targetValue + "+"; // Ensure final value is correct
            }
        }, 10);
    }

    animateCounter("companiesVisited", 35, 1000); // Example: 25 companies in 1 seconds
    animateCounter("studentsPlaced", 435, 1000);
    animateCounter("studentsWithOffers", 1109, 1000);
    animateCounter("highestPackage", 619000, 1000);
});
