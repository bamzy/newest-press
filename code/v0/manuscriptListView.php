<!DOCTYPE html>
<html xmlns:onSelect="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Newest Manuscript Tracking System</title>
    <link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="./resources/jeasyui/demo/demo.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="newest.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="./resources/jeasyui/jquery.min.js"></script>
    <script type="text/javascript" src="./resources/jeasyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="js/mansuscript.js"></script>
    <script type="text/javascript" src="js/reviewer.js"></script>
    <script type="text/javascript" src="js/review.js"></script>

</head>
<body>

<div id="sidebarMainManuscriptContainer">
<div id="sidebar">
    <?php include "sidemenu_editor.php"; ?>
</div>
<div id="mainManuscriptContainer" class="easyui-tabs" >

    <div title="Manuscript & Reviews" style="padding:15px;">
        <div id="manuscriptMainContainer" style="padding: 5px">
            <table id="manuscriptTable" title="Manuscripts" class="easyui-datagrid" style="width: auto;height:400px;"
                   url="getManuscript.php"
                   onSelect:function(record){ alert(record.text)}
                   toolbar="#manuscriptToolbar" pagination="true"
                   remoteSort="false"
                   multiSort="true"
                   rownumbers="true" singleSelect="true">
                <thead>
                <tr>
                    <!--<th field="id" width="20">ID</th>-->
                    <th field="title" ,width="200" data-options="sortable:true">Title</th>
                    <th field="authorName" ,width="30" data-options="sortable:true">Author's Name</th>
                    <th field="authorFamily" ,width="30" data-options="sortable:true">Author's Family</th>
                    <th field="category" ,width="30" data-options="sortable:true">Category</th>
                    <th field="dateSubmitted" ,width="45" data-options="sortable:true">Submission Date</th>
                    <th field="status" ,width="25" data-options="sortable:true">Status</th>
                    <th field="notes" ,width="35" data-options="sortable:true">Notes</th>
                    <th field="dateStatus" ,width="75" data-options="sortable:true">Finalized Date</th>
                    <th field="content" ,width="45">Download</th>
                </tr>
                </thead>
            </table>
            <div id="manuscriptToolbar">
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newManuscript()">New
                    Manuscript</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editManuscript()">Edit
                    Manuscript</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
                   onclick="deleteManuscript()">Delete Manuscript</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-large-smartart" plain="true"
                   onclick="loadAssociatedReviewers()">Show Assigned Reviewers</a>
            </div>
            <div id="manuscriptDlg" class="easyui-dialog" style="top: 30% ;width:600px;height:400px;padding:10px 20px"
                 closed="true" buttons="#manuscript-dlg-buttons">
                <div class="ftitle">Add Manuscript</div>
                <form id="manuscriptFm" method="post" enctype="multipart/form-data">
                    <div class="fitem">
                        <label>Title:</label>
                        <input id='title' name="title" class="easyui-textbox" style="width: 300px" required="true">
                    </div>
                    <div class="fitem">
                        <label>Author:</label>
                        <input id='author' name="author" class="easyui-textbox" style="width: 300px" required="true">
                    </div>
                    <div class="fitem">
                        <label>Category:</label>
                        <input id="category" class="easyui-combobox" name="category"
                               data-options="valueField:'id',textField:'categoryName',url:'getCategory.php'">
                    </div>

                    <div class="fitem">
                        <label>Received Date:</label>
                        <input id='receivedDate' name="receivedDate" class="easyui-datebox" data-options="required:true,showSeconds:false,showHours:false" value="3/4/2015 2:3" style="width:150px">
                    </div>
                    <div class="fitem">
                        <label>Upload File:</label>
                        <input id='uploadedFile' name="uploadedFile" class="easyui-filebox"  style="width:300px;">
                    </div>
                    <div class="fitem">
                        <label>Or</label>

                    </div>
                    <div class="fitem">
                        <label>Paste Text:</label>
                        <input id='msText' name="msText" class="easyui-textbox"  data-options="multiline:true" style="width:530px;height: 300px">
                    </div>
                </form>

            </div>
            <div id="manuscript-dlg-buttons">
                <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveManuscript()"
                   style="width:90px">Save</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
                   onclick="javascript:$('#manuscriptDlg').dialog('close')" style="width:90px">Cancel</a>
            </div>
        </div>
        <!--review section-->
        <div id="reviewMainContainer" style="padding: 5px">
            <table id="associateReviewTable" title="Related Reviews" class="easyui-datagrid" style="width: 100% ;height:300px; "
                   url="getReview.php"
                   toolbar="#associateReviewToolbar"
                   pagination="true"
                   rownumbers="true"
                   fitColumns="true"
                   singleSelect="true">
                <thead>
                <tr>
                    <!--<th field="id" width="50">ID</th>-->
                    <th field="reviewerName" width="50">Reviewer Name</th>
                    <!--<th field="manuscriptTitle" width="50">Manuscript Title</th>-->
                    <th field="reviewDescription" width="50">Review Description</th>
                    <th field="finalDecision" width="50">Final Decision</th>
                    <th field="assignmentDate" width="50">Assignment Date</th>
                    <th field="decisionDate" width="50">Decision Date</th>
                </tr>
                </thead>
            </table>
            <div id="associateReviewToolbar">
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true"
                   onclick="assignReviewer()">Assign New Reviewer</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="deleteAssignedReviewer()">Delete Assigned Reviewer</a>

            </div>

            <div id="associateReviewerDlg" class="easyui-dialog" title="Select Reviewer"
                 style="top: 30%;width:400px;height:310px;padding:10px"
                 data-options="
                iconCls: 'icon-save',
                toolbar: '#addAssociateReviewToolbar',
                buttons: '#review-dlg-buttons',
                 closed:'true'">


                <select id="selectedReviewerRow" class="easyui-combogrid" style="width:300px" data-options="
                    panelWidth: 350,
                    idField: 'per_id',
                    textField: 'uname',
                    url: 'getReviewer.php',
                    method: 'get',
                    columns: [[
                        {field:'uname',title:'First Name',width:40},
                        {field:'fname',title:'Last Name',width:40},
                        {field:'stree',title:'Street',width:20,align:'right'}
                    ]],
                    fitColumns: true">
                </select>
            </div>
            <div id="review-dlg-buttons">
                <a href="javascript:void(0)" class="easyui-linkbutton" onclick="addNewReviewer()">Add</a>
                <a href="javascript:void(0)" class="easyui-linkbutton"
                   onclick="javascript:$('#associateReviewerDlg').dialog('close')">Close</a>
            </div>

        </div>
    </div>
<!--reviewer section -->

    <div title="Reviewers" style="padding:20px;">
        <table id="reviewerTable" title="Reviewers" class="easyui-datagrid" style="width:100%;height:600px"
               url="getReviewer.php"
               toolbar="#reviewerToolbar"
               pagination="true"
               remoteSort="false"
               multiSort="true"
               fitColumns="true"
               rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
            <tr>

                <th field="fname" width="50">First Name</th>
                <th field="lname" width="50">Last Name</th>
                <th field="street" width="50">Street</th>
                <th field="city" width="50">City</th>
                <th field="province" width="50">Province</th>
                <th field="phone" width="50">Phone</th>
                <th field="email" width="50">Email</th>
                <th field="created" width="50">Registration Date</th>
            </tr>
            </thead>
        </table>
        <div id="reviewerToolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newReviewer()">New
                Reviewer</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editReviewer()">Edit
                Reviewer</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
               onclick="deleteReviewer()">Delete Reviewer</a>
        </div>
        <div id="reviewerDlg" class="easyui-dialog" style="top:30%;width:400px;height:280px;padding:10px 20px"
             closed="true" buttons="#reviewer-dlg-buttons">
            <div class="ftitle">Reviewer Information</div>
            <form id="reviewerFm" method="post" novalidate>
                <div class="fitem">
                    <label>Name:</label>
                    <input name="Name" class="easyui-textbox" required="true">
                </div>
                <div class="fitem">
                    <label>Phone:</label>
                    <input name="Phone" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Email:</label>
                    <input name="email" class="easyui-textbox" validType="email">
                </div>
            </form>

        </div>
        <div id="reviewer-dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveReviewer()"
               style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
               onclick="javascript:$('#reviewerDlg').dialog('close')" style="width:90px">Cancel</a>
        </div>
    </div>

    <!--Author section -->
    <div title="Authors" style="padding:20px;">
        <table id="authorTable" title="Author" class="easyui-datagrid" style="width:100%;height:600px"
               url="getAuthor.php"
               toolbar="#authorToolbar"
               pagination="true"
               rownumbers="true"
               fitColumns="true"
               remoteSort="false"
               multiSort="true"
               singleSelect="true">
            <thead>
            <tr>

                <th field="fname" width="50">First Name</th>
                <th field="lname" width="50">Last Name</th>
                <th field="street" width="50">Street</th>
                <th field="city" width="50">City</th>
                <th field="province" width="50">Province</th>
                <th field="phone" width="50">Phone</th>
                <th field="email" width="50">Email</th>
                <th field="created" width="50">Registration Date</th>
            </tr>
            </thead>
        </table>
        <div id="authorToolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true"
               onclick="newAuthor()">New
                Author</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
               onclick="editAuthor()">Edit
                Author</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
               onclick="deleteAuthor()">Delete Author</a>
        </div>
        <div id="authorDlg" class="easyui-dialog" style="top: 30%;width:400px;height:280px;padding:10px 20px"
             closed="true" buttons="#author-dlg-buttons">
            <div class="ftitle">Author Information</div>
            <form id="authorFm" method="post" novalidate>
                <div class="fitem">
                    <label>Name:</label>
                    <input name="Name" class="easyui-textbox" required="true">
                </div>
                <div class="fitem">
                    <label>Phone:</label>
                    <input name="Phone" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Email:</label>
                    <input name="email" class="easyui-textbox" validType="email">
                </div>
            </form>

        </div>
        <div id="author-dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveAuthor()"
               style="width:90px">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
               onclick="javascript:$('#authorDlg').dialog('close')" style="width:90px">Cancel</a>
        </div>
    </div>
</div>
</div>



</body>
</html>