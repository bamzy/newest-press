/**
 * Created by bamdad on 2/12/2016.
 */
var url;
function newReviewer() {
    $('#reviewerDlg').dialog('open').dialog('setTitle', 'New Reviewer');
    $('#reviewerFm').form('clear');
    url = 'saveReviewer.php';
}
function editReviewer() {
    var row = $('#reviewerTable').datagrid('getSelected');
    if (row) {
        $('#reviewerDlg').dialog('open').dialog('setTitle', 'Edit Reviewer');
        $('#reviewerFm').form('load', row);
        url = 'updateReviewer.php?id=' + row.id;
    } else
        alert('Please select a reviewer first');
}
function saveReviewer() {
    $('#reviewerFm').form('submit', {
        url: url,
        onSubmit: function () {
            return $(this).form('validate');
        },
        success: function (result) {
            var result = eval('(' + result + ')');
            if (result.errorMsg) {
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {

                $('#reviewerDlg').dialog('close');		// close the dialog
                $('#reviewerTable').datagrid('reload');	// reload the user data
            }
        }
    });
}
function deleteReviewer() {
    var row = $('#reviewerTable').datagrid('getSelected');
    if (row) {
        $.messager.confirm('Confirm', 'Are you sure you want to destroy this user?', function (r) {
            if (r) {
                $.post('deleteReviewer.php', {id: row.id}, function (result) {
                    if (result.success) {
                        $('#reviewerTable').datagrid('reload');	// reload the user data
                    } else {
                        $.messager.show({	// show error message
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    }
                }, 'json');
            }
        });
    }
}

function assignReviewer() {
    var row = $('#manuscriptTable').datagrid('getSelected');
    if (row == null) {
        alert("Select a Manuscript First");
        $('#associateReviewerDlg').dialog('close');
    }
    else
        $('#associateReviewerDlg').dialog('open').dialog('setTitle', 'New Manuscript');
    //$('#manuscriptFm').form('clear');
    //url = 'saveManuscript.php';
}
function deleteAssignedReviewer() {
    var row = $('#associateReviewTable').datagrid('getSelected');
    console.log('-1');
    if (row == null) {
        console.log('0');
        alert("Select a Reviewer First");
        $('#associateReviewerDlg').dialog('close');
    }
    console.log(row);
    console.log(row.comment);
    if (row['comment'] != null) {
        console.log('1');
        var r = confirm("This reviewer already submitted a review, are you sure you want to remove them?");
        if (r == false) {
            return;
        }
    }
    jQuery.ajax({
        url: 'unassignReviewer.php',
        type: "POST",
        dataType: 'json',
        //data: { reviewID: row.id},
        data: {functionName: 'unassignReviewer', arguments: [row.rev_id]},
        success: function (obj, textstatus) {
            if (!('error' in obj)) {

                $('#associateReviewTable').datagrid('reload');
                yourVariable = obj.result;
            }
            else {

                console.log(obj.error);
            }
        }
    });


}


function assignNewReviewer() {


    var val = $('#selectedReviewerRow').combogrid('getValue');
    var row = $('#manuscriptTable').datagrid('getSelected');
    jQuery.ajax({
        url: 'assignNewReviewer.php',
        type: "POST",
        dataType: 'json',
        //data: { arguments: [row.id, val]},
        data: {functionName: 'assignNewReview', arguments: [row.id, val]},
        success: function (obj, textstatus) {
            if (!('error' in obj)) {

                $('#associateReviewTable').datagrid('reload');
                yourVariable = obj.result;
            }
            else {

                console.log(obj.error);
            }
        }
    });
}


function loadAssociatedReviewers() {

    var row = $('#manuscriptTable').datagrid('getSelected');
    if (row) {
        $('#associateReviewTable').datagrid('reload', {
            id: row.id,
        });
    } else
        alert('Please select a manuscript first');

}