<!--<div id="sidebarMainManuscriptContainer">-->
<!--    <div id="sidebar">-->
<!--        --><?php //include "sidemenu_editor.php"; ?>
<!--    </div>-->
<div id="mainManuscriptContainer" class="easyui-tabs">

    <div title="Manuscript & Reviews" style="padding:15px;">
        <div id="manuscriptMainContainer" style="padding: 5px">
            <table id="manuscriptTable" title="Manuscripts" class="easyui-datagrid"
                   style="width: auto;height:400px;"
                   url="getManuscript.php"
                   onSelect:function(record){ alert(record.text)}
                   toolbar="#manuscriptToolbar" pagination="true"
                   remoteSort="false"
                   multiSort="true"
                   fitColumns="false"
                   rownumbers="true" singleSelect="true">
                <thead>
                <tr>
                    <th field="id" width="20" hidden="true">ID</th>
                    <th field="title" ,width="200" data-options="sortable:true">Title</th>
                    <th field="authorName" ,width="30" data-options="sortable:true">Author</th>
                    <th field="category" ,width="30" data-options="sortable:true">Category</th>
                    <th field="dateSubmitted" ,width="45" data-options="sortable:true">Submission Date</th>
                    <th field="status" ,width="25" data-options="sortable:true">Status</th>
                    <th field="notes" ,width="35" data-options="sortable:false">Notes</th>
                    <th field="dateStatus" ,width="75" data-options="sortable:true">Finalized Date</th>
                    <th field="downloadLink" ,width="45">Download</th>
                </tr>
                </thead>
            </table>
            <div id="manuscriptToolbar">
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true"
                   onclick="newManuscript()">New
                    Manuscript</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
                   onclick="editManuscript()">Edit
                    Manuscript</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
                   onclick="deleteManuscript()">Delete Manuscript</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-large-smartart" plain="true"
                   onclick="loadAssociatedReviewers()">Load Assigned Reviewers</a>
            </div>
            <div id="editManuscriptDlg" class="easyui-dialog"
                 style="top: 30% ;width:600px;height:400px;padding:10px 20px"
                 closed="true" buttons="#edit-manuscript-dlg-buttons">
                <div class="ftitle">Edit Manuscript</div>
                <!--                    <form id="manuscriptFm" method="post" >-->
                <form id="editManuscriptFm" method="post" enctype="multipart/form-data">
                    <div class="fitem">
                        <label>Title:</label>
                        <input id='title' name="title" class="easyui-textbox" style="width: 300px" required="true">
                    </div>
                    <div class="fitem">
                        <label>Author:</label>
                        <input id='authorName' name="authorName" class="easyui-combobox" style="width: 300px"
                               data-options="valueField:'id', textField:'authorName',url:'getAuthorSummary.php'"
                               required="true">
                    </div>
                    <div class="fitem">
                        <label>Category:</label>
                        <input id="category" name="category" class="easyui-combobox" name="category"
                               data-options="valueField:'id',textField:'categoryName',url:'getCategorySummary.php',panelHeight:'auto',">
                    </div>

                    <div class="fitem">
                        <label>Received Date:</label>
                        <input id='dateSubmitted' name="dateSubmitted" class="easyui-datebox"
                               data-options="required:true,showSeconds:false,showHours:false" value="3/4/2015 2:3"
                               style="width:150px">
                    </div>
                    <div class="fitem">
                        <label>Status:</label>
                        <input id="status" name="status" class="easyui-combobox" name="status"
                               data-options="valueField:'stat_id',textField:'stat_text',url:'getStatusSummary.php',panelHeight:'auto',">
                    </div>

                    <div class="fitem">
                        <label>Notes:</label>
                        <input id="notes" name="notes" class="easyui-textbox" name="notes" disabled="true"
                               data-options="multiline:true" style="width:400px;height: 200px">
                    </div>

                    <!--                        <div class="fitem">-->
                    <!--                            <label>Upload File:</label>-->
                    <!--                            <input id='uploadedFile' name="uploadedFile" class="easyui-filebox" style="width:300px;">-->
                    <!--                        </div>-->
                    <!--                        <div class="fitem">-->
                    <!--                            <label>Or</label>-->
                    <!---->
                    <!--                        </div>-->
                    <!--                        <div class="fitem">-->
                    <!--                            <label>Paste Text:</label>-->
                    <!--                            <input id='msText' name="msText" class="easyui-textbox" data-options="multiline:true"-->
                    <!--                                   style="width:530px;height: 300px">-->
                    <!--                        </div>-->
                </form>

            </div>

            <div id="addManuscriptDlg" class="easyui-dialog"
                 style="top: 30% ;width:600px;height:400px;padding:10px 20px"
                 closed="true" buttons="#add-manuscript-dlg-buttons">
                <div class="ftitle">Add Manuscript</div>
                <!--                    <form id="manuscriptFm" method="post" >-->
                <form id="editManuscriptFm" method="post" enctype="multipart/form-data">
                    <div class="fitem">
                        <label>Title:</label>
                        <input id='title' name="title" class="easyui-textbox" style="width: 300px" required="true">
                    </div>
                    <div class="fitem">
                        <label>Author:</label>
                        <input id='authorName' name="authorName" class="easyui-combobox" style="width: 300px"
                               data-options="valueField:'id', textField:'authorName',url:'getAuthorSummary.php'"
                               required="true">
                    </div>
                    <div class="fitem">
                        <label>Category:</label>
                        <input id="category" name="category" class="easyui-combobox" name="category"
                               data-options="valueField:'id',textField:'categoryName',url:'getCategorySummary.php',panelHeight:'auto',">
                    </div>

                    <div class="fitem">
                        <label>Received Date:</label>
                        <input id='dateSubmitted' name="dateSubmitted" class="easyui-datebox"
                               data-options="required:true,showSeconds:false,showHours:false" value="3/4/2015 2:3"
                               style="width:150px">
                    </div>
                    <div class="fitem">
                        <label>Status:</label>
                        <input id="status" name="status" class="easyui-combobox" name="status"
                               data-options="valueField:'stat_id',textField:'stat_text',url:'getStatusSummary.php',panelHeight:'auto',">
                    </div>

                    <div class="fitem">
                        <label>Notes:</label>
                        <input id="notes" name="notes" class="easyui-textbox" name="notes"
                               data-options="multiline:true" style="width:400px;height: 200px">
                    </div>

                    <div class="fitem">
                        <label>Upload File:</label>
                        <input id='uploadedFile' name="uploadedFile" class="easyui-filebox" style="width:300px;">
                    </div>

                </form>

            </div>


            <div id="edit-manuscript-dlg-buttons">
                <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok"
                   onclick="saveManuscript()"
                   style="width:90px">Save</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
                   onclick="javascript:$('#editManuscriptDlg').dialog('close')" style="width:90px">Cancel</a>
            </div>
            <div id="add-manuscript-dlg-buttons">
                <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok"
                   onclick="saveManuscript()"
                   style="width:90px">Save</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
                   onclick="javascript:$('#addManuscriptDlg').dialog('close')" style="width:90px">Cancel</a>
            </div>
        </div>

        <!--review section-->
        <div id="reviewMainContainer" style="padding: 5px">
            <table id="associateReviewTable" title="Related Reviews" class="easyui-datagrid"
                   style="width: 100% ;height:300px; "
                   url="getReview.php"
                   toolbar="#associateReviewToolbar"
                   pagination="true"
                   rownumbers="true"
                   fitColumns="true"
                   singleSelect="true">
                <thead>
                <tr>
                    <th field="rev_id" width="0" hidden="true">ID</th>
                    <th field="reviewer" width="50">Reviewer Name</th>
                    <th field="currentStat" width="50">Current Status</th>
                    <th field="dateIn" width="50">Assignment Date</th>
                    <th field="dateRec" width="50">Submitted Date</th>
                    <th field="comment" width="50">Comment</th>
                </tr>
                </thead>
            </table>
            <div id="associateReviewToolbar">
                <a id="assignButton" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add"
                   plain="true"
                   onclick="assignReviewer()">Assign New Reviewer</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
                   onclick="deleteAssignedReviewer()">Delete Assigned Reviewer</a>

            </div>

            <div id="associateReviewerDlg" class="easyui-dialog" title="Select Reviewer"
                 style="top: 30%;width:550px;height:200px;padding:10px"
                 data-options="
                        iconCls: 'icon-save',
                        toolbar: '#addAssociateReviewToolbar',
                        buttons: '#review-dlg-buttons',
                        closed:'true'">

                <form id="associateReviewerFm" method="post" enctype="multipart/form-data">
                    <div class="fitem">
                        <label>Select Reviewer:</label>
                        <select id="selectedReviewerRow" class="easyui-combogrid" style="width:400px" data-options="
                            panelWidth: 400,
                            idField: 'per_id',
                            textField: 'authorName',
                            url: 'getReviewerSummary.php',
                            method: 'get',
                            columns: [[
                                {field:'authorName',title:'Reviewer Name',width:30},

                                {field:'street',title:'Street',width:40,align:'right'}
                            ]],
                            fitColumns: true">
                        </select>
                    </div>
                </form>
            </div>
            <div id="review-dlg-buttons">
                <a href="javascript:void(0)" class="easyui-linkbutton" onclick="assignNewReviewer()">Add</a>
                <a href="javascript:void(0)" class="easyui-linkbutton"
                   onclick="javascript:$('#associateReviewerDlg').dialog('close')">Close</a>
            </div>

        </div>
    </div>
    <!--reviewer section -->

    <div title="Reviewers" style="padding:20px;">
        <table id="reviewerTable" title="Reviewers" class="easyui-datagrid" style="width:100%;height:710px"
               url="getReviewer.php"
               toolbar="#reviewerToolbar"
               pagination="true"
               remoteSort="false"
               multiSort="true"
               fitColumns="true"
               pageSize="40"
               rownumbers="true" fitColumns="true" singleSelect="true">
                <thead>
                <tr>
                    <th field="per_id" width="0" hidden="true" data-options="sortable:true">ID</th>
                    <th field="fname" width="50" data-options="sortable:true">First Name</th>
                    <th field="lname" width="50" data-options="sortable:true">Last Name</th>
                    <th field="street" width="50">Street</th>
                    <th field="postal" width="40" data-options="sortable:true">Postal Code</th>
                    <th field="city" width="50" data-options="sortable:true">City</th>
                    <th field="province" width="50" data-options="sortable:true">Province</th>
                    <th field="phone" width="50">Phone</th>
                    <th field="email" width="50">Email</th>
                    <th field="created" width="50" data-options="sortable:true">Registration Date</th>
                </tr>
                </thead>
            </table>
        <div id="reviewerToolbar">
            <!--                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true"-->
            <!--                   onclick="newReviewer()">New-->
            <!--                    Reviewer</a>-->
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
               onclick="editReviewer()">Edit
                Reviewer</a>
            <!--                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"-->
            <!--                   onclick="deleteReviewer()">Delete Reviewer</a>-->
            </div>
        <div id="reviewerDlg" class="easyui-dialog" style="top:30%;width:400px;height:400px;padding:10px 20px"
             closed="true" buttons="#reviewer-dlg-buttons">
            <div class="ftitle">Reviewer Information</div>
            <form id="reviewerFm" method="post" novalidate>
                <div class="fitem" hidden="true">
                    <label>ID:</label>
                    <input name="per_id" class="easyui-textbox" contenteditable="false" hidden="true">
                </div>
                    <div class="fitem">
                        <label>First Name:</label>
                        <input name="fname" class="easyui-textbox" required="true">
                    </div>
                    <div class="fitem">
                        <label>Last Name:</label>
                        <input name="lname" class="easyui-textbox" required="true">
                    </div>
                    <div class="fitem">
                        <label>Street:</label>
                        <input name="street" class="easyui-textbox" required="true">
                    </div>
                    <div class="fitem">
                        <label>Postal Code:</label>
                        <input name="postal" class="easyui-textbox" required="true">
                    </div>
                    <div class="fitem">
                        <label>City:</label>
                        <input name="city" class="easyui-textbox" required="true">
                    </div>
                    <div class="fitem">
                        <label>Province:</label>
                        <!--                        <input name="province" class="easyui-combobox" required="true">-->
                        <select id="province" class="easyui-combobox" name="province">
                            <option>AB</option>
                            <option>BC</option>
                            <option>MB</option>
                            <option>NB</option>
                            <option>NL</option>
                            <option>NS</option>
                            <option>ON</option>
                            <option>PE</option>
                            <option>QC</option>
                            <option>SK</option>
                        </select>
                    </div>
                    <div class="fitem">
                        <label>Phone:</label>
                        <input name="phone" class="easyui-textbox" required="false">
                    </div>

                <div class="fitem">
                    <label>Email:</label>
                    <input name="email" class="easyui-textbox" validType="email" required="true">
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
        <table id="authorTable" title="Authors" class="easyui-datagrid" style="width:100%;height:710px"
               url="getAuthor.php"
               toolbar="#authorToolbar"
               pagination="true"
               rownumbers="true"
               fitColumns="true"
               remoteSort="false"
               multiSort="true"
               pageSize="40"
               singleSelect="true">
                <thead>


                <tr>
                    <th field="per_id" width="0" hidden="true">ID</th>
                    <th field="fname" width="50">First Name</th>
                    <th field="lname" width="50">Last Name</th>
                    <th field="street" width="50">Street</th>
                    <th field="postal" width="40">Postal Code</th>
                    <th field="city" width="50">City</th>
                    <th field="province" width="50">Province</th>
                    <th field="phone" width="50">Phone</th>
                    <th field="email" width="50">Email</th>
                    <th field="created" width="50">Registration Date</th>
                </tr>
                </thead>
            </table>
        <div id="authorToolbar">
            <!--                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true"-->
            <!--                   onclick="newAuthor()">New-->
            <!--                    Author</a>-->
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
               onclick="editAuthor()">Edit
                Author</a>
            <!--                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"-->
            <!--                   onclick="deleteAuthor()">Delete Author</a>-->
            </div>
        <div id="authorDlg" class="easyui-dialog" style="top: 30%;width:400px;height:280px;padding:10px 20px"
             closed="true" buttons="#author-dlg-buttons">
            <div class="ftitle">Author Information</div>
            <form id="authorFm" method="post" novalidate>
                <div class="fitem" hidden="true">
                    <label>ID:</label>
                    <input name="per_id" class="easyui-textbox" contenteditable="false" hidden="true">
                </div>
                <div class="fitem">
                    <label>First Name:</label>
                    <input name="fname" class="easyui-textbox" required="true">
                </div>
                <div class="fitem">
                    <label>Last Name:</label>
                    <input name="lname" class="easyui-textbox" required="true">
                </div>
                <div class="fitem">
                    <label>Street:</label>
                    <input name="street" class="easyui-textbox" required="true">
                </div>
                <div class="fitem">
                    <label>Postal Code:</label>
                    <input name="postal" class="easyui-textbox" required="true">
                </div>
                <div class="fitem">
                    <label>City:</label>
                    <input name="city" class="easyui-textbox" required="true">
                </div>
                <div class="fitem">
                    <label>Province:</label>
                    <!--                        <input name="province" class="easyui-combobox" required="true">-->
                    <select id="province" class="easyui-combobox" name="province">
                        <option>AB</option>
                        <option>BC</option>
                        <option>MB</option>
                        <option>NB</option>
                        <option>NL</option>
                        <option>NS</option>
                        <option>ON</option>
                        <option>PE</option>
                        <option>QC</option>
                        <option>SK</option>
                    </select>
                </div>
                <div class="fitem">
                    <label>Phone:</label>
                    <input name="phone" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Email:</label>
                    <input name="email" class="easyui-textbox" validType="email" required="true">
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

    <!--Notification section -->
    <div title="Notification" style="padding:20px;">
        <div id="notificationMainContainer" style="padding: 0px">
            <table id="notificationTable" title="Notification" class="easyui-datagrid"
                   style="width: 100% ;height:710px; "
                   url="getEditorSummary.php?mode=notified_enabled"
                   toolbar="#notificationToolbar"
                   pagination="false"
                   rownumbers="false"
                   fitColumns="true"
                   singleSelect="true">
                <thead>
                <tr>
                    <th field="per_id" width="0" hidden="true">ID</th>
                    <th field="editorName" width="50">Editor Name</th>
                    <th field="email" width="50">email</th>
                </tr>
                </thead>
            </table>
            <div id="notificationToolbar">
                <a id="" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add"
                   plain="true"
                   onclick="newNotification()">Add Notification Receiver</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
                   onclick="deleteNotification()">Remove Notification Receiver</a>

                </div>

            <div id="notificationDlg" class="easyui-dialog" title="Select Receiver"
                 style="top: 30%;width:550px;height:200px;padding:10px"
                 data-options="
                            iconCls: 'icon-save',
                            toolbar: '#addNotificationToolbar',
                            buttons: '#notification-dlg-buttons',
                            closed:'true'">

                <form id="notificationFm" method="post" enctype="multipart/form-data">
                    <div class="fitem">
                        <label>Select Editor:</label>
                        <select id="selectedEditorRow" class="easyui-combogrid" style="width:400px" data-options="
                                panelWidth: 400,
                                idField: 'per_id',
                                textField: 'editorName',
                                url: 'getEditorSummary.php?mode=notified_disabled',
                                method: 'get',
                                columns: [[
                                    {field:'editorName',title:'Editor Name',width:30},

                                    {field:'email',title:'email',width:40,align:'right'}
                                ]],
                                fitColumns: true">
                        </select>
                    </div>
                </form>
                </div>
            <div id="notification-dlg-buttons">
                <a href="javascript:void(0)" class="easyui-linkbutton" onclick="addNotification()">Add</a>
                <a href="javascript:void(0)" class="easyui-linkbutton"
                   onclick="javascript:$('#notificationDlg').dialog('close')">Close</a>
                </div>

        </div>
        </div>
    </div>
</div>


</body>
</html>