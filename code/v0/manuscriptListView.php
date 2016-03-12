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
                   rownumbers="true" fitColumns="true" singleSelect="true">
                <thead>
                <tr>
                    <!--<th field="id" width="20">ID</th>-->
                    <th field="title" width="200">Title</th>
                    <th field="author" width="100">Author</th>
                    <th field="category" width="100">Category</th>
                    <th field="receivedDate" width="75">Submission Date</th>
                    <th field="status" width="75">Status</th>
                    <th field="finalizedDate" width="75">Finalized Date</th>
                    <th field="content" width="45">Download</th>
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
            <div id="manuscriptDlg" class="easyui-dialog" style="width:600px;height:400px;padding:10px 20px"
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
                   toolbar="#associateReviewToolbar" pagination="true"
                   rownumbers="true" fitColumns="true" singleSelect="true">
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
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="assignReviewer()">Assign a Reviewer</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="deleteAssignedReviewer()">Delete Assigned Reviewer</a>
            </div>

            <div id="associateReviewerDlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
                 closed="true" buttons="#associate-reviewer-dlg-buttons">
                <div class="ftitle">Reviewer Information</div>
                <form id="associateReviewerFm" method="post" novalidate>
                    <div class="fitem">
                        <label>Name:</label>
                        <input name="manuscriptId" class="easyui-textbox" required="true">
                    </div>
                    <div class="fitem">
                        <label>Phone:</label>
                        <input name="reviewerId" class="easyui-textbox" required="true">
                    </div>

                    <div class="fitem">
                        <label>Email:</label>
                        <input name="reviewContent" class="easyui-textbox" validType="email">
                    </div>
                </form>

            </div>
        </div>
    </div>
<!--reviewer section -->

    <div title="Reviewers" style="padding:20px;">
        <table id="reviewerTable" title="Reviewers" class="easyui-datagrid" style="width:100%;height:600px"
               url="getReviewer.php"
               toolbar="#reviewerToolbar" pagination="true"
               rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
            <tr>

                <th field="name" width="50">Name</th>
                <th field="phone" width="50">Phone</th>
                <th field="email" width="50">Email</th>
                <th field="content" width="50">Address</th>
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
        <div id="reviewerDlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
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
</div>
</div>



</body>
</html>