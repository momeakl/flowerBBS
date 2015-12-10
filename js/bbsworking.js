window.onload=function(){
	var allgood = true;
    var findid = document.getElementById('Register');
    var aInput = findid.getElementsByTagName('input');
    var oName = aInput[0];
    var psw = aInput[1];
    var psw2 = aInput[2];
    var email = aInput[3];
    var nime = aInput[4];
    var login = aInput[5];
    oName.ok = false;
    psw.ok = false;
    psw2.ok = false;
    email.ok = false;
    nime.ok = false;
    var aP = findid.getElementsByTagName('p');
    var oName_msg = aP[0];
    var psw_msg = aP[1];
    var psw2_msg = aP[2];
    var email_msg = aP[3];
    var nime_msg = aP[4];

    //用户名验证
   oName.onfocus = function () {
        oName_msg.style.display = "inline";
        oName_msg.innerHTML = '<i class="icon-info"></i>用户名需唯一';
    }
    oName.onblur = function () {
        if (this.value == "") {
            oName_msg.innerHTML = '<i class="icon-cross"></i>不能为空';
            oName.ok = false;
        } else {
            oName_msg.innerHTML = '<i class="icon-checkmark"></i>初检通过了';
            oName.ok = true;
        }

    }

    //邮箱验证
    email.onfocus = function () {
        email_msg.style.display = "inline";
        email_msg.innerHTML = '<i class="icon-info"></i>请输入一个可用的邮箱';
    }
    email.onblur = function () {
        var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        email_msg.innerHTML = "";
        if (this.value == "") {
            email_msg.innerHTML = '<i class="icon-cross"></i>不能为空';
        } else if (!re.test(this.value)) {
            email_msg.innerHTML = '<i class="icon-cross"></i>邮箱格式不正确';
        } else {
            email_msg.innerHTML = '<i class="icon-checkmark"></i>OK';
            email.ok = true;
        }
    }
    //密码验证
    psw.onfocus = function () {
        psw_msg.style.display = "block";
        psw_msg.innerHTML = '<i class="icon-info"></i>请输入6-16个字符长度,以解锁下一栏';
    }
    psw.onkeyup = function () {
        if (this.value.length > 6) {
            psw2.removeAttribute("disabled");
            psw2_msg.style.display = "inline";
            psw2_msg.innerHTML = '<i class="icon-info"></i>再次输入密码';
        }
    }
    psw.onblur = function () {
        psw_msg.innerHTML = "";

        if (this.value == "") {
            psw_msg.innerHTML = '<i class="icon-cross"></i>不能为空';
        } 
        else {
            if ((psw2.value)&&this.value != psw2.value) {
                psw_msg.innerHTML = '<i class="icon-cross"></i>两次密码不相同';
                psw.ok = false;
            }
            else if(this.value.length <= 6 || this.value.length > 16) {
                psw_msg.innerHTML = '<i class="icon-cross"></i>密码长度应在6-16个字符';
            } 
            else {
                psw_msg.innerHTML = '<i class="icon-checkmark"></i>OK';
                psw.ok = true;
            }
         }
        

    }
    //确认密码
    psw2.onfocus = function () {
        psw2_msg.innerHTML = '<i class="icon-info"></i>请确认密码';
    }
    psw2.onkeyup = function () {
        psw2_msg.innerHTML = "";
    }
    psw2.onblur = function () {
        if (this.value == "") {
            psw2_msg.innerHTML = '<i class="icon-cross"></i>不能为空';
        } else if (this.value != psw.value) {
            psw.value = "";
            psw2.value = "";
            psw2_msg.innerHTML = '<i class="icon-cross"></i>两次输入不一致，请重新输入!';

        } else {
            psw2_msg.innerHTML = '<i class="icon-checkmark"></i>OK';
            psw2.ok = true;
        }
    }

    //真实名验证
   nime.onfocus = function () {
        nime_msg.style.display = "inline";
        nime_msg.innerHTML = '<i class="icon-info"></i>input your name, sir';
    }
    nime.onblur = function () {
        if (this.value == "") {
            nime_msg.innerHTML = '<i class="icon-cross"></i>不能为空喔';
            nime.ok = false;
        } else {
            nime_msg.innerHTML = '<i class="icon-checkmark"></i>欢迎加入';
            nime.ok = true;
        }

    }
       //   提交验证
    login.onclick = function () {
            for (var i = 0; i < 5; i++) {
                if (!aInput[i].ok) {
                    aInput[i].onfocus();
                    aInput[i].value="";
                    return allgood = false;
                }
            }
            return allgood;
        }
}