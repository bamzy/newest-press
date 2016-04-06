/**
 * Created by bamdad on 2/12/2016.
 */
var url;
function newNotification() {
    $('#notificationDlg').dialog('open').dialog('setTitle', 'New Receiver');
    $('#notificationFm').form('clear');
    url = 'saveReviewer.php';
}


function deleteNotification() {
    var row = $('#notificationTable').datagrid('getSelected');
    console.log('-1');
    if (row == null) {
        console.log('0');
        alert("Select an Editor First");
        $('#notificationDlg').dialog('close');
    }
    console.log(row);
    console.log(row.comment);

    jQuery.ajax({
        url: 'deleteNotification.php',
        type: "POST",
        dataType: 'json',
        //data: { reviewID: row.id},
        data: {functionName: 'deleteNotification', arguments: [row.per_id]},
        success: function (obj, textstatus) {
            if (!('error' in obj)) {

                $('#notificationTable').datagrid('reload');
                $('#selectedEditorRow').combogrid('loadData', url);
                yourVariable = obj.result;
            }
            else {

                console.log(obj.error);
            }
        }
    });


}


function addNotification() {

    var val = $('#selectedEditorRow').combogrid('getValue');
    var row = $('#notificationTable').datagrid('getSelected');
    console.log(val);
    jQuery.ajax({
        url: 'addNotification.php',
        type: "POST",
        dataType: 'json',
        //data: { arguments: [row.id, val]},
        data: {functionName: 'addNotification', arguments: [val]},
        success: function (obj, textstatus) {
            if (!('error' in obj)) {

                $('#notificationTable').datagrid('reload');
                //$('#selectedEditorRow').combogrid('loadData');
                yourVariable = obj.result;
            }
            else {

                console.log(obj.error);
            }
        }
    });
}

