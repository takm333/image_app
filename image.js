window.onload = function() {

    let red = document.getElementById("red");
    let green = document.getElementById("green");
    let blue = document.getElementById("blue");
    let sample = document.getElementById("sample");

    red.addEventListener('change',(e) => {
        document.getElementsByClassName('red')[0].textContent = red.value;
        sample_color_change();
    });

    green.addEventListener('change',(e) => {
        document.getElementsByClassName('green')[0].textContent = green.value;
        sample_color_change();
    });

    blue.addEventListener('change',(e) => {
        document.getElementsByClassName('blue')[0].textContent = blue.value;
        sample_color_change();
    });

    function sample_color_change(){
        let sample_color = 'rgb(' + red.value + ',' + green.value + ',' + blue.value + ')' ;
        sample.style.backgroundColor = sample_color;
    }

    document.getElementsByClassName('red')[0].textContent = red.value;
    document.getElementsByClassName('green')[0].textContent = green.value;
    document.getElementsByClassName('blue')[0].textContent = blue.value;
    sample_color_change();
}
