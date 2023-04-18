$(function(){
    $(document).tooltip();
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: '&#x3c;Пред',
        nextText: 'След&#x3e;',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
            'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн',
            'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);

    $('.datestart')
        .datepicker()
        .change(function () {
            val = $('.datestart').val();
            setCookie('datestart', val, new Date((new Date()).getTime() + (60 * 60 * 24 * 2)), '/');
        });


});

function fib(n) {
    let a = 1;
    let b = 1;
    for (let i = 3; i <= n; i++) {
        let c = a + b;
        a = b;
        b = c;
    }
    return b;
}

function setval(val, id) {//установить по умолчанию onblur
    if ($("#" + id).val() === "")
        $("#" + id).val(val);
    else if ($("#" + id).val() === "")
        $("#" + id).val(val);
}
function freeval(val, id) { //очистить поле - onclick
    if ($("#" + id).val() === val)
        $("#" + id).val("");
    else if ($("#" + id).val() === "")
        $("#" + id).val(val);
}

function setCookie(name, value, expires, path, domain, secure) {
    document.cookie = name + "=" + unescape(value) +
        ((expires) ? "; expires=" + expires.toGMTString() : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? ";   secure" : "");
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++)
    {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return "";
}


function alert_soob(head, body, top,intim,outtim) {
    $("<div align='left' id='info_message' style=' width:700px; z-index: 1000; position: absolute; top:" + top + ";left:507px;'>"+
        "<div class='ui-widget' style='width: 90%;  max-width:1200px; margin: 5px auto;padding: 12px; '><div class='ui-state-highlight ui-corner-all'"+
        "<p style='padding: 5px; '><span class='ui-icon ui-icon-info'  style=' float: left; margin-right: .3em;'></span><strong>"
        + head + "</strong>&nbsp;&nbsp;&nbsp;"+body+"</p></div></div></div>").appendTo("#soo");
    $('#info_message').hide();
    $('#info_message')
        .fadeIn(intim,
            function() {
            })
        .fadeOut(outtim,
            function() {
                $(this).remove();
            });
}

function validate_date(value)
{
    var arrD = value.split("-");
    arrD[1] -= 1;
    var d = new Date(arrD[0], arrD[1], arrD[2]);
    var arrD1 = value.split(".");
    arrD1[1] -= 1;
    var d1 = new Date(arrD1[2], arrD1[1], arrD1[0]);
    if ((d.getFullYear() == arrD[0]) && (d.getMonth() == arrD[1]) && (d.getDate() == arrD[2]))
        return true;
    else if( ((d1.getFullYear() == arrD1[2]) && (d1.getMonth() == arrD1[1]) && (d1.getDate() == arrD1[0])) )
        return true;
    else return false;
}

