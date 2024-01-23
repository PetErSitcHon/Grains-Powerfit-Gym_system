const currenTime = document.querySelector(".time");

const getTime = () => {
    const hour = new Date().getHours();
    const min = new Date().getMinutes();
    const sec = new Date().getSeconds();
    currenTime.innerHTML = `
        <span>${hour} :</span>
        <span>${min} :</span>
        <span>${sec}</span>
    `;
    setTimeout(() => {getTime()}, 1000);
}

getTime();