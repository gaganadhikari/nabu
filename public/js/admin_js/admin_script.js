$(document).ready(function(){
    $("#current_pwd").keyup(function(){
        var current_pwd = $("#current_pwd").val();
       // alert(current_pwd);
        $.ajax({
            type:'post',
            url:'/admin/check-current-pwd',
            data:{current_pwd:current_pwd},
            success:function(resp){
                if(resp=="false"){
                    $("#chkCurrentPwd").append("<font color=red>Current Password Is Incorrect</font>");
                }else if (resp=="true"){
                    $("#chkCurrentPwd").append("<font color=green>Current Password Is Correct</font>");
                }
            },error:function(){
                alert('Error');
            }
        });
    });
});