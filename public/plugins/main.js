function addSpin(classname,...input) {
    let html = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...';
    document.querySelector('.'+classname).innerHTML=html;
    document.querySelector('.'+classname).disabled = true;
    input.forEach(element => {
        document.querySelector('input[name='+element+']').readOnly = true;
    });

}
function removeSpin(classname,text='Lưu',...input) {
    document.querySelector('.'+classname).innerHTML = text;
    document.querySelector('.'+classname).disabled = false;
    input.forEach(element => {
        document.querySelector('input[name='+element+']').readOnly = false;
    });
}