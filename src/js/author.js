/**
 * Created by bamdad on 2/12/2016.
 */
var url;
function newAuthor() {
    $('#authorDlg').dialog('open').dialog('setTitle', 'New Author');
    $('#authorFm').form('clear');
    url = 'saveAuthor.php';
}
function editAuthor() {
    var row = $('#authorTable').datagrid('getSelected');
    if (row) {
        $('#authorDlg').dialog('open').dialog('setTitle', 'Edit Author');
        $('#authorFm').form('load', row);
        url = 'updateAuthor.php?id=' + row.id;
    } else
        alert('Please select an author first');

}
function saveAuthor() {
    $('#authorFm').form('submit', {
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
                $('#authorDlg').dialog('close');		// close the dialog
                $('#authorTable').datagrid('reload');	// reload the user data
            }
        }
    });
}
function deleteAuthor() {
    var row = $('#authorTable').datagrid('getSelected');
    if (row) {
        $.messager.confirm('Confirm', 'Are you sure you want to destroy this user?', function (r) {
            if (r) {
                $.post('deleteAuthor.php', {id: row.id}, function (result) {
                    if (result.success) {
                        $('#authorTable').datagrid('reload');	// reload the user data
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
