$(document).ready(function(){
    $("#btn").click(function(){

        var name=document.getElementById('cd-name');
        var number=document.getElementById('cd-company');
        var notes=document.getElementById('cd-textarea');
        var major=document.getElementById('cd-budget');
        var grade=$("#cd-school").find("option:selected").text();  //获取Select选择的Text
        if(name.value=='') {
            alert('姓名不能为空!');
            name.focus();
            return false;
        }

        if(number.value.length!=11) {
            console.log("%s",number);
            alert('手机号码错误!');
            number.focus();
            return false;
        }


        name = encodeURIComponent(name.value);
        notes=encodeURIComponent(notes.value);
        number=number.value;
        major=encodeURIComponent(major.value);
        console.log("%s",number);
        console.log("window.location.href=\"submit.php?cd-name=+"+name+"&cd-company="+number+"&grade="+grade+"&major="+major+"&cd-textarea="+notes);
        alert('提交成功！');

		window.location.href="submit.php?cd-name="+name+"&cd-company="+number+"&grade="+grade+"&major="+major+"&cd-textarea="+notes;

    });
});