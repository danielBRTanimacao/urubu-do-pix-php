const list_of_possible_wins = [
    "000",
    "111",
    "222",
    "333",
    "444",
    "555",
    "666",
    "777"
];

const user_money = document.querySelector("p#user-money");

function rollNumbers() {
    var first_number = document.querySelector("p#first-number");
    var second_number = document.querySelector("p#second-number");
    var third_number = document.querySelector("p#third-number");

    first_number.innerHTML = randomIntFromInterval(0, 7);
    second_number.innerHTML = randomIntFromInterval(0, 7);
    third_number.innerHTML = randomIntFromInterval(0, 7);

    const the_three_numbers_together =
        first_number.innerHTML +
        second_number.innerHTML +
        third_number.innerHTML;

    if (list_of_possible_wins.includes(the_three_numbers_together)) {
        btnRollGame.setAttribute("disabled", "");
        first_number.style.color = "#0f3124";
        second_number.style.color = "#0f3124";
        third_number.style.color = "#0f3124";
        const sWithdrawn = document.querySelector("input#sWithdrawn");
        sWithdrawn.removeAttribute("disabled", "");
        sendMoneyToPost();
    }
}

const sendMoneyToPost = () => {
    const inputHidden = document.querySelector("input#amountId");
    let format_value = formatMoneyHtml(user_money.innerHTML);
    inputHidden.value = format_value;
};

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function formatMoneyHtml(value_to_format) {
    console.log(value_to_format);
    if (isNaN(parseFloat(value_to_format))) {
        let removing_money = value_to_format.replaceAll("R$", "");
        let removing_point = removing_money.replaceAll(".", "");
        let removing_float = removing_point.replaceAll(",", ".");
        return parseFloat(removing_float);
    } else {
        return parseFloat(value_to_format);
    }
}

function withDrawnUserMoney() {
    value_formated = formatMoneyHtml(user_money.innerHTML);

    actual_money_user = value_formated - 5;

    user_money.innerHTML = `R$${actual_money_user.toLocaleString("pt-br", {
        minimumFractionDigits: 2
    })}`;
}

const btnRollGame = document.querySelector("input#rollGame");
btnRollGame.addEventListener("click", () => {
    withDrawnUserMoney();
    rollNumbers();
});
