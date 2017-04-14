




// AJAX request
$.post("http://app.sr/mijn_ebsaccount/backend/api/index.php/user/register", {
    // get values from the input fields
    user_id: $('#user_id').val()
},
function(data, status){
    // api stuurt success
    if (data == 1) {
       window.location = "index.html"; 
    } else {
        alert("Niet success!!");
    }
});

// AJAX request
$.get("link_here", function(data, status){
    // convert JSON array into JS array
    var responseData = JSON.parse(data);
    
    console.log(responseData);
    
    // loop the JSON data
    $.each(responseData, function (i, value) {
        console.log(responseData[i].value1);
    });
});