var a = document.getElementById('display');

function display(input) {
    a.value = a.value + input;
}

function clr() {
    a.value = "";
}

function del() {
    a.value = a.value.substring(0, a.value.length - 1);
}

function calc() {
    try {
        // Prevent consecutive operators from being evaluated
        let result = a.value;
        if (/[\+\-\*\/]{2,}/.test(result)) {
            throw new Error('Invalid expression');
        }
        a.value = eval(result);
    } catch (error) {
        a.value = "Error";
        console.log("Error");
    }
}