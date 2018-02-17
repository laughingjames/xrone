$(document).ready(function(){
    var job_id;
    $('.popup-with-zoom-anim').click(function () {
        var applyCount=$(this).parent().children('.hidden_apply_counts').text();
        var needCount=$(this).parent().children('.hidden_need_counts').text();
        job_id=$(this).parent().children('.hidden_job_id').text();
        $('#job_id').val(job_id);

        if(Number(applyCount)>=Number(needCount)){
            alert("Sorry,Now this work has been full of people," +
                " if you still need a part-time, " +
                "you can leave your contact information, " +
                "if the staff has changed, we will notify you. " +
                "Thank You for Your Cooperation.")
        }
    });

    $('#apply').click(function(){
        var name = document.getElementById("name").value;
        var phone_no = document.getElementById("phone_no").value;
        var passport_no = document.getElementById("passport_no").value;
        var country = document.getElementById("country").value;

        if(name==""||phone_no==""||passport_no==""||country==""){
            alert("PLEASE COMPLETE THE FORM.");
        }
        else{
            $.post('/index/job/apply',{
                    name:name,
                    phone_no:phone_no,
                    passport_no:passport_no,
                    country:country,
                    job_id:job_id},
                function (data,status) {
                    if (status == "success") {
                        alert("APPLICATION IS SUCCESSFUL, PLEASE WAIT PATIENTLY. THANKS FOR CORPERATION.\n");
                    }else{
                        alert("APPLICATION IS FAILED.PLEASE CONTACT THE MANAGER.\n");
                    }
                  location.reload();

                },"TEXT");
        }
    });


    $('#house_apply').click(function(){

        var name = document.getElementById("name").value;
        var phone_no = document.getElementById("phone_no").value;
        var passport_no = document.getElementById("passport_no").value;
        var house_id=$('#house_id').text();

        if(name==""||phone_no==""||passport_no==""){
            alert("PLEASE COMPLETE THE FORM.");
        }else{
            obj =$(this);

            $.post('apply',{name:name,phone_no:phone_no,passport_no:passport_no,house_id:house_id},function(r){
                // $("#boardmessage").append("<h4>"+_name+":"+_message+"</h4><p style=\"text-align:right;font-size:14px \">--就在刚刚</p>");
                alert('APPLICATION IS SUCCESSFUL, PLEASE WAIT PATIENTLY. THANKS FOR CORPERATION.');
                window.history.go(-1);
                //  alert('APPLICATION IS SUCCESSFUL, PLEASE WAIT PATIENTLY. THANKS FOR CORPERATION.');
                // window.location.href="#contact/information";
            });
        }
    });

});
