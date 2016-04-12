/**
 * Created by bamdad on 2/12/2016.
 */
var url;
function newManuscript() {
    $('#addManuscriptDlg').dialog('open').dialog('setTitle', 'New Manuscript');
    $('#addManuscriptDlg').form('clear');
    url = 'saveManuscript.php';
}
function editManuscript() {
    var row = $('#manuscriptTable').datagrid('getSelected');
    if (row) {
        $('#editManuscriptDlg').dialog('open').dialog('setTitle', 'Edit Manuscript');
        $('#editManuscriptFm').form('load', row);
        url = 'updateManuscript.php?id=' + row.id;
    }
}
function addManuscript() {
    $('#submitManuscriptFm').form('submit', {
        url: 'submitManuscript.php',
        onSubmit: function () {
            //return $(this).form('validate');
        },
        success: function (result) {
            var result = eval('(' + result + ')');
            if (result.errorMsg) {
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {
                alert('Submission was Successfull');
                $('#submit-manuscript-dlg').dialog('close');		// close the dialog
                //$('#manuscriptTable').datagrid('reload');	// reload the user data
            }
        }
    });
}

function saveManuscript() {
    $('#manuscriptFm').form('submit', {
        url: url,
        onSubmit: function () {
            //return $(this).form('validate');
        },
        success: function (result) {
            var result = eval('(' + result + ')');
            if (result.errorMsg) {
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {
                $('#manuscriptDlg').dialog('close');		// close the dialog
                $('#manuscriptTable').datagrid('reload');	// reload the user data
            }
        }
    });
}
function deleteManuscript() {
    var row = $('#manuscriptTable').datagrid('getSelected');
    if (row) {
        $.messager.confirm('Confirm', 'Are you sure you want to destroy this manuscript?', function (r) {
            if (r) {
                $.post('deleteManuscript.php', {id: row.id}, function (result) {
                    if (result.success) {
                        $('#manuscriptTable').datagrid('reload');	// reload the user data
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
function displayManuscriptDialog() {
    $('#submit-manuscript-dlg').dialog('open').dialog('setTitle', 'New Submission');
    console.log(1);


}
//
//$("#manuscriptTable").datagrid.(function() {
//    //var selected = $(this).hasClass("highlight");
//    //$("#data tr").removeClass("highlight");
//    //if(!selected)
//});
//
//function loadAssociatedReviewers(){
//    var row = $('#manuscriptTable').datagrid('getSelected');
//    if (row){
//        alert('Item ID:'+row.id+"\n");
//        console.log('hh');
//        $('#reviewerTable').datagrid('reload');
//    }
//}