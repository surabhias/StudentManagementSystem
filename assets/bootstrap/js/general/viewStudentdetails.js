//base_url global declaration
var base_url = $('#base').val();

$(document).ready(function () {
   
});

// BRANCH WISE FILTTER 
function branchFilter(e) {
    
    var a = $('#student_email').val();

    $.ajax({
        type: "POST",
        url: base_url + "Admin/branchFilter",
        data: {
            studentBranch: e,
            studentEmail: a
        },
        success: function (data) {
            $('#branchdata').html(data);
        }
    });
}

// EMAL WISE FILTTER
function emailFilter(e) {

    var a = $('#branch').val();
   
    $.ajax({
        type: "POST",
        url: base_url + "Admin/emailFilter",
        data: {
            studentEmail: e,
            studentBranch: a
        },
        success: function (data) {
            $('#branchdata').html(data);
        }
    });
}