require("./slider.scss");

const countItems = document.getElementsByClassName('slider-item').length; 
let sliderItems = [];
const timeSlide = 10000;

window.onload = () => {
    initSlider();
};

function initSlider() {
    for (let index = 1; index <= countItems; index++) {
        sliderItems.push(document.getElementById("item-" + index));
        sliderItems[index - 1].style.order = index;
        if (index > 1) {
             sliderItems[index - 1].style.display = 'none';
        }
    }

    setTimeout(hide, timeSlide - 1000, sliderItems[0]);
    setInterval(nextSlide, timeSlide);
}

function nextSlide() {
    for (let index = 1; index <= countItems; index++) {
        let currentOrderStyle = sliderItems[index - 1].style.order;
        var currentOrderNum = Number(currentOrderStyle[currentOrderStyle.length - 1]) + 1;

        if (currentOrderNum > countItems) {
            currentOrderNum = 1;
        }

        sliderItems[index - 1].style.order = currentOrderNum;

        if (currentOrderNum === 1) {
            activeItem = sliderItems[index - 1];
            sliderItems[index - 1].style.display = 'block';
            show(sliderItems[index - 1]);
            setTimeout(hide, timeSlide - 1000, sliderItems[index - 1]);
        } else {
            sliderItems[index - 1].style.display = 'none';
            sliderItems[index - 1].classList.remove('b-show');
            sliderItems[index - 1].classList.remove('b-hide');
        }
    }
}

function prevSlide() {
    for (let index = countItems; index >= 1; index--) {
        let currentOrderStyle = sliderItems[index - 1].style.order;
        var currentOrderNum = Number(currentOrderStyle[currentOrderStyle.length - 1]) - 1;

        if (currentOrderNum < 1) {
            currentOrderNum = countItems;
        }

        sliderItems[index - 1].style.order = currentOrderNum;

        if (currentOrderNum === 1) {
            activeItem = sliderItems[index - 1];
            sliderItems[index - 1].style.display = 'block';
            show(sliderItems[index - 1]);
            setTimeout(hide, timeSlide - 1000, sliderItems[index - 1]);
        } else {
            sliderItems[index - 1].style.display = 'none';
            sliderItems[index - 1].classList.remove('b-show');
            sliderItems[index - 1].classList.remove('b-hide');
        }
    }
}

function show(item) {
    item.classList.add('b-show');
}

function hide(item) {
    item.classList.add('b-hide');
}

