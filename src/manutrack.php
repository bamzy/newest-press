<?php
//function to connect to database
include_once('./model/mysqlConnection.php');
function connect()
{

//<<<<<<< HEAD
//$link = mysql_connect("localhost","newest", "OZqXiGU&]D","");
//
//	if (!$link) {
//
//    	die('Not connected : ' . mysql_error());
//		return false;
//	}
//
//$db = mysql_select_db('newest', $link);
//
//	if (!$db) {
//
//    	die ("That database doesn't exist : " . mysql_error());
//    	return false;
//	}
//
//return true;
//=======
    return include_once('./model/mysqlConnection.php');

//	$link = mysql_pconnect("localhost", "root", "salam");
//
//	if (!$link) {
//
//    	die('Not connected : ' . mysql_error());
//		return false;
//	}
//
//$db = mysql_select_db('newest', $link);
//
//	if (!$db) {
//
//    	die ("That database doesn't exist : " . mysql_error());
//    	return false;
//	}
//	include './model/mysqlConnection.php';
// true;
//>>>>>>> abd81482364f328cb1e30ff10902557ca2c7bb12

} //end connect


function auth($username, $userpass)
{
    $safe = "bunchwordspiswallopnomeeeenerthang9357211";
    $upass = md5($userpass . $safe);
    $query = "SELECT pass FROM tbl_people WHERE uname = " . "'" . $username . "'";
    if (!$res = mysqlConnection::getConnection()->query($query)) {
        die('There was an error running the query [' . $query->error . ']');
    }
    $row = $res->fetch_assoc();
    if ($row == null) {
        printf("That username does not exist. Would you like to <a href='./register.html'>register</a>?");
        return false;
    } else {
        $pass = $row;
        if ($pass['pass'] == $upass) {
            return true;
        } else {
            return false;
        }
    }
}

function sess()
{

    session_start();

    session_regenerate_id();

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
    }

    if (isset($_REQUEST['_SESSION'])) die("Nothing for you.");

    printf('<html>
<head>
<!DOCTYPE html>
<title>NeWest Press - Manuscript Tracking System</title>
<link rel="stylesheet" href="newest.css" type="text/css">
<title>Newest Manuscript Tracking System</title>
</head>
<body>
   <div id="wrap" class="main" >');

    //printf ('<p>You are logged in as <span class="username">'.$_SESSION['user'].'</span>.</p>');
}

function sess2()
{

    session_start();

    session_regenerate_id();

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
    }

    if (isset($_REQUEST['_SESSION'])) die("Nothing for you.");

}

function getuname($uid)
{

    $cloud = mysql_query("SELECT uname FROM tbl_people where per_id=$uid") or die(mysql_error());

    $arr = mysql_fetch_assoc($cloud);

    $uname = $arr['uname'];

    return $uname;

}

function getuser($uid)
{

//    $cloud = mysql_query("SELECT * FROM tbl_people where per_id=$uid") or die(mysql_error());
    $query = "SELECT * FROM tbl_people where per_id={$uid}";
    if (!$res = mysqlConnection::getConnection()->query($query)) {
        die('There was an error running the query [' . $query->error . ']');
    }

    $arr = $res->fetch_assoc();

    return $arr;

}

function logout()
{

    session_start();
    unset($_SESSION['user']);
    session_destroy();
    header("Location: login.php");

} //ends logout

function menuselect($roleid)
{

    if ($roleid == 3) {
        $file = 'sidemenu_editor.php';
        return $file;
    }

    if ($roleid == 2) {
        $file = 'sidemenu_reviewer.php';
        return $file;
    } else {
        $file = 'sidemenu_author.php';
        return $file;
    }
}

function getman($manid)
{

//printf('manid: '.$manid.'');

    $cloud = mysql_query("SELECT title_orig, genre, notes, stat_id, per_id, datesubmitted FROM tbl_manuscript WHERE man_id=$manid") or die(mysql_error());

    $arr = mysql_fetch_assoc($cloud);

    $title = $arr['title_orig'];
    $genre = $arr['genre'];
    $notes = $arr['notes'];
    $statid = $arr['stat_id'];
    $submitted = $arr['datesubmitted'];
    $perid = $arr['per_id'];

    $cloud = mysql_query("SELECT fname, lname FROM tbl_people WHERE per_id=$perid") or die(mysql_error());

    $arr = mysql_fetch_assoc($cloud);
    $author = $arr['fname'] . ' ' . $arr['lname'];

    $cloud = mysql_query("SELECT stat_text FROM tbl_status WHERE stat_id=$statid") or die(mysql_error());

    $arr = mysql_fetch_assoc($cloud);
    $status = $arr['stat_text'];

    printf('
<table>
<tr><td>Author:</td><td>' . $author . '</td></tr>
<tr><td>Title:</td><td>' . $title . '</td></tr>
<tr><td>Genre:</td><td>' . $genre . '</td></tr>
<tr><td>Notes:</td><td>' . $notes . '</td></tr>
<tr><td>Status</td><td>' . $status . '</td></tr>
<tr><td>Date submitted:&nbsp;&nbsp;</td><td>' . $submitted . '</td></tr>
</table>'
    );

}

function getmanfull($manid)
{

    $cloud = mysql_query("SELECT title_orig, genre, notes, stat_id, per_id, datesubmitted FROM tbl_manuscript WHERE man_id=$manid AND active LIKE 'Y'") or die(mysql_error());

    while ($arr = mysql_fetch_assoc($cloud)) {
        $perid = $arr['per_id'];
        $author = authname($perid);
        printf('
	<p>
	<table>
	<tr><td>Manuscript ref #:</td><td>' . $manid . '</td><td></td></tr>
	<tr><td>Author:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $author . '</a></td><td></td></tr>
	<tr><td>Title:</td><td>' . $arr['title_orig'] . '</td><td></td></tr>
	<tr><td>Genre:</td><td>' . $arr['genre'] . '</td><td></td></tr>
	<tr><td>Notes:</td><td>' . $arr['notes'] . '</td><td></td></tr>');
        getstatus($arr['stat_id']);
        printf('<tr><td>Date submitted:&nbsp;&nbsp;</td><td>' . $arr['datesubmitted'] . '</td><td></td></tr>');
        getfileinfo($manid);
    }

}


function getmanper($per_id)
{

//printf('perid: '.$per_id.'');

//    $cloud = mysql_query("SELECT title_orig, genre, notes, stat_id, man_id, datesubmitted FROM tbl_manuscript WHERE per_id=$per_id AND active LIKE 'Y' ORDER BY datesubmitted DESC") or die(mysql_error());
    $query = "SELECT title_orig, genre, notes, stat_id, man_id, datesubmitted FROM tbl_manuscript WHERE per_id=$per_id AND active LIKE 'Y' ORDER BY datesubmitted DESC";
    if (!$res = mysqlConnection::getConnection()->query($query)) {
        die('There was an error running the query [' . $query->error . ']');
    }

    $num_rows = $res->num_rows;


    if ($num_rows < 1) {
        printf("<p>You haven't submitted a manuscript yet.<br /> <br /> See the left hand menu for your options.</p>");
    } else {

        while ($arr = $res->fetch_assoc()) {
            $author = authname($per_id);
            printf('
				<p style="margin-left:222px;">
				<table>
				<tr><td>Manuscript ref #:</td><td>' . $arr['man_id'] . '</td><td></td></tr>
				<tr><td>Author:</td><td><a href="viewauthor.php?perid=' . $per_id . '">' . $author . '</a></td><td></td></tr>
				<tr><td>Title:</td><td>' . $arr['title_orig'] . '</td><td></td></tr>
				<tr><td>Genre:</td><td>' . $arr['genre'] . '</td><td></td></tr>
				<tr><td>Notes:</td><td>' . $arr['notes'] . '</td><td></td></tr>');
            getstatus($arr['stat_id']);
            printf('<tr><td>Date submitted:&nbsp;&nbsp;</td><td>' . $arr['datesubmitted'] . '</td><td></td></tr>');
            getfileinfo($arr['man_id']);
        }
    }
}

function getmanbydate($from2, $to2)
{

    $cloud = mysql_query("SELECT title_orig, genre, notes, stat_id, man_id, per_id, datesubmitted FROM tbl_manuscript WHERE datesubmitted between '" . $from2 . "' and '" . $to2 . "' AND active LIKE 'Y'") or die(mysql_error());

    while ($arr = mysql_fetch_assoc($cloud)) {

        $perid = $arr['per_id'];
        $author = authname($perid);
        printf('
	<p>
	<table>
	<tr><td>Manuscript ref #:</td><td><a href="viewmanuscript.php?manid=' . $arr['man_id'] . '">' . $arr['man_id'] . '</a></td><td></td></tr>
	<tr><td>Author:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $author . '</a></td><td></td></tr>
	<tr><td>Title:</td><td>' . $arr['title_orig'] . '</td><td></td></tr>
	<tr><td>Genre:</td><td>' . $arr['genre'] . '</td><td></td></tr>
	<tr><td>Notes:</td><td>' . $arr['notes'] . '</td><td></td></tr>');
        getstatus($arr['stat_id']);
        printf('<tr><td>Date submitted:&nbsp;&nbsp;</td><td>' . $arr['datesubmitted'] . '</td><td></td></tr>');
        getfileinfo($arr['man_id']);
    }


}

function getmanbystatus($stat_id)
{

    $cloud = mysql_query("SELECT title_orig, genre, notes, stat_id, man_id, per_id, datesubmitted FROM tbl_manuscript WHERE stat_id=$stat_id AND active LIKE 'Y'") or die(mysql_error());

    while ($arr = mysql_fetch_assoc($cloud)) {

        $perid = $arr['per_id'];
        $author = authname($perid);
        printf('
	<p>
	<table>
	<tr><td>Manuscript ref #:</td><td><a href="viewmanuscript.php?manid=' . $arr['man_id'] . '">' . $arr['man_id'] . '</a></td><td></td></tr>
	<tr><td>Author:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $author . '</a></td><td></td></tr>
	<tr><td>Title:</td><td>' . $arr['title_orig'] . '</td><td></td></tr>
	<tr><td>Genre:</td><td>' . $arr['genre'] . '</td><td></td></tr>
	<tr><td>Notes:</td><td>' . $arr['notes'] . '</td><td></td></tr>');
        getstatus($arr['stat_id']);
        printf('<tr><td>Date submitted:&nbsp;&nbsp;</td><td>' . $arr['datesubmitted'] . '</td><td></td></tr>');
        getfileinfo($arr['man_id']);
    }

}

function getmanactiveall()
{

    $cloud = mysql_query("SELECT title_orig, genre, notes, stat_id, man_id, per_id, datesubmitted FROM tbl_manuscript WHERE active LIKE 'Y'") or die(mysql_error());

    while ($arr = mysql_fetch_assoc($cloud)) {

        $perid = $arr['per_id'];
        $author = authname($perid);
        printf('
	<p>
	<table>
	<tr><td>Manuscript ref #:</td><td><a href="viewmanuscript.php?manid=' . $arr['man_id'] . '">' . $arr['man_id'] . '</a></td><td></td></tr>
	<tr><td>Author:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $author . '</a></td><td></td></tr>
	<tr><td>Title:</td><td>' . $arr['title_orig'] . '</td><td></td></tr>
	<tr><td>Genre:</td><td>' . $arr['genre'] . '</td><td></td></tr>
	<tr><td>Notes:</td><td>' . $arr['notes'] . '</td><td></td></tr>');
        getstatus($arr['stat_id']);
        printf('<tr><td>Date submitted:&nbsp;&nbsp;</td><td>' . $arr['datesubmitted'] . '</td><td></td></tr>');
        getfileinfo($arr['man_id']);
    }

}

function getmanbydateall()
{

    $cloud = mysql_query("SELECT title_orig, genre, notes, stat_id, man_id, per_id, datesubmitted FROM tbl_manuscript WHERE active LIKE 'Y' ORDER BY datesubmitted DESC") or die(mysql_error());

    while ($arr = mysql_fetch_assoc($cloud)) {

        $perid = $arr['per_id'];
        $author = authname($perid);
        printf('
	<p>
	<table>
	<tr><td>Manuscript ref #:</td><td><a href="viewmanuscript.php?manid=' . $arr['man_id'] . '">' . $arr['man_id'] . '</a></td><td></td></tr>
	<tr><td>Author:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $author . '</a></td><td></td></tr>
	<tr><td>Title:</td><td>' . $arr['title_orig'] . '</td><td></td></tr>
	<tr><td>Genre:</td><td>' . $arr['genre'] . '</td><td></td></tr>
	<tr><td>Notes:</td><td>' . $arr['notes'] . '</td><td></td></tr>');
        getstatus($arr['stat_id']);
        printf('<tr><td>Date submitted:&nbsp;&nbsp;</td><td>' . $arr['datesubmitted'] . '</td><td></td></tr>');
        getfileinfo($arr['man_id']);
    }

}

function getmanbyauth()
{

    $cloud = mysql_query("SELECT per_id FROM tbl_manuscript WHERE active LIKE 'Y'") or die(mysql_error());

//printf("loop 1 good<br />");

    while ($arr = mysql_fetch_assoc($cloud)) {

        $perid = $arr['per_id'];
        $cloud2 = mysql_query("SELECT per_id FROM tbl_people WHERE per_id=$perid ORDER by lname, fname") or die(mysql_error());

        //printf("loop 2 good<br />");

        while ($arr2 = mysql_fetch_assoc($cloud)) {

            $perid = $arr2['per_id'];
            $cloud3 = mysql_query("SELECT title_orig, genre, notes, stat_id, man_id, per_id, datesubmitted FROM tbl_manuscript WHERE per_id=$perid") or die(mysql_error());

            //printf("loop 3 good<br />");

            while ($arr3 = mysql_fetch_assoc($cloud3)) {
                $author = authname($perid);
                printf('
							<p>
							<table>
							<tr><td>Manuscript ref #:</td><td><a href="viewmanuscript.php?manid=' . $arr3['man_id'] . '">' . $arr3['man_id'] . '</a></td><td></td></tr>
							<tr><td>Author:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $author . '</a></td><td></td></tr>
							<tr><td>Title:</td><td>' . $arr3['title_orig'] . '</td><td></td></tr>
							<tr><td>Genre:</td><td>' . $arr3['genre'] . '</td><td></td></tr>
							<tr><td>Notes:</td><td>' . $arr3['notes'] . '</td><td></td></tr>');
                getstatus($arr3['stat_id']);
                printf('<tr><td>Date submitted:&nbsp;&nbsp;</td><td>' . $arr3['datesubmitted'] . '</td><td></td></tr>');
                getfileinfo($arr3['man_id']);
            }
        }

    }


}


function getmanall()
{

//$query='"SELECT title_orig, genre, notes, stat_id, man_id, datesubmitted FROM tbl_manuscript"';

//print('query:'.$query.'');

    $cloud = mysql_query("SELECT title_orig, genre, notes, stat_id, man_id, per_id, datesubmitted FROM tbl_manuscript") or die(mysql_error());

    while ($arr = mysql_fetch_assoc($cloud)) {
        $perid = $arr['per_id'];
        $author = authname($perid);
        printf('
	<p>
	<table>
	<tr><td>Manuscript ref #:</td><td><a href="viewmanuscript.php?manid=' . $arr['man_id'] . '">' . $arr['man_id'] . '</a></td><td></td></tr>
	<tr><td>Author:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $author . '</a></td><td></td></tr>
	<tr><td>Title:</td><td>' . $arr['title_orig'] . '</td><td></td></tr>
	<tr><td>Genre:</td><td>' . $arr['genre'] . '</td><td></td></tr>
	<tr><td>Notes:</td><td>' . $arr['notes'] . '</td><td></td></tr>');
        getstatus($arr['stat_id']);
        printf('<tr><td>Date submitted:&nbsp;&nbsp;</td><td>' . $arr['datesubmitted'] . '</td><td></td></tr>');
        getfileinfo($arr['man_id']);
    }

}

function getmankw($field, $text)
{

    $text = mysql_real_escape_string($text);

    $cloud = mysql_query("SELECT title_orig, genre, notes, stat_id, man_id, per_id, datesubmitted FROM tbl_manuscript where $field LIKE '%$text%'") or die(mysql_error());

    while ($arr = mysql_fetch_assoc($cloud)) {
        $perid = $arr['per_id'];
        $author = authname($perid);
        printf('
	<p>
	<table>
	<tr><td>Manuscript ref #:</td><td><a href="viewmanuscript.php?manid=' . $arr['man_id'] . '">' . $arr['man_id'] . '</a></td><td></td></tr>
	<tr><td>Author:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $author . '</a></td><td></td></tr>
	<tr><td>Title:</td><td>' . $arr['title_orig'] . '</td><td></td></tr>
	<tr><td>Genre:</td><td>' . $arr['genre'] . '</td><td></td></tr>
	<tr><td>Notes:</td><td>' . $arr['notes'] . '</td><td></td></tr>');
        getstatus($arr['stat_id']);
        printf('<tr><td>Date submitted:&nbsp;&nbsp;</td><td>' . $arr['datesubmitted'] . '</td><td></td></tr>');
        getfileinfo($arr['man_id']);
    }

}

function getfileinfo($man_id)
{

//    $cloud = mysql_query("SELECT doc_size, doc_filename, doc_date, full_partial FROM tbl_doc WHERE man_id=$man_id") or die(mysql_error());
    $query = "SELECT doc_size, doc_filename, doc_date, full_partial FROM tbl_doc WHERE man_id={$man_id}";
    if (!$res = mysqlConnection::getConnection()->query($query)) {
        die('There was an error running the query [' . $query->error . ']');
    }
    $rows = $res->num_rows;

    if ($rows < 1) {
        print('<tr><td>File:</td><td>No file submitted.</td><td></td></tr></table></p>');
    } else {

        while ($arr = $res->fetch_assoc()) {
            printf('
					<tr><td>File:</td><td><a href="./upload/' . $arr['doc_filename'] . '">' . $arr['doc_filename'] . '</a>&nbsp;&nbsp;(' . $arr['doc_size'] . ' kB)&nbsp;&nbsp;');

            if ($arr['full_partial'] == 'F') {

                printf('full manuscript</td></tr>');
            } else {
                printf('partial manuscript</td></tr>');
            }

            printf('<tr><td>File date:</td><td>' . $arr['doc_date'] . '</td><td></table></p>');
        }
    }

}

function getfileinfoedit($man_id)
{

    $cloud = mysql_query("SELECT doc_size, doc_filename, doc_date, full_partial FROM tbl_doc WHERE man_id=$man_id") or die(mysql_error());
    $rows = mysql_num_rows($cloud);

    if ($rows < 1) {
        print('<tr><td>File:</td><td>No file submitted. <a href="submit_doc.php?manid=' . $man_id . '">Add file</a></td><td></td></tr></table></p>');
    } else {

        while ($arr = mysql_fetch_assoc($cloud)) {
            printf('
					<tr><td>File:</td><td><a href="./upload/' . $arr['doc_filename'] . '">' . $arr['doc_filename'] . '</a>&nbsp;&nbsp;(' . $arr['doc_size'] . ' kB)&nbsp;&nbsp;');

            if ($arr['full_partial'] == 'F') {

                printf('full manuscript</td></tr>');
            } else {
                printf('partial manuscript</td></tr>');
            }

            printf('</td></tr>
					<tr><td>File date:</td><td>' . $arr['doc_date'] . '</td><td></table></p>');
        }
    }

}

function getreview($revid)
{

    $cloud = mysql_query("SELECT per_id, man_id, rev_no, rec_id, edreq_id, date_rec, date_in, date_out, comments FROM tbl_review WHERE rev_id=$revid ORDER BY rev_no") or die(mysql_error());

    while ($arr = mysql_fetch_assoc($cloud)) {

        $perid = $arr['per_id'];
        $reviewer = authname($arr['per_id']);

        printf('
		<div id="review">
		<table>
		<tr><td>Reader #:</td><td>' . $arr['rev_no'] . '</td><td></td></tr>
		<tr><td>Reviewer:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $reviewer . '</a></td><td></td></tr>
		<tr><td>Date assigned:</td><td>' . $arr['date_in'] . '</td><td></td></tr>');
        getedreq($arr['edreq_id']);
        getrec($arr['rec_id']);
        printf('<tr><td>Rec date:</td><td>' . $arr['date_rec'] . '</td><td></td></tr>
		<tr><td>Author comments:</td><td>' . $arr['comments'] . '</td><td></td></tr>');
        printf('</table></div>');
        //return($arr['rev_no'];
    }


}

function getreviewedit($revid)
{
    $query = "SELECT per_id, man_id, rev_no, rec_id, edreq_id, date_rec, date_in, date_out, comments FROM tbl_review WHERE rev_id=$revid ORDER BY rev_no";
    if (!$res = mysqlConnection::getConnection()->query($query)) {
        die('There was an error running the query [' . $query->error . ']');
    }

    while ($arr = $res->fetch_assoc()) {
        $perid = $arr['per_id'];
        $reviewer = authname($arr['per_id']);
        $recid = $arr['rec_id'];
        $edreqid = $arr['edreq_id'];
        printf('<form name="reg" action="editreview.php" onsubmit="return validateForm();" method="post" >');
        printf('<table>');
        printf('<tr><td></td><td><input type=hidden name="revid" value="' . $revid . '"></td></tr>');
        printf('<tr><td>Reviewer:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $reviewer . '</a></td></tr>');
        printf('<tr><td>Reader #:</td><td>' . $arr['rev_no'] . '</td></tr>');
        printf('<tr><td>Date assigned:</td><td>' . $arr['date_in'] . '</td></tr>');
        printf('<tr><td>Recommendation:</td><td><select id="recid" name="recid" onchange="selectRecommendation()" size="6">');
        $query = "SELECT rec_id, rec_text FROM tbl_rec WHERE active LIKE 'Y'";
        if (!$res = mysqlConnection::getConnection()->query($query)) {
            die('There was an error running the query [' . $query->error . ']');
        }
        while ($arr2 = $res->fetch_assoc()) {
            $recid2 = $arr2['rec_id'];
            $rectext = $arr2['rec_text'];
            if ($recid2 == $recid) {
                printf('<option selected value="' . $recid2 . '">' . $rectext . '</option>');
            } else {
                printf('<option value="' . $recid2 . '">' . $rectext . '</option>');
            }
        }
        printf('</select></td></tr>');
        printf('<tr><td>Editing Requirements:</td><td><select id="edreqid" name="edreqid" onchange="selectEditRequirement()" size="5">');
        $query = "SELECT edreq_id, edreq_text FROM tbl_editreq";
        if (!$res = mysqlConnection::getConnection()->query($query)) {
            die('There was an error running the query [' . $query->error . ']');
        }
        while ($arr3 = $res->fetch_assoc()) {
            $edreq2 = $arr3['edreq_id'];
            $reqtext = $arr3['edreq_text'];
            if ($edreq2 == $edreqid) {
                printf('<option selected value="' . $edreq2 . '">' . $reqtext . '</option>');
            } else {
                printf('<option  value="' . $edreq2 . '">' . $reqtext . '</option>');
            }
        }
        printf('</select></td></tr>');
        printf('<tr><td>Reviewer comments:</td><td><textarea name="comments" cols=100 rows=20>' . $arr['comments'] . '</textarea></td></tr>');
        printf('<tr><td>Date reviewed:</td><td>' . $arr['date_rec'] . '</td></tr>');
        printf('<tr><td><input id="reviewSubmitButton" type="submit" value="Submit Review" ></td><td></td></tr>');
        printf('</table>');
        printf('</form>');
        printf('<span  style="margin-left:170px;color:red;font-size:12px">*NOTE: Every time you submit your review, system will automatically send an email to administrators.</span><br><span  style="margin-left:170px;color:red;font-size:12px">Please carefully check your submission before submitting it.</span><br><br>');
    }


}

function getrec($rec_id)
{

    if (!$rec_id) {
        printf('<tr><td>Recommendation:</td><td></td></tr>');
    } else {
        $cloud = mysql_query("SELECT rec_text FROM tbl_rec WHERE rec_id=$rec_id") or die(mysql_error());
        $arr = mysql_fetch_assoc($cloud);
        $rec = $arr['rec_text'];
        printf('<tr><td>Recommendation:</td><td>' . $rec . '</td></tr>');
    }
}

function getedreq($edreq_id)
{

    if (!$edreq_id) {
        printf('<tr><td>Editing Required:</td><td></td></tr>');
    } else {
        $cloud = mysql_query("SELECT edreq_text FROM tbl_editreq WHERE edreq_id=$edreq_id") or die(mysql_error());

        $arr = mysql_fetch_assoc($cloud);
        $edreq = $arr['edreq_text'];
        printf('<tr><td>Editing Required:</td><td>' . $edreq . '</td></tr>');
    }
}

function getstatus($statid)
{

//    $cloud = mysql_query("SELECT stat_text FROM tbl_status WHERE stat_id=$statid") or die(mysql_error());
    $query = "SELECT stat_text FROM tbl_status WHERE stat_id={$statid}";
    if (!$res = mysqlConnection::getConnection()->query($query)) {
        die('There was an error running the query [' . $query->error . ']');
    }

    $arr = $res->fetch_assoc();
//    $arr = mysql_fetch_assoc($cloud);
    $status = $arr['stat_text'];
    printf('<tr><td>Status</td><td>' . $status . '</td></tr>');
}

function getstatnohtml($statid)
{

//    $cloud = mysql_query("SELECT stat_text FROM tbl_status WHERE stat_id=$statid") or die(mysql_error());
    $query = "SELECT stat_text FROM tbl_status WHERE stat_id={$statid}";
    if (!$res = mysqlConnection::getConnection()->query($query)) {
        die('There was an error running the query [' . $query->error . ']');
    }

    $arr = $res->fetch_assoc();
    $status = $arr['stat_text'];
    printf('Status:&nbsp;' . $status . '');
}

function authname($perid)
{

//    $cloud = mysql_query("SELECT fname, lname FROM tbl_people WHERE per_id=$perid") or die(mysql_error());
    $query = "SELECT fname, lname FROM tbl_people WHERE per_id=$perid";
    if (!$res = mysqlConnection::getConnection()->query($query)) {
        die('There was an error running the query [' . $query->error . ']');
    }

    $arr = $res->fetch_assoc();

//    $arr = mysql_fetch_assoc($cloud);
    $author = $arr['fname'] . ' ' . $arr['lname'];

    return $author;

}

function selreviewer()
{

    $cloud4 = mysql_query("SELECT per_id, fname, lname FROM tbl_people WHERE role_id=2");
    printf('<option selected value="">Select Reviewer</option>');
    while ($arr4 = mysql_fetch_assoc($cloud4)) {
        $revid = $arr4['per_id'];
        $revfname = $arr4['fname'];
        $revlname = $arr4['lname'];
        printf('<option value="' . $revid . '">' . $revfname . '&nbsp;' . $revlname . '</option>');
    }
}

function printreviewblock($manid, $revno)
{

    printf('<span class="reviewblock"><form name="addreviewer" action="addreviewer.php" method="post">
			<input type="hidden" value="' . $manid . '" name="manid">
			<input type="hidden" value=' . $revno . ' name="revno">
			Reviewer ' . $revno . ': <br /> <select name="reviewer" size=3>');
    selreviewer();
    printf('</select><br /><input type="submit" value="Assign Reviewer"></form></span>');
}

function getmanrevall($perid)
{

//printf('perid: '.$perid.'');
    $query = "SELECT man_id FROM tbl_review WHERE per_id={$perid}";
    if (!$res = mysqlConnection::getConnection()->query($query)) {
        die('There was an error running the query [' . $query->error . ']');
    }


    $num_rows = $res->num_rows;

    if ($num_rows < 1) {
        printf("You do not have any active reviews currently assigned.<br /> See the left hand menu for your options.");
    } else {

        while ($arr = $res->fetch_assoc()) {

            getmanfullrevall($arr['man_id']);

        }
    }

}

function getmanrevrecent($perid)
{

//printf('perid: '.$perid.'');

    $cloud = mysql_query("SELECT man_id FROM tbl_review WHERE per_id=$perid") or die(mysql_error());

    $num_rows = mysql_num_rows($cloud);

    if ($num_rows < 1) {
        printf("You do not have any active reviews currently assigned.<br /> See the left hand menu for your options.");
    } else {

        while ($arr = mysql_fetch_assoc($cloud)) {

            getmanfullrev($arr['man_id']);

        }
    }

}

function getmanrevnew($perid)
{

//printf('perid: '.$perid.'');

    $cloud = mysql_query("SELECT man_id FROM tbl_review WHERE per_id=$perid AND date_rec IS NULL") or die(mysql_error());

    $num_rows = mysql_num_rows($cloud);

    if ($num_rows < 1) {
        printf("You do not have any active reviews currently assigned.<br /> See the left hand menu for your options.");
    } else {

        while ($arr = mysql_fetch_assoc($cloud)) {

            getmanfullrev($arr['man_id']);

        }
    }

}


function getmanfullrev($manid)
{

//printf('manid: '.$manid.'');

    $cloud = mysql_query("SELECT man_id, title_orig, genre, notes, stat_id, per_id, datesubmitted FROM tbl_manuscript WHERE man_id=$manid and active='Y'") or die(mysql_error());

    $num_rows = mysql_num_rows($cloud);

    if ($num_rows < 1) {
        printf("You do not have any active reviews currently assigned.<br /> See the left hand menu for your options.");
    } else {
        $arr = mysql_fetch_assoc($cloud);

        $title = $arr['title_orig'];
        $genre = $arr['genre'];
        $notes = $arr['notes'];
        $statid = $arr['stat_id'];
        $submitted = $arr['datesubmitted'];
        $perid = $arr['per_id'];

        $author = authname($perid);

        printf('
		<div id=review><table>
		<tr><td>Manuscript ref #:</td><td>' . $arr['man_id'] . '&nbsp&nbsp<a href="reviewmanuscript.php?manid=' . $arr['man_id'] . '">My Review</a></td></tr>
		<tr><td>Author:</td><td>' . $author . '</td></tr>
		<tr><td>Title:</td><td>' . $title . '</td></tr>
		<tr><td>Genre:</td><td>' . $genre . '</td></tr>
		<tr><td>Notes:</td><td>' . $notes . '</td></tr>');
        getstatus($arr['stat_id']);
        printf('<tr><td>Date submitted:&nbsp;&nbsp;</td><td>' . $submitted . '</td></tr>
		</table></div>'
        );
    }

}

function getmanfullrevall($manid)
{

//printf('manid: '.$manid.'');

//$cloud = mysql_query("SELECT man_id, title_orig, genre, notes, stat_id, per_id, datesubmitted FROM tbl_manuscript WHERE man_id=$manid") or die(mysql_error());
    $query = "SELECT man_id, title_orig, genre, notes, stat_id, per_id, datesubmitted FROM tbl_manuscript WHERE man_id={$manid}";
    if (!$res = mysqlConnection::getConnection()->query($query)) {
        die('There was an error running the query [' . $query->error . ']');
    }
    $num_rows = $res->num_rows;

    if ($num_rows < 1) {
        printf("You do not have any active reviews currently assigned.<br /> See the left hand menu for your options.");
    } else {
//        $arr = mysql_fetch_assoc($cloud);
        $arr = $res->fetch_assoc();
        $title = $arr['title_orig'];
        $genre = $arr['genre'];
        $notes = $arr['notes'];
        $statid = $arr['stat_id'];
        $submitted = $arr['datesubmitted'];
        $perid = $arr['per_id'];

        $author = authname($perid);

        printf('
		<div id="review" style="border-top:1px solid #ccc;">
		<table>
		<tr><td style="width:105px">Manuscript ref #:</td><td>' . $arr['man_id'] . '&nbsp&nbsp<a href="reviewmanuscript.php?manid=' . $arr['man_id'] . '">My Review</a></td></tr>
		<tr><td>Author:</td><td>' . $author . '</td></tr>
		<tr><td>Title:</td><td>' . $title . '</td></tr>
		<tr><td>Genre:</td><td>' . $genre . '</td></tr>
		<tr><td>Notes:</td><td>' . $notes . '</td></tr>');
        getstatus($arr['stat_id']);
        printf('<tr><td>Date submitted:&nbsp;&nbsp;</td><td>' . $submitted . '</td></tr>
        
		</table></div>'
        );
    }

}


function peoplebyname()
{

    $cloud = mysql_query("SELECT per_id, uname, fname, lname, street, city, province, postal, email, created FROM tbl_people WHERE active='Y' ORDER BY lname") or die(mysql_error());

    $num_rows = mysql_num_rows($cloud);

    printf('<br /><br />There are currently ' . $num_rows . ' active accounts.');

    while ($arr = mysql_fetch_assoc($cloud)) {

        $perid = $arr['per_id'];
        $reviewer = authname($arr['per_id']);

        printf('
		<div id="account">
		<table>
		<tr><td>Account #:</td><td>' . $perid . '</td><td></td></tr>
		<tr><td>Name:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $reviewer . '</a></td><td></td></tr>
		<tr><td>Username:</td><td>' . $arr['uname'] . '</td><td></td></tr>
		<tr><td>Address:</td><td>' . $arr['street'] . '</td><td></td></tr>
		<tr><td></td></tr></td><td>' . $arr['city'] . ', ' . $arr['province'] . '</td><td></td></tr>
		<tr><td></td></tr></td><td>' . $arr['postal'] . '</td><td></td></tr>
		<tr><td>Email:</td><td>' . $arr['email'] . '</td><td></td></tr>
		<tr><td>Date created:</td><td>' . $arr['created'] . '</td><td></td></tr>');
        printf('</table></div>');
    }

}

function peoplebydate()
{

    $cloud = mysql_query("SELECT per_id, uname, fname, lname, street, city, province, postal, email, created FROM tbl_people  WHERE active='Y' ORDER BY created DESC") or die(mysql_error());

    $num_rows = mysql_num_rows($cloud);

    printf('<br /><br />Accounts by date created. There are currently ' . $num_rows . ' active accounts.');

    while ($arr = mysql_fetch_assoc($cloud)) {

        $perid = $arr['per_id'];
        $reviewer = authname($arr['per_id']);

        printf('
		<div id="account">
		<table>
		<tr><td>Account #:</td><td>' . $perid . '</td><td></td></tr>
		<tr><td>Name:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $reviewer . '</a></td><td></td></tr>
		<tr><td>Username:</td><td>' . $arr['uname'] . '</td><td></td></tr>
		<tr><td>Address:</td><td>' . $arr['street'] . '</td><td></td></tr>
		<tr><td></td></tr></td><td>' . $arr['city'] . ', ' . $arr['province'] . '</td><td></td></tr>
		<tr><td></td></tr></td><td>' . $arr['postal'] . '</td><td></td></tr>
		<tr><td>Email:</td><td>' . $arr['email'] . '</td><td></td></tr>
		<tr><td>Date created:</td><td>' . $arr['created'] . '</td><td></td></tr>');
        printf('</table></div>');
    }

}

function getauthkw($trunc, $keywords)
{

    if ($trunc == 'e') {

        $keywords2 = "'" . mysql_real_escape_string($keywords) . "'";
        //printf('keywords: '.$keywords2.'');

        $cloud = mysql_query("SELECT per_id, uname, fname, lname, street, city, province, postal, email, created FROM tbl_people WHERE lname LIKE $keywords2 ORDER BY lname") or die(mysql_error());

    } elseif ($trunc == 't') {

        $keywords2 = "'" . mysql_real_escape_string($keywords) . "%'";

        //printf('keywords: '.$keywords.'');

        $cloud = mysql_query("SELECT per_id, uname, fname, lname, street, city, province, postal, email, created FROM tbl_people WHERE lname LIKE $keywords2 ORDER BY lname") or die(mysql_error());

    }

    $num_rows = mysql_num_rows($cloud);

    if ($num_rows < 0) {

        printf('<br /><br />There are no accounts containing surname ' . $keywords . '');

    } else {

        printf('<br /><br />' . $num_rows . ' accounts match surname ' . $keywords . '');

        while ($arr = mysql_fetch_assoc($cloud)) {

            $perid = $arr['per_id'];
            $name = authname($arr['per_id']);

            printf('
			<div id="account">
			<table>
			<tr><td>Account #:</td><td>' . $perid . '</td><td></td></tr>
			<tr><td>Name:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $name . '</a></td><td></td></tr>
			<tr><td>Username:</td><td>' . $arr['uname'] . '</td><td></td></tr>
			<tr><td>Address:</td><td>' . $arr['street'] . '</td><td></td></tr>
			<tr><td></td></tr></td><td>' . $arr['city'] . ', ' . $arr['province'] . '</td><td></td></tr>
			<tr><td></td></tr></td><td>' . $arr['postal'] . '</td><td></td></tr>
			<tr><td>Email:</td><td>' . $arr['email'] . '</td><td></td></tr>
			<tr><td>Date created:</td><td>' . $arr['created'] . '</td><td></td></tr>');
            printf('</table></div>');
        }
    }
}

function getauthbyrole($roleid)
{

    $cloud = mysql_query("SELECT per_id, uname, fname, lname, street, city, province, postal, email, created FROM tbl_people WHERE role_id=$roleid  AND active='Y' ORDER BY lname") or die(mysql_error());
    $num_rows = mysql_num_rows($cloud);

    if ($roleid == 3) {

        printf('<br /><br />There are ' . $num_rows . ' accounts with role editor.');

    } elseif ($roleid == 2) {

        printf('<br /><br />There are ' . $num_rows . ' accounts with role reviewer.');

    } elseif ($roleid == 1) {

        printf('<br /><br />There are ' . $num_rows . ' accounts with role author.');

    }


    while ($arr = mysql_fetch_assoc($cloud)) {

        $perid = $arr['per_id'];
        $name = authname($arr['per_id']);

        printf('
			<div id="account">
			<table>
			<tr><td>Account #:</td><td>' . $perid . '</td><td></td></tr>
			<tr><td>Name:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $name . '</a></td><td></td></tr>
			<tr><td>Username:</td><td>' . $arr['uname'] . '</td><td></td></tr>
			<tr><td>Address:</td><td>' . $arr['street'] . '</td><td></td></tr>
			<tr><td></td></tr></td><td>' . $arr['city'] . ', ' . $arr['province'] . '</td><td></td></tr>
			<tr><td></td></tr></td><td>' . $arr['postal'] . '</td><td></td></tr>
			<tr><td>Email:</td><td>' . $arr['email'] . '</td><td></td></tr>
			<tr><td>Date created:</td><td>' . $arr['created'] . '</td><td></td></tr>');
        printf('</table></div>');
    }
}

function peoplebyuname()
{

    $cloud = mysql_query("SELECT per_id, uname, fname, lname, street, city, province, postal, email, created FROM tbl_people WHERE active='Y' ORDER BY uname") or die(mysql_error());

    $num_rows = mysql_num_rows($cloud);

    printf('<br /><br />There are currently ' . $num_rows . ' active accounts.');

    while ($arr = mysql_fetch_assoc($cloud)) {

        $perid = $arr['per_id'];
        $reviewer = authname($arr['per_id']);

        printf('
		<div id="account">
		<table>
		<tr><td>Username:</td><td>' . $arr['uname'] . '</td><td></td></tr>
		<tr><td>Account #:</td><td>' . $perid . '</td><td></td></tr>
		<tr><td>Name:</td><td><a href="viewauthor.php?perid=' . $perid . '">' . $reviewer . '</a></td><td></td></tr>
		<tr><td>Address:</td><td>' . $arr['street'] . '</td><td></td></tr>
		<tr><td></td></tr></td><td>' . $arr['city'] . ', ' . $arr['province'] . '</td><td></td></tr>
		<tr><td></td></tr></td><td>' . $arr['postal'] . '</td><td></td></tr>
		<tr><td>Email:</td><td>' . $arr['email'] . '</td><td></td></tr>
		<tr><td>Date created:</td><td>' . $arr['created'] . '</td><td></td></tr>');
        printf('</table></div>');
    }

}

?>