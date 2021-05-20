require("./hobby.scss");
require("./components/slider/slider.js");

const updateBtn = document.getElementById('update');
let hobby = document.getElementsByClassName('hobby')[0];

updateBtn.addEventListener('click', async () => {
    const request = await fetch('/hobby/update', {
        method: 'POST',
        body: JSON.stringify({
            id: hobby.id
        })
    });
    
    let result = await request;
    if (result.ok) {
        location.reload();
    } else {
        alert("Что-то пошло не так...");
    }
});