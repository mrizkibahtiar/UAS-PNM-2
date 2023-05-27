function clocks() {
    var date = new Date();
    let jam = date.getHours();
    let menit = date.getMinutes();
    let detik = date.getSeconds();
    const clock = document.querySelector("span#clock");
    clock.innerHTML = jam + " : " + menit + " : " + detik;
    setInterval(clocks, 1000);
}

clocks();