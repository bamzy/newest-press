<?php

include 'manutrack.php';
sess();
include 'header.php';
?>
<link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/color.css">
<link rel="stylesheet" type="text/css" href="./resources/jeasyui/demo/demo.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="newest.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="./resources/jeasyui/jquery.min.js"></script>
<script type="text/javascript" src="./resources/jeasyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="js/manuscript.js"></script>
<div id="main" class="main">
    <div id="sidebar"><?php include 'sidemenu_author.php' ?></div>
    <div style="margin: 30px; font-size: 14px;">
        <p><b>Once you have submitted a manuscript you MUST also provide a print copy by mail to:</p>
        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="displayManuscriptDialog()">New Manuscript
            Submission</a>
        <p>NeWest Press<br/>
            Attn: Acquisitions<br/>
            #201 8540 - 109 Street<br/>
            Edmonton, Alberta T6G 1E6</p>
        <p>For further information please see our <a href="https://newestpress.com/submissions" target="_blank">submission
                guidelines</a>.</p>
        </b>
        </p>
    </div>
    <div id="submit-manuscript-dlg" class="easyui-dialog" style="width:500px;height:550px;padding:10px 30px;top: 30%"
         closed="true"
         title="Register" buttons="#dlg-buttons">
        <h2>Manuscript Information</h2>
        <form id="submitManuscriptFm" method="post" enctype="multipart/form-data">
            <div class="fitem" hidden="hidden">
                <label>per_id:</label>
                <input id='per_id' name="per_id" class="easyui-textbox" style="width: 300px" required="false"
                       value="<?php echo $_SESSION['per_id']; ?>">
            </div>
            <div class="fitem">
                <label>Title:</label>
                <input id='title' name="title" class="easyui-textbox" style="width: 300px" required="true">
            </div>

            <div class="fitem">
                <label>Category:</label>
                <input id="category" name="category" class="easyui-combobox" name="category" required="true"
                       data-options="valueField:'categoryName',textField:'categoryName',url:'getCategorySummary.php',panelHeight:'auto',">
            </div>


            <div class="fitem">
                <label>Upload File:</label>
                <input id='uploadedFile' name="uploadedFile" class="easyui-filebox" style="width:300px;"
                       required="true">
            </div>
            <div class="fitem">
                <label>Your Notes:</label>
                <input id="notes" name="notes" class="easyui-textbox" name="notes"
                       data-options="multiline:true" style="width:400px;height: 300px">
            </div>

        </form>
    </div>
    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="addManuscript()">Submit</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-cancel"
           onclick="javascript:$('#submit-manuscript-dlg').dialog('close')">Cancel</a>
    </div>
</div>

<?php include 'footer.php' ?>
</body>
</html>
