<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portfolio Item - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/portfolio-item.css" rel="stylesheet">
    <?php $konek = new mysqli("localhost","root","","restoran"); ?>
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    <style type="text/css">
    	.searchable-container{margin:20px 0 0 0}
		.searchable-container label.btn-default.active{background-color:#007ba7;color:#FFF}
		.searchable-container label.btn-default{width:90%;border:1px solid #efefef;margin:5px; box-shadow:5px 8px 8px 0 #ccc;}
		.searchable-container label .bizcontent{width:100%;}
		.searchable-container .btn-group{width:90%}
		.searchable-container .btn span.glyphicon{
		    opacity: 0;
		}
		.searchable-container .btn.active span.glyphicon {
		    opacity: 1;
		}

    </style>