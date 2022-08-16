
function validateEmail1197929000036896019() {
    var form = document.forms['WebToContacts1197929000036896019'];
    var emailFld = form.querySelectorAll('[ftype=email]');
    var i;
    for (i = 0; i < emailFld.length; i++) {
        var emailVal = emailFld[i].value;
        if ((emailVal.replace(/^\s+|\s+$/g, '')).length != 0) {
            var atpos = emailVal.indexOf('@');
            var dotpos = emailVal.lastIndexOf('.');
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= emailVal.length) {
                alert('Please enter a valid email address. ');
                emailFld[i].focus();
                return false;
            }
        }
    }
    return true;
}

function checkMandatory1197929000036896019() {
    var mndFileds = new Array('First Name', 'Last Name', 'Email', 'Department', 'Phone', 'Description',
        'Salutation', 'CONTACTCF1');
    var fldLangVal = new Array('\u516C\u53F8\x2F\u7D44\u7E54', '\u7A31\u547C', 'Email', '\u8077\u7A31',
        'Phone', '\u60A8\u7684\u7559\u8A00', '\u6B32\u4E86\u89E3\u7522\u54C1', '\u570B\u5BB6');
    for (i = 0; i < mndFileds.length; i++) {
        var fieldObj = document.forms['WebToContacts1197929000036896019'][mndFileds[i]];
        if (fieldObj) {
            if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length == 0) {
                if (fieldObj.type == 'file') {
                    alert('Please select a file to upload.');
                    fieldObj.focus();
                    return false;
                }
                alert(fldLangVal[i] + ' cannot be empty.');
                fieldObj.focus();
                return false;
            } else if (fieldObj.nodeName == 'SELECT') {
                if (fieldObj.options[fieldObj.selectedIndex].value == '-None-') {
                    alert(fldLangVal[i] + ' cannot be none.');
                    fieldObj.focus();
                    return false;
                }
            } else if (fieldObj.type == 'checkbox') {
                if (fieldObj.checked == false) {
                    alert('Please accept  ' + fldLangVal[i]);
                    fieldObj.focus();
                    return false;
                }
            }
            try {
                if (fieldObj.name == 'Last Name') {
                    name = fieldObj.value;
                }
            } catch (e) {}
        }
    }
    if (!validateEmail1197929000036896019()) {
        return false;
    }
    document.querySelector('.crmWebToEntityForm .formsubmit').setAttribute('disabled', true);
}

function tooltipShow1197929000036896019(el) {
    var tooltip = el.nextElementSibling;
    var tooltipDisplay = tooltip.style.display;
    if (tooltipDisplay == 'none') {
        var allTooltip = document.getElementsByClassName('zcwf_tooltip_over');
        for (i = 0; i < allTooltip.length; i++) {
            allTooltip[i].style.display = 'none';
        }
        tooltip.style.display = 'block';
    } else {
        tooltip.style.display = 'none';
    }
}
    