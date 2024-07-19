const listOfPossibleGains = [
    "000",
    "111",
    "222",
    "333",
    "444",
    "555",
    "666",
    "777"
];

function rollNumbers() {
    var numberOne = document.querySelector("p#first-number");
    var numberTwo = document.querySelector("p#second-number");
    var numberThree = document.querySelector("p#third-number");

    numberOne.innerHTML = randomIntFromInterval(0, 7);
    numberTwo.innerHTML = randomIntFromInterval(0, 7);
    numberThree.innerHTML = randomIntFromInterval(0, 7);
    const theThreeValuesTogether =
        numberOne.innerHTML + numberTwo.innerHTML + numberThree.innerHTML;
    if (listOfPossibleGains.includes(theThreeValuesTogether)) {
        btnRollGame.setAttribute("disabled", "");
        numberOne.style.color = "#0f3124";
        numberTwo.style.color = "#0f3124";
        numberThree.style.color = "#0f3124";
        const sWithdrawn = document.querySelector("input#sWithdrawn");
        sWithdrawn.removeAttribute("disabled", "");
    }
}

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

const btnRollGame = document.querySelector("input#rollGame");
btnRollGame.addEventListener("click", () => {
    rollNumbers();
});
