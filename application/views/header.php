<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
         <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <br />
<div class="row">
    <div class="pull-left">
       <?php  if($this->session->userdata('logged_in')){ ?>
        <a class="btn btn-danger" href="<?=base_url().'lineitems/addlineitems';?>">Add Line Items</a>
        <a class="btn btn-danger" href="<?=base_url().'lineitems/index';?>">Invoice Generate</a>
        <a class="btn btn-danger" href="<?=base_url().'lineitems/invoicelist';?>">Invoice List</a>
        <a class="btn btn-danger" href="<?=base_url().'login/logout';?>">Logout</a>
         <?php } ?>
    </div>
</div><br><br>