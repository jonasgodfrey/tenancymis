function formatMoney(money) {
    return (money).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}

function formatDate(date) {
    var d = date.getDate();
    var m = date.getMonth() + 1; //Month from 0 to 11
    var y = date.getFullYear();
    return '' + y + '-' + (m<=9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);
}