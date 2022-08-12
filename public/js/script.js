function load() {
    let input  = document.getElementById("email_username");
    if(input.value) {
        document.getElementById("eu").classList.add("act");
    }
}
function Time() {

    let time = new Date();
    let elemtime = document.getElementsByClassName("time")[0];
    let vaght;
    let hour =  time.getHours();//0-23
    let min = time.getMinutes();//0-59
    let sec = time.getSeconds();//0-59
    if( hour >= 5 && hour < 12){
       vaght="صبح بخیر";
    }else if(hour >= 12 && hour <15){
       vaght="ظهر بخیر";
    }else if(hour >= 15 && hour <20){
        vaght="عصر بخیر";
    }else if(hour >= 20){
        vaght="شب بخیر";
    }else{
        vaght="نیمه شب بخیر";
    }
    hour = (hour >= 10)?hour : "0"+hour;
    min = (min >= 10)?min : "0"+min;
    sec = (sec >= 10)?sec : "0"+sec;
    elemtime.innerHTML = `<div>${ hour }:${ min }:${ sec } <div><div dir="rtl">${ vaght }</div>`;
    setInterval(Time,1000);
}
Time();
