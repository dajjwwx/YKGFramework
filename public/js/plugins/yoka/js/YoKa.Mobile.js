function WidthMove(id) {
    var obj = document.getElementById(id), iNum = 0, timer = null;
    var
        oBtn_l = getByClass(obj, 'main_top_left')[0],
        oBtn_l_img = getByClass(obj, 'main_top_left_img')[0],
        oBtn_r = getByClass(obj, 'main_top_right')[0], 
        oBtn_r_img = getByClass(obj, 'main_top_right_img')[0];
    var
        oDiv = getByClass(obj, 'main')[0],
        aLi = getByClass(obj, 'main1'),
        aTopImg = getByClassNo(obj, 'main_top_');

    oBtn_l.onclick = oBtn_l_img.onclick = toRun_l;
    oBtn_r.onclick = oBtn_r_img.onclick = toRun_r;

    oDiv.style.width = aLi[0].offsetWidth * aLi.length + 'px';
    btnHide();
    function toRun_r() {
        if (iNum == aLi.length - 1) {
            return;
        } else {
            iNum++;
        }
        btnHide();
        startMove(oDiv, { 'marginLeft': -iNum * aLi[0].offsetWidth });
    }
    function toRun_l() {
        if (iNum == 0) {
            return;
        } else {
            iNum--;
        }
        btnHide();
        startMove(oDiv, { 'marginLeft': -iNum * aLi[0].offsetWidth });
    }
    for (var i = 0; i < aTopImg.length; i++) {
        aTopImg[i].onmouseover = oBtn_l.onmouseover = oBtn_l_img.onmouseover = oBtn_r.onmouseover = oBtn_r_img.onmouseover = function () {
            clearTimeout(timer);
            oBtn_l.style.display = 'block';
            oBtn_l_img.style.display = 'block';
            oBtn_r.style.display = 'block';
            oBtn_r_img.style.display = 'block';
        }
        aTopImg[i].onmouseout = oBtn_l.onmouseout = oBtn_l_img.onmouseout = oBtn_r.onmouseout = oBtn_r_img.onmouseout = function () {
            timer = setTimeout(function () {
                oBtn_l.style.display = 'none';
                oBtn_l_img.style.display = 'none';
                oBtn_r.style.display = 'none';
                oBtn_r_img.style.display = 'none';
            }, 100);
        }
    }
    function btnHide() {

        oBtn_l.style.filter = 'alpha(opacity:10)';
        oBtn_l.style.opacity = 0.1;
        oBtn_l_img.style.filter = 'alpha(opacity:100)';
        oBtn_l_img.style.opacity = 1;
        oBtn_r.style.filter = 'alpha(opacity:10)';
        oBtn_r.style.opacity = 0.1;
        oBtn_r_img.style.filter = 'alpha(opacity:100)';
        oBtn_r_img.style.opacity = 1;
        oBtn_l.style.cursor = 'pointer';
        oBtn_l_img.style.cursor = 'pointer';
        oBtn_r.style.cursor = 'pointer';
        oBtn_r_img.style.cursor = 'pointer';

        if (iNum == 0 ) {
            oBtn_l.style.filter = 'alpha(opacity:0)';
            oBtn_l.style.opacity = 0;
            oBtn_l_img.style.filter = 'alpha(opacity:0)';
            oBtn_l_img.style.opacity = 0;
            oBtn_l.style.cursor = 'auto';
            oBtn_l_img.style.cursor = 'auto';
        } else if (iNum == aLi.length - 1) {
            oBtn_r.style.filter = 'alpha(opacity:0)';
            oBtn_r.style.opacity = 0;
            oBtn_r_img.style.filter = 'alpha(opacity:0)';
            oBtn_r_img.style.opacity = 0;
            oBtn_r.style.cursor = 'auto';
            oBtn_r_img.style.cursor = 'auto';
        } 
    }
}


function getByClass(oParent, sClass) {
    var aEle = oParent.getElementsByTagName('*'), aResult = [], re = new RegExp('\\b' + sClass + '\\b', 'i'), i = 0;
    for (i = 0; i < aEle.length; i++) {
        if (re.test(aEle[i].className)) {
            aResult.push(aEle[i]);
        }
    }
    return aResult;
} 
function getByClassNo(oParent, sClass) {
    var aEle = oParent.getElementsByTagName('*'), aResult = [], re = new RegExp('\\b' + sClass + '\\d+\\b', 'i'), i = 0;
    for (i = 0; i < aEle.length; i++) {
        if (re.test(aEle[i].className)) {
            aResult.push(aEle[i]);
        }
    }
    return aResult;
}
function startMove(obj, json, fnEnd) {
    clearInterval(obj.timer);
    obj.timer = setInterval(function () {
        doMove(obj, json, fnEnd);
    }, 30);
}
function doMove(obj, json, fnEnd) {
    var iCur = 0;
    var attr = null;
    var bBtn = true;
    for (attr in json) {
        if (attr == 'opacity') {
            if (parseInt(100 * getStyle(obj, attr)) == 0) {
                iCur = parseInt(100 * getStyle(obj, attr));
            }
            else {
                iCur = parseInt(100 * getStyle(obj, attr)) || 100;
            }
        }
        else {
            iCur = parseInt(getStyle(obj, attr)) || 0;
        }

        var iSpeed = (json[attr] - iCur) / 8;
        iSpeed = (iSpeed > 0) ? Math.ceil(iSpeed) : Math.floor(iSpeed);

        if (iCur != json[attr]) {
            bBtn = false;
        }

        if (attr == 'opacity') {
            obj.style.filter = 'alpha(opacity=' + (iCur + iSpeed) + ')';
            obj.style.opacity = (iCur + iSpeed) / 100;
        }
        else {
            obj.style[attr] = iCur + iSpeed + 'px';
        }

    }
    if (bBtn) {
        clearInterval(obj.timer);
        if (fnEnd) {
            fnEnd.call(obj);
        }
    }
}
function getStyle(obj, attr) {
    if (obj.currentStyle) {
        return obj.currentStyle[attr];
    }
    else {
        return getComputedStyle(obj)[attr];
    }
}