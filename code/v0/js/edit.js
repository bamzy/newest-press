function selectEditRequirement() {
    $("#edreqid").change(function () {
        console.log('called');
        if ($('#recid').val())
            $('#reviewSubmitButton').show();
    });
}

function selectRecommendation() {
    $("#recid").change(function () {
        console.log('called');
        if (!$('#edreqid').val())
            $('#reviewSubmitButton').show();
    });
}
function validateForm() {

    if (!$('#recid').val()) {
        alert("Please Select a Recommendation");
        return false;
    }

    if (!$('#edreqid').val()) {
        alert("Please Select an Edit Requirement");
        return false;
    }


    return true;
}