require('./hobbies.scss');

const updateBtn = document.getElementById('update');

updateBtn.addEventListener('click', async () => {
    const request = await fetch('/hobbies/update', {
        method: 'POST',
        body: JSON.stringify({})
    });
    
    let result = await request;

    if (result.status === 200) {
        location.reload();
    } else {
        alert("Что-то пошло не так...");
    }
});