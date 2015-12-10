window.onload=function(){
    var formlogin = document.getElementById('Login_in');
    var oInput = formlogin.getElementsByTagName('input');
    var aName = oInput[0];
    var apsw = oInput[1];
    var ologin = oInput[2];
    var aP = formlogin.getElementsByTagName('p');
    var aName_msg = aP[0];
    var apsw_msg = aP[1];
    var allgood = true;
    aName.ok = false;
    apsw.ok = false;

    //用户名
     aName.onfocus=function(){
        aName_msg.style.display="inline";
        aName_msg.innerHTML='<i class="icon-info"></i>请输入用户名';
    }
     aName.onblur = function () {
        if (this.value == "") {
            aName_msg.innerHTML = '<i class="icon-cross"></i>不能为空';
            aName.ok = false;
        } else {
            aName_msg.innerHTML = '<i class="icon-checkmark"></i>初检通过了';
            aName.ok = true;
        }

    }
     
     //密码验证
    apsw.onfocus=function(){
        apsw_msg.style.display="inline";
        apsw_msg.innerHTML='<i class="icon-info"></i>请输入6-16个字符长度的密码';
    }
    apsw.onblur=function(){
        apsw_msg.innerHTML="";
        if(this.value==""){
            apsw_msg.innerHTML='<i class="icon-cross"></i>不能为空';
        }else{
        	apsw.ok = true;
        }
    }



    ologin.onclick = function () {
            for (var i = 0; i < 3; i++) {
                if (!aInput[i].ok) {
                    aInput[i].onfocus();
                    aInput[i].value="";
                    return allgood = false;
                }
            }
            return allgood;
        }
    
}