<?php 
/**
 * Upload page for Variant Annotation Tool cloud service. [ref-vat]
 * 
 * [ref-vat]: http://vat.gersteinlab.org
 * 
 * @package    VAT
 * @author     David Z. Chen
 * @copyright  (c) 2011 Gerstein Lab
 * @license    ???
 */


$poids_max = ini_get('post_max_size') + 0;

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
 
    </head>
    <body>
        <div class="topbar">
            <div class="fill">
                <div class="container">
                    <a class="brand" href="index.php">VAT</a>
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="vat_upload.php">Upload</a></li>
                        <li><a href="documentation.php">Documentation</a></li>
                        <li><a href="download.php">Download</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="container">
        	<? if ($poids_max < 10): ?>
            <div class="row">
                <div class="span16">
                    <div class="alert-message warning">
                    <p><strong>Max upload file size is <? echo $poids_max; ?> M.</strong> It is advised that you edit your php.ini to allow uploads of larger files</p>
                    </div>
                </div>
            </div>
            <? endif; ?>
            
            <div class="page-header">
                <h1>Upload File</h1>
            </div>      
            <div class="row">
                <div class="span4">
                    <h2>Examples</h2>
                    <p>
                        The following example files were obtained from the <a href="http://www.1000genomes.org">1000 Genomes Pilot Project</a>. The genome coordinates are based on hg18.
                    </p>
                    <ul>
                        <li><a href="http://homes.gersteinlab.org/people/lh372/VAT/1000genomes_pilot_snps.sample.vcf">SNPs</a></li>
                        <li><a href="http://homes.gersteinlab.org/people/lh372/VAT/1000genomes_pilot_indels.sample.vcf">Indels</a></li>
                        <li><a href="http://homes.gersteinlab.org/people/lh372/VAT/1000genomes_pilot_svs.sample.vcf">SVs</a></li>
                    </ul>
                </div>
                <div class="span12">
                    <form action="process.php" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Input VCF file</legend>
                            <div class="clearfix">
                                <label for="upFile">VCF File Upload</label>
                                <div class="input">
                                    <input class="input-file" type="file" name="upFile" />
                                </div>
                            </div><!-- /clearfix -->
                            <div class="clearfix">
                                <label for="variantType">Variant type</label>
                                <div class="input">
	                                <select name="variantType">
							            <option value="snpMapper" selected="selected">SNPs</option>
							            <option value="indelMapper">Indels</option>
							            <option value="svMapper">SVs</option>
							        </select>
                                </div>
                            </div><!-- /clearfix -->
                            <div class="clearfix">
                                <label for="annotationFile">Annotation file</label>
                                <div class="input">
	                                <select name="annotationFile">
							            <option value="gencode3b">GENCODE (version 3b; hg18)</option>
							            <option value="gencode3c">GENCODE (version 3c; hg19)</option>
							            <option value="gencode4">GENCODE (version 4; hg19)</option>
							            <option value="gencode5">GENCODE (version 5; hg19)</option>
							            <option value="gencode6">GENCODE (version 6; hg19)</option>
							            <option value="gencode7">GENCODE (version 7; hg19)</option>
							        </select>
                                </div>
                            </div><!-- /clearfix -->
                            <div class="clearfix">
                                <label for="process">Process file</label>
                                <div class="input">
                                    <ul class="inputs-list">
                                        <li>
                                            <label>
                                                <input type="checkbox" name="process" value="yes" />
				                                <span>Process uploaded VCF file after uploading</span>
				                            </label>
				                        </li>
				                    </ul>
                                </div>
                            </div><!-- /clearfix -->
                            <div class="actions">
                                <input type="submit" class="btn primary" value="Submit" />&nbsp;<input type="reset" class="btn" value="Reset" />
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        
            <footer>
                <p>&copy; Gerstein Lab 2011</p>
            </footer>
        </div> <!-- /container -->
    </body>
</html>