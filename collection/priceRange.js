const rangeInput = document.querySelectorAll(".range-change input");
const progress = document.querySelector(".range-slider-progress");
const priceInput = document.querySelectorAll(".range-input input");

let priceGap = 10000;

priceInput.forEach(input => {
    input.addEventListener("input", e => {
        let minVal = parseInt(priceInput[0].value),
            maxVal = parseInt(priceInput[1].value);
            console.log(minVal);
            if(maxVal - minVal > priceGap && maxVal <= 25000000) {
                if(e.target.className === 'range-input-value-min') {
                rangeInput[0].value = minVal;
                progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
            } else {
                rangeInput[1].value = maxVal;
                progress.style.right = 100 - (maxVal / rangeInput[0].max) * 100 + "%";
            }
        }

    })
});

rangeInput.forEach(input => {
    input.addEventListener("input", e => {
        let minVal = parseInt(rangeInput[0].value),
            maxVal = parseInt(rangeInput[1].value);

        if(maxVal - minVal < priceGap) {
            if(e.target.className === 'range-input-change-min') {
                rangeInput[0].value = maxVal - priceGap;
            } else {
                rangeInput[1].value = minVal + priceGap;
            }
        } else {
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
            progress.style.right = 100 - (maxVal / rangeInput[0].max) * 100 + "%";

        }

    })
});