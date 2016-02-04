$(document).ready(function () {

    //Prepare jTable
    $('#manuscriptTableContainer').jtable({
        title: 'Manuscripts',
        paging: true,
        pageSize: 10,
        sorting: true,
        defaultSorting: 'id DSC',
        actions: {
            listAction: 'ManuscriptActionsPagedSorted.php?action=list',
            createAction: 'ManuscriptActionsPagedSorted.php?action=create',
            updateAction: 'ManuscriptActionsPagedSorted.php?action=update',
            deleteAction: 'ManuscriptActionsPagedSorted.php?action=delete'
        },
        fields: {
            id: {
                key: true,
                create: false,
                edit: false,
                list: true,
                width: '2%'
            },
            title: {
                title: 'Manuscript Title',
                width: '20%'
            },
            author: {
                title: "Author's Name",
                width: '15%'

            },
            category: {
                title: "Category",
                width: '12%'
            },
            receivedDate: {
                title: 'Received Date',
                width: '15%'
            },
            finalizedDate: {
                title: 'Finalization Date',
                width: '18%',
                type: 'date',
                create: false,
                edit: false
            },
            status: {
                title: 'Status',
                width: '10%'
            }
        }
    });

    //Load manuscript list from server
    $('#manuscriptTableContainer').jtable('load');
    //Prepare jTable
    $('#reviewerTableContainer').jtable({
        title: 'Reviewers',
        paging: true,
        pageSize: 10,
        sorting: true,
        defaultSorting: 'id Asc',
        actions: {
            listAction: 'ReviewerActionsPagedSorted.php?action=list',
            createAction: 'ReviewerActionsPagedSorted.php?action=create',
            updateAction: 'ReviewerActionsPagedSorted.php?action=update',
            deleteAction: 'ReviewerActionsPagedSorted.php?action=delete'
        },
        fields: {
            id: {
                key: true,
                create: false,
                edit: false,
                list: true,
                width: '2%'
            },
            name: {
                title: 'Name',
                width: '20%'
            },
            phone: {
                title: 'Phone',
                width: '15%'

            },
            email: {
                title: 'Email',
                width: '12%'
            },
            address: {
                title: 'Address',
                width: '15%'
            }
        }
    });

    //Load reviewers list from server
    $('#reviewerTableContainer').jtable('load');

    //Prepare jTable
    $('#assignedReviewersTableContainer').jtable({
        title: 'Reviewers assigned to Manuscript',
        paging: true,
        pageSize: 10,
        sorting: true,
        defaultSorting: 'id Asc',
        actions: {
            listAction: 'AssignedReviewersActionsPagedSorted.php?action=list',
            createAction: 'AssignedReviewersActionsPagedSorted.php?action=create',
            updateAction: 'AssignedReviewersActionsPagedSorted.php?action=update',
            deleteAction: 'AssignedReviewersActionsPagedSorted.php?action=delete'
        },
        fields: {
            id: {
                key: true,
                create: false,
                edit: false,
                list: true,
                width: '2%'
            },
            reviewerName: {
                title: 'Reviewer Name',
                width: '20%'
            },
            manuscriptName: {
                title: 'Manuscript Name',
                width: '10%'
            },
            reviewContent: {
                title: 'Review',
                width: '15%'

            },
            finalDecision: {
                title: 'Decision',
                width: '12%'
            }
        }
    });

    //Load assigned reviewers list from server
    $('#assignedReviewersTableContainer').jtable('load');


});


/**
 * Created by bamdad on 2/3/2016.
 */
