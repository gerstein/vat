<?php 

require_once 'lib/init.php';
require_once 'libmaster/init_master.php';
require_once 'lib/vat.php';


$model = Model::factory('dataset');

$results = $model->find_all(array(
    'where' => array('status', '=', SET_STATUS_RAW_UPLOADED),
    'orderby' => array('id', 'desc')
));



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>VAT - Variant Annotation Tool</title>
        <meta name="description" content="Variant annotation tool cloud service">
        <meta name="author" content="Gerstein Lab">
        
        <!-- HTML5 shim for IE 6-8 support -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <!-- Styles -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 60px;
            }
        </style>
        
        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script>!window.jQuery && document.write('<script src="js/jquery-1.4.4.min.js"><\/script>')</script>
        <script src="js/bootstrap-dropdown.js"></script>
 
    </head>
    <body>
        <div class="topbar">
            <div class="fill">
                <div class="container">
                    <a class="brand" href="index.php">VAT</a>
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="upload.php">Upload</a></li>
                        <li class="dropdown" data-dropdown="dropdown">
                            <a href="#" class="dropdown-toggle">Documentation</a>
                            <ul class="dropdown-menu">
                                <li><a href="installation.php">Installing</a></li>
                                <li><a href="formats.php">Data formats</a></li>
                                <li><a href="programs.php">List of programs</a></li>
                                <li><a href="workflow.php">Example workflow</a></li>
                                <li class="divider"></li>
                                <li><a href="documentation.php">All documentation</a></li>
                            </ul>
                        </li>
                        <li><a href="download.php">Download</a></li>
                    </ul>
                </div>
            </div>
        </div>
       
        <div class="container">
            <div class="page-header">
                <h1>Raw VCF files</h1>
            </div>      
            <div class="row">
                <div class="span16">
                    <table class="bordered-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>File name</th>
                                <th>Annotation file</th>
                                <th>Type</th>
                                <th>Process</th>
                            </tr>
                        </thead>
                        <tbody>
<? if ($results === FALSE): ?>
                            <tr>
                            	<th colspan="7">No raw VCF files.</th>
                            </tr>
<? else: ?>
    <? foreach ($results as $row): ?>
                            <tr>
                                <th><? echo $row['id']; ?></th>
                                <td><? echo $row['title']; ?></td>
                                <td><? echo $row['description']; ?></td>
                                <td><? echo $row['raw_filename']; ?></td>
                                <td><? echo $row['annotation_file']; ?></td>
                                <td><? echo program2type($row['variant_type']); ?></td>
                                <td><a href="process.php?id=<? echo $row['id']; ?>">Process</a></td>
                            </tr>
    <? endforeach; ?>
<? endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>