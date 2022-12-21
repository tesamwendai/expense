function addSpin(classname,...input) {
    let html = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...';
    let button =document.querySelector('.'+classname);
    button.setAttribute("data-text",button.textContent);
    button.innerHTML=html;
    button.disabled = true;
    input.forEach(element => {
        document.querySelector('input[name='+element+']').readOnly = true;
    });

}
function removeSpin(classname,...input) {
    let button =document.querySelector('.'+classname);
    console.log(button.getAttribute("data-text"))
    button.innerHTML = button.getAttribute("data-text")==null?button.textContent:button.getAttribute("data-text");
    button.disabled = false;
    input.forEach(element => {
        document.querySelector('input[name='+element+']').readOnly = false;
    });
}
function disabledBtn(classname){
    let button =document.querySelector('.'+classname);
    button.disabled = true;
}
function enabledBtn(classname){
    let button =document.querySelector('.'+classname);
    button.disabled = false;
}