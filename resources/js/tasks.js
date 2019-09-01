$(document).ready(function(){
    
  });
  
  function setUserInfo(user, parent_id) {

    
    $("#email").val(user.email);
    $("#user_id").val(user.id);
    $("#parent_id").val(parent_id);
    

  }

/*
function completePayment() {
    $.ajax({
        type: "post",
        url: baseurl + '/payment_completed',
        data: "id=2" + "&_token=" + _token,
        success: function(data) {
            //alert(data);
            if (data.id) {

                console.log(data);

            }
        }
    });
}


*/