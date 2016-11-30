
<center>
    <div class="panel panel-default">
        <div class="panel-head">
            <h3> BILLING WTP MANGLAYANG </h3>
            <h5> V 3.5 </h5>
        </div>      
    </div>    
</center>

<h3> Welcome Back <?= ucwords($_SESSION['nama_lengkap']) ?> ! </h3>
<div class="form-group">
    <span class="title"> you're login as : <b>
            <?= $_SESSION['jobtitle'] ?> - <?= $_SESSION['accessrole'] == 1 ? "Administrator" : "Operator" ?>
        </b>
    </span>
</div>
<div class="form-group">
    <span class="title"> Login Time : <?= date("d F Y") ?> <span id="clock"></span></span>
</div>
