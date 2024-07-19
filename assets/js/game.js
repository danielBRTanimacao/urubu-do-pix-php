function changeNumbers() {
    var numberOne = document.querySelector("p#first-number");
    var numberTwo = document.querySelector("p#second-number");
    var numberThree = document.querySelector("p#third-number");
    numberOne.innerHTML = randomIntFromInterval(0, 7);
    numberTwo.innerHTML = randomIntFromInterval(0, 7);
    numberThree.innerHTML = randomIntFromInterval(0, 7);
}

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

const btnRollGame = document.querySelector("input#rollGame");
btnRollGame.addEventListener("click", (event) => {
    changeNumbers();
});
