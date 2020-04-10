<?php
	session_start();
if($_SESSION['tipo']!=1){
    header ("Location: index.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport">
  <meta name="keywords" content="preservacion" />
  <title>Guardar imágenes | Preservación Digital</title>
  
  <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon.ico">
 
  <?php
    include("../zComponents/head.php")
  ?>

  <link rel="stylesheet" href="../../themes/css/core.min.css" />
  <link rel="stylesheet" href="../../themes/css/skin.css" />
  
  <style type="text/css">
   .invisible {display:none }
   .invisibleOp {opacity: 0}
   
   html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background-color:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:bold}dfn{font-style:italic}h1{font-size:2em;margin:0.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-0.5em}sub{bottom:-0.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;height:0}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace, monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type="checkbox"],input[type="radio"]{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:0}input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{height:auto}input[type="search"]{-webkit-appearance:textfield;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:0.35em 0.625em 0.75em}legend{border:0;padding:0}textarea{overflow:auto}optgroup{font-weight:bold}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}/*! Source: https://github.com/h5bp/html5-boilerplate/blob/master/src/css/main.css */@media print{*,*:before,*:after{background:transparent !important;color:#000 !important;-webkit-box-shadow:none !important;box-shadow:none !important;text-shadow:none !important}a,a:visited{text-decoration:underline}a[href]:after{content:" (" attr(href) ")"}abbr[title]:after{content:" (" attr(title) ")"}a[href^="#"]:after,a[href^="javascript:"]:after{content:""}pre,blockquote{border:1px solid #999;page-break-inside:avoid}thead{display:table-header-group}tr,img{page-break-inside:avoid}img{max-width:100% !important}p,h2,h3{orphans:3;widows:3}h2,h3{page-break-after:avoid}.navbar{display:none}.btn>.caret,.dropup>.btn>.caret{border-top-color:#000 !important}.label{border:1px solid #000}.table{border-collapse:collapse !important}.table td,.table th{background-color:#fff !important}.table-bordered th,.table-bordered td{border:1px solid #ddd !important}}
   
   *{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}*:before,*:after{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}html{font-size:10px;-webkit-tap-highlight-color:rgba(0,0,0,0)}body{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;line-height:1.42857143;color:#333;background-color:#fff}input,button,select,textarea{font-family:inherit;font-size:inherit;line-height:inherit}a{color:#337ab7;text-decoration:none}a:hover,a:focus{color:#23527c;text-decoration:underline}a:focus{outline:thin dotted;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}figure{margin:0}img{vertical-align:middle}.img-responsive,.thumbnail>img,.thumbnail a>img,.carousel-inner>.item>img,.carousel-inner>.item>a>img{display:block;max-width:100%;height:auto}.img-rounded{border-radius:6px}.img-thumbnail{padding:4px;line-height:1.42857143;background-color:#fff;border:1px solid #ddd;border-radius:4px;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out;display:inline-block;max-width:100%;height:auto}.img-circle{border-radius:50%}hr{margin-top:20px;margin-bottom:20px;border:0;border-top:1px solid #eee}.sr-only{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0}.sr-only-focusable:active,.sr-only-focusable:focus{position:static;width:auto;height:auto;margin:0;overflow:visible;clip:auto}[role="button"]{cursor:pointer}h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6{font-family:inherit;font-weight:500;line-height:1.1;color:inherit}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small,.h1 small,.h2 small,.h3 small,.h4 small,.h5 small,.h6 small,h1 .small,h2 .small,h3 .small,h4 .small,h5 .small,h6 .small,.h1 .small,.h2 .small,.h3 .small,.h4 .small,.h5 .small,.h6 .small{font-weight:normal;line-height:1;color:#777}h1,.h1,h2,.h2,h3,.h3{margin-top:20px;margin-bottom:10px}h1 small,.h1 small,h2 small,.h2 small,h3 small,.h3 small,h1 .small,.h1 .small,h2 .small,.h2 .small,h3 .small,.h3 .small{font-size:65%}h4,.h4,h5,.h5,h6,.h6{margin-top:10px;margin-bottom:10px}h4 small,.h4 small,h5 small,.h5 small,h6 small,.h6 small,h4 .small,.h4 .small,h5 .small,.h5 .small,h6 .small,.h6 .small{font-size:75%}h1,.h1{font-size:36px}h2,.h2{font-size:30px}h3,.h3{font-size:24px}h4,.h4{font-size:18px}h5,.h5{font-size:14px}h6,.h6{font-size:12px}p{margin:0 0 10px}.lead{margin-bottom:20px;font-size:16px;font-weight:300;line-height:1.4}@media (min-width:768px){.lead{font-size:21px}}small,.small{font-size:85%}mark,.mark{background-color:#fcf8e3;padding:.2em}.text-left{text-align:left}.text-right{text-align:right}.text-center{text-align:center}.text-justify{text-align:justify}.text-nowrap{white-space:nowrap}.text-lowercase{text-transform:lowercase}.text-uppercase{text-transform:uppercase}.text-capitalize{text-transform:capitalize}.text-muted{color:#777}.text-primary{color:#337ab7}a.text-primary:hover,a.text-primary:focus{color:#286090}.text-success{color:#3c763d}a.text-success:hover,a.text-success:focus{color:#2b542c}.text-info{color:#31708f}a.text-info:hover,a.text-info:focus{color:#245269}.text-warning{color:#8a6d3b}a.text-warning:hover,a.text-warning:focus{color:#66512c}.text-danger{color:#a94442}a.text-danger:hover,a.text-danger:focus{color:#843534}.bg-primary{color:#fff;background-color:#337ab7}a.bg-primary:hover,a.bg-primary:focus{background-color:#286090}.bg-success{background-color:#dff0d8}a.bg-success:hover,a.bg-success:focus{background-color:#c1e2b3}.bg-info{background-color:#d9edf7}a.bg-info:hover,a.bg-info:focus{background-color:#afd9ee}.bg-warning{background-color:#fcf8e3}a.bg-warning:hover,a.bg-warning:focus{background-color:#f7ecb5}.bg-danger{background-color:#f2dede}a.bg-danger:hover,a.bg-danger:focus{background-color:#e4b9b9}.page-header{padding-bottom:9px;margin:40px 0 20px;border-bottom:1px solid #eee}ul,ol{margin-top:0;margin-bottom:10px}ul ul,ol ul,ul ol,ol ol{margin-bottom:0}.list-unstyled{padding-left:0;list-style:none}.list-inline{padding-left:0;list-style:none;margin-left:-5px}.list-inline>li{display:inline-block;padding-left:5px;padding-right:5px}dl{margin-top:0;margin-bottom:20px}dt,dd{line-height:1.42857143}dt{font-weight:bold}dd{margin-left:0}@media (min-width:992px){.dl-horizontal dt{float:left;width:160px;clear:left;text-align:right;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.dl-horizontal dd{margin-left:180px}}abbr[title],abbr[data-original-title]{cursor:help;border-bottom:1px dotted #777}.initialism{font-size:90%;text-transform:uppercase}blockquote{padding:10px 20px;margin:0 0 20px;font-size:17.5px;border-left:5px solid #eee}blockquote p:last-child,blockquote ul:last-child,blockquote ol:last-child{margin-bottom:0}blockquote footer,blockquote small,blockquote .small{display:block;font-size:80%;line-height:1.42857143;color:#777}blockquote footer:before,blockquote small:before,blockquote .small:before{content:'\2014 \00A0'}.blockquote-reverse,blockquote.pull-right{padding-right:15px;padding-left:0;border-right:5px solid #eee;border-left:0;text-align:right}.blockquote-reverse footer:before,blockquote.pull-right footer:before,.blockquote-reverse small:before,blockquote.pull-right small:before,.blockquote-reverse .small:before,blockquote.pull-right .small:before{content:''}.blockquote-reverse footer:after,blockquote.pull-right footer:after,.blockquote-reverse small:after,blockquote.pull-right small:after,.blockquote-reverse .small:after,blockquote.pull-right .small:after{content:'\00A0 \2014'}address{margin-bottom:20px;font-style:normal;line-height:1.42857143}code,kbd,pre,samp{font-family:Menlo,Monaco,Consolas,"Courier New",monospace}code{padding:2px 4px;font-size:90%;color:#c7254e;background-color:#f9f2f4;border-radius:4px}kbd{padding:2px 4px;font-size:90%;color:#fff;background-color:#333;border-radius:3px;-webkit-box-shadow:inset 0 -1px 0 rgba(0,0,0,0.25);box-shadow:inset 0 -1px 0 rgba(0,0,0,0.25)}kbd kbd{padding:0;font-size:100%;font-weight:bold;-webkit-box-shadow:none;box-shadow:none}pre{display:block;padding:9.5px;margin:0 0 10px;font-size:13px;line-height:1.42857143;word-break:break-all;word-wrap:break-word;color:#333;background-color:#f5f5f5;border:1px solid #ccc;border-radius:4px}pre code{padding:0;font-size:inherit;color:inherit;white-space:pre-wrap;background-color:transparent;border-radius:0}.pre-scrollable{max-height:340px;overflow-y:scroll}
   
   .container{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:970px}}@media (min-width:1200px){.container{width:1170px}}.container-fluid{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}.row{margin-left:-15px;margin-right:-15px}.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12{position:relative;min-height:1px;padding-left:15px;padding-right:15px}.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12{float:left}.col-xs-12{width:100%}.col-xs-11{width:91.66666667%}.col-xs-10{width:83.33333333%}.col-xs-9{width:75%}.col-xs-8{width:66.66666667%}.col-xs-7{width:58.33333333%}.col-xs-6{width:50%}.col-xs-5{width:41.66666667%}.col-xs-4{width:33.33333333%}.col-xs-3{width:25%}.col-xs-2{width:16.66666667%}.col-xs-1{width:8.33333333%}.col-xs-pull-12{right:100%}.col-xs-pull-11{right:91.66666667%}.col-xs-pull-10{right:83.33333333%}.col-xs-pull-9{right:75%}.col-xs-pull-8{right:66.66666667%}.col-xs-pull-7{right:58.33333333%}.col-xs-pull-6{right:50%}.col-xs-pull-5{right:41.66666667%}.col-xs-pull-4{right:33.33333333%}.col-xs-pull-3{right:25%}.col-xs-pull-2{right:16.66666667%}.col-xs-pull-1{right:8.33333333%}.col-xs-pull-0{right:auto}.col-xs-push-12{left:100%}.col-xs-push-11{left:91.66666667%}.col-xs-push-10{left:83.33333333%}.col-xs-push-9{left:75%}.col-xs-push-8{left:66.66666667%}.col-xs-push-7{left:58.33333333%}.col-xs-push-6{left:50%}.col-xs-push-5{left:41.66666667%}.col-xs-push-4{left:33.33333333%}.col-xs-push-3{left:25%}.col-xs-push-2{left:16.66666667%}.col-xs-push-1{left:8.33333333%}.col-xs-push-0{left:auto}.col-xs-offset-12{margin-left:100%}.col-xs-offset-11{margin-left:91.66666667%}.col-xs-offset-10{margin-left:83.33333333%}.col-xs-offset-9{margin-left:75%}.col-xs-offset-8{margin-left:66.66666667%}.col-xs-offset-7{margin-left:58.33333333%}.col-xs-offset-6{margin-left:50%}.col-xs-offset-5{margin-left:41.66666667%}.col-xs-offset-4{margin-left:33.33333333%}.col-xs-offset-3{margin-left:25%}.col-xs-offset-2{margin-left:16.66666667%}.col-xs-offset-1{margin-left:8.33333333%}.col-xs-offset-0{margin-left:0}@media (min-width:768px){.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12{float:left}.col-sm-12{width:100%}.col-sm-11{width:91.66666667%}.col-sm-10{width:83.33333333%}.col-sm-9{width:75%}.col-sm-8{width:66.66666667%}.col-sm-7{width:58.33333333%}.col-sm-6{width:50%}.col-sm-5{width:41.66666667%}.col-sm-4{width:33.33333333%}.col-sm-3{width:25%}.col-sm-2{width:16.66666667%}.col-sm-1{width:8.33333333%}.col-sm-pull-12{right:100%}.col-sm-pull-11{right:91.66666667%}.col-sm-pull-10{right:83.33333333%}.col-sm-pull-9{right:75%}.col-sm-pull-8{right:66.66666667%}.col-sm-pull-7{right:58.33333333%}.col-sm-pull-6{right:50%}.col-sm-pull-5{right:41.66666667%}.col-sm-pull-4{right:33.33333333%}.col-sm-pull-3{right:25%}.col-sm-pull-2{right:16.66666667%}.col-sm-pull-1{right:8.33333333%}.col-sm-pull-0{right:auto}.col-sm-push-12{left:100%}.col-sm-push-11{left:91.66666667%}.col-sm-push-10{left:83.33333333%}.col-sm-push-9{left:75%}.col-sm-push-8{left:66.66666667%}.col-sm-push-7{left:58.33333333%}.col-sm-push-6{left:50%}.col-sm-push-5{left:41.66666667%}.col-sm-push-4{left:33.33333333%}.col-sm-push-3{left:25%}.col-sm-push-2{left:16.66666667%}.col-sm-push-1{left:8.33333333%}.col-sm-push-0{left:auto}.col-sm-offset-12{margin-left:100%}.col-sm-offset-11{margin-left:91.66666667%}.col-sm-offset-10{margin-left:83.33333333%}.col-sm-offset-9{margin-left:75%}.col-sm-offset-8{margin-left:66.66666667%}.col-sm-offset-7{margin-left:58.33333333%}.col-sm-offset-6{margin-left:50%}.col-sm-offset-5{margin-left:41.66666667%}.col-sm-offset-4{margin-left:33.33333333%}.col-sm-offset-3{margin-left:25%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-0{margin-left:0}}@media (min-width:992px){.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12{float:left}.col-md-12{width:100%}.col-md-11{width:91.66666667%}.col-md-10{width:83.33333333%}.col-md-9{width:75%}.col-md-8{width:66.66666667%}.col-md-7{width:58.33333333%}.col-md-6{width:50%}.col-md-5{width:41.66666667%}.col-md-4{width:33.33333333%}.col-md-3{width:25%}.col-md-2{width:16.66666667%}.col-md-1{width:8.33333333%}.col-md-pull-12{right:100%}.col-md-pull-11{right:91.66666667%}.col-md-pull-10{right:83.33333333%}.col-md-pull-9{right:75%}.col-md-pull-8{right:66.66666667%}.col-md-pull-7{right:58.33333333%}.col-md-pull-6{right:50%}.col-md-pull-5{right:41.66666667%}.col-md-pull-4{right:33.33333333%}.col-md-pull-3{right:25%}.col-md-pull-2{right:16.66666667%}.col-md-pull-1{right:8.33333333%}.col-md-pull-0{right:auto}.col-md-push-12{left:100%}.col-md-push-11{left:91.66666667%}.col-md-push-10{left:83.33333333%}.col-md-push-9{left:75%}.col-md-push-8{left:66.66666667%}.col-md-push-7{left:58.33333333%}.col-md-push-6{left:50%}.col-md-push-5{left:41.66666667%}.col-md-push-4{left:33.33333333%}.col-md-push-3{left:25%}.col-md-push-2{left:16.66666667%}.col-md-push-1{left:8.33333333%}.col-md-push-0{left:auto}.col-md-offset-12{margin-left:100%}.col-md-offset-11{margin-left:91.66666667%}.col-md-offset-10{margin-left:83.33333333%}.col-md-offset-9{margin-left:75%}.col-md-offset-8{margin-left:66.66666667%}.col-md-offset-7{margin-left:58.33333333%}.col-md-offset-6{margin-left:50%}.col-md-offset-5{margin-left:41.66666667%}.col-md-offset-4{margin-left:33.33333333%}.col-md-offset-3{margin-left:25%}.col-md-offset-2{margin-left:16.66666667%}.col-md-offset-1{margin-left:8.33333333%}.col-md-offset-0{margin-left:0}}@media (min-width:1200px){.col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12{float:left}.col-lg-12{width:100%}.col-lg-11{width:91.66666667%}.col-lg-10{width:83.33333333%}.col-lg-9{width:75%}.col-lg-8{width:66.66666667%}.col-lg-7{width:58.33333333%}.col-lg-6{width:50%}.col-lg-5{width:41.66666667%}.col-lg-4{width:33.33333333%}.col-lg-3{width:25%}.col-lg-2{width:16.66666667%}.col-lg-1{width:8.33333333%}.col-lg-pull-12{right:100%}.col-lg-pull-11{right:91.66666667%}.col-lg-pull-10{right:83.33333333%}.col-lg-pull-9{right:75%}.col-lg-pull-8{right:66.66666667%}.col-lg-pull-7{right:58.33333333%}.col-lg-pull-6{right:50%}.col-lg-pull-5{right:41.66666667%}.col-lg-pull-4{right:33.33333333%}.col-lg-pull-3{right:25%}.col-lg-pull-2{right:16.66666667%}.col-lg-pull-1{right:8.33333333%}.col-lg-pull-0{right:auto}.col-lg-push-12{left:100%}.col-lg-push-11{left:91.66666667%}.col-lg-push-10{left:83.33333333%}.col-lg-push-9{left:75%}.col-lg-push-8{left:66.66666667%}.col-lg-push-7{left:58.33333333%}.col-lg-push-6{left:50%}.col-lg-push-5{left:41.66666667%}.col-lg-push-4{left:33.33333333%}.col-lg-push-3{left:25%}.col-lg-push-2{left:16.66666667%}.col-lg-push-1{left:8.33333333%}.col-lg-push-0{left:auto}.col-lg-offset-12{margin-left:100%}.col-lg-offset-11{margin-left:91.66666667%}.col-lg-offset-10{margin-left:83.33333333%}.col-lg-offset-9{margin-left:75%}.col-lg-offset-8{margin-left:66.66666667%}.col-lg-offset-7{margin-left:58.33333333%}.col-lg-offset-6{margin-left:50%}.col-lg-offset-5{margin-left:41.66666667%}.col-lg-offset-4{margin-left:33.33333333%}.col-lg-offset-3{margin-left:25%}.col-lg-offset-2{margin-left:16.66666667%}.col-lg-offset-1{margin-left:8.33333333%}.col-lg-offset-0{margin-left:0}}
  </style>
  
  <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
  <script src="see_imgSerie.js" type="text/javascript"></script>
  
</head>

<?php
  include("../zComponents/header.php")
?>

<body>

    <?php
        include("../zUtils/conexion_tabla.php");
        
        $serie = $_GET['serie'];
        
        $query = "SELECT * FROM series WHERE serie = '$serie'";
        $resultado = $conexion_tabla->query($query);
        $row = $resultado->fetch_assoc();
            
    ?>
 
<div class="main-wrapper oh">

   <section class="page-title text-center" style="background-image: url(data:image/jpg;base64,<?php echo base64_encode($row['imgSerie']);  ?>)">
    <div class="container relative clearfix">
      <div class="title-holder">
        <div class="title-text">
          <h1 class="uppercase">Modificar</h1>
        </div>
      </div>
    </div>
   </section>
  
   <?php
        $id = $_GET['id'];
        $pagina = $_GET["pagina"];
        
        $query = "SELECT * FROM items WHERE id = '$id'";
        $resultado = $conexion_tabla->query($query);
        $row = $resultado->fetch_assoc();
            
    ?>

  <section>
    <div class="container mt-70 mb-50 alimentar-imagen">
      <div class="row">
      <div class="">
        <center>
        
        <!-- Forma foto -->
        <form  action="series_procesar.php?tipo=colecciones<?php 
                if(isset($_GET['pagina_series'])){
                  echo "&pagina=".$pagina.'&pagina_series='.$_GET['pagina_series'];
                }elseif(isset($_GET['pagina_buscar'])){
                  echo "&serie=".$serie."&pagina_buscar=".$_GET['pagina_buscar']."&pagina=".$_GET['pagina']."&consulta=".$_GET['consulta'];
                }else{
                  echo "&pagina=".$_GET['pagina']."&consulta=".$_GET['consulta'];
                }
              ?>" id="forma_foto" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <input type="hidden" name="serie" value="<?php echo $row['serie'] ?>">
            <input type="hidden" name="query" value="<?php echo $_SERVER['QUERY_STRING'] ?>">

          <!-- Formulario -->
   <?php
      if($row["tipo"]=="foto"){
   ?>
      <div class="col-sm-6">
       <article>
       <div class="entry-img hover-scale">
       <a href="#" class="entry-category-label green">Mixtli</a>
       <a class="lightbox-gallery" title="<?php echo $row['descripcion_img']; ?>" href="data:image/jpg;base64,<?php echo base64_encode($row['img']);  ?>">
        <img src='data:image/jpg;base64,<?php echo base64_encode($row['img']);  ?> '/>
       </a>
       </div>
       </article>
   <?php
      }
      else if($row["tipo"]=="video"){
   ?>
      <div class="col-sm-6">
         <a href="#" class="entry-category-label green">Mixtli</a>
         <iframe class="embed-responsive-item" width=555vw height=350vh src="<?php
            $url=$row['link'];
            $finalUrl = '';
            if(strpos($url, 'facebook.com/') !== false) {
               //it is FB video
               $finalUrl.='https://www.facebook.com/plugins/video.php?href='.rawurlencode($url).'&show_text=1&width=200';
            }else if(strpos($url, 'vimeo.com/') !== false) {
               //it is Vimeo video
               $videoId = explode("vimeo.com/",$url)[1];
               if(strpos($videoId, '&') !== false){
                     $videoId = explode("&",$videoId)[0];
               }
               $finalUrl.='https://player.vimeo.com/video/'.$videoId;
            }else if(strpos($url, 'youtube.com/') !== false) {
               //it is Youtube video
               $videoId = explode("v=",$url)[1];
               if(strpos($videoId, '&') !== false){
                     $videoId = explode("&",$videoId)[0];
               }
               $finalUrl.='https://www.youtube.com/embed/'.$videoId;
            }else if(strpos($url, 'youtu.be/') !== false){
               //it is Youtube video
               $videoId = explode("youtu.be/",$url)[1];
               if(strpos($videoId, '&') !== false){
                     $videoId = explode("&",$videoId)[0];
               }
               $finalUrl.='https://www.youtube.com/embed/'.$videoId;
            }else if(strpos($url, 'archive.org/') !== false){
               //it is Youtube video
               $videoId = end(explode("/",$url));
               if(strpos($videoId, '&') !== false){
                     $videoId = explode("&",$videoId)[0];
               }
               $finalUrl.='https://www.archive.org/embed/'.$videoId;
            }else{
               echo "Video inválido";  
            }
            echo $finalUrl;
         ?>" allowfullscreen></iframe>
   <?php
      }
      else if($row["tipo"]=="audio"){
   ?>
      <div class="col-sm-6">
         <article>
            <div class="entry-img hover-scale">
               <a href="#" class="entry-category-label green">Mixtli</a>
                  <a class="lightbox-gallery" title="<?php echo $row['descripcion_img']; ?>" href="data:image/jpg;base64,<?php echo base64_encode($row['img']);  ?>">
                  <?php
                     if($row['link']){
                        $url=$row['link'];
                        if(strpos($url,"soundcloud.com/")){
                          $url=explode("soundcloud.com", $url)[1];
                          $url_final = "https://w.soundcloud.com/player/?url=https%3A//soundcloud.com".$url."&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true";
                          echo "<iframe class='embed-responsive-item' width=555vw height=350vh src='".$url_final."' allow fullscreen></iframe>";
                       }elseif(strpos($url,"archive.org/")){
                          $url=end(explode("/", $url));
                          $url_final = "https://archive.org/embed/".$url;
                           echo "<div style='top:200px; position:relative;'> <iframe class='embed-responsive-item' width=555vw height=350vh src='".$url_final."' allow fullscreen></iframe> </div>";
                       }
                     }else{
                        echo '<audio controls> <source src="data:audio/mpeg;base64,'.base64_encode($row['img']).'"> </audio>';
                     }
                  ?>
               </a>
            </div>
         </article>
   <?php
      }
   ?>
   </div>


          <div class="col-md-6">
            <label class="left text-left">Fecha: <i>(formato dd/mm/aaaa)</i> </label>
            <input type="text" REQUIRED id="fecha" name="fecha" placeholder="Ingrese su fecha de toma..." value="<?php echo $row["fecha"] ?>"/><br /><br />
          </div>
          
          <div class="col-sm-6">
            <label class="left text-left">Lugar de toma: </label>
            <input type="text" REQUIRED id="lugar" name="lugar" placeholder="Ingrese el lugar de toma..." value="<?php echo $row["lugar"] ?>"/><br /><br />
          </div>
          
          <div class="col-sm-6">
            <label class="left text-left">Descriptores:  </label>
            <input type="text" REQUIRED data-role="tagsinput" id="descriptores" name="descriptores" placeholder="Ingrese sus descriptores..." value="<?php echo $row["descriptores"] ?>"/><br /><br />
          </div>
          
          <div class="col-sm-6">
            <label class="left text-left">Personajes: </label>
            <input type="text" id="personajes" name="personajes" placeholder="Ingrese los personajes que aparecen en la imagen..." value="<?php echo $row["personajes"] ?>"/><br /><br />
          </div>

          <div class="col-md-12">
            <label class="left text-left">Descripciones: </label>
            <input type="text" REQUIRED id="descripcion_img" name="descripcion_img" placeholder="Describe la imagen..." value="<?php echo $row["descripcion_img"] ?>"/>
          </div>

          <?php
            $query="SELECT * FROM descripciones WHERE ColeccionesID='$id'";
            $descripciones=$conexion_tabla->query($query);
            $i=0;
            while($descripcion = $descripciones->fetch_assoc()){
          ?>

          <div class="col-md-11 mb-0 mt-0 pt-0 pb-0">
            <input type="text" REQUIRED id="descripcion_img" name="descripcion-<?php echo $descripcion['DescripcionID'] ?>" placeholder="Describe la imagen..." value="<?php echo $descripcion["Descripcion"] ?>"/>
          </div>
          <div class="col-md-1 mb-0 mt-0 pt-0 pb-0">
            <a class="btn btn-sm btn-red" href="series_eliminar_descripcion.php?<?php echo $_SERVER['QUERY_STRING'] ?>&DescripcionID=<?php echo $descripcion['DescripcionID'] ?>"> X </a>
          </div>

          <?php
              $i++;
            } //END WHILE
          ?>
          <!-- ID ASIGNADO       
          <div class="col-sm-6">
            <label class="left text-left">Id asignado:  </label>
            <input type="text" REQUIRED id="id_asignado" name="id_asignado" placeholder="Ingrese un id asignado..." value=""/><br /><br />
          </div> -->
          
          <div class="col-md-12">
            <div class="text-medium" id="respuesta"></div><br /><br />
            <div id="vista-previa"></div>
          </div>

            <div class="col-md-6">
                 <a href="
                 <?php
                  if($_GET['consulta']){
                    $consulta = $_GET['consulta'];
                    if(isset($_GET['pagina_buscar'])){
                      echo "series_imagenes.php?serie=".$serie."&pagina=".$_GET['pagina']."&pagina_buscar=".$_GET['pagina_buscar']."&consulta=".$consulta;
                    }else{
                      echo "series_buscar.php?pagina=".$_GET['pagina']."&consulta=".$consulta;
                    }
                  }
                  else{
                    $paginaSeries = $_GET['pagina_series'];
                    parse_str($_SERVER['QUERY_STRING'],$queryArray);
                    $ref=$queryArray['ref'];
                    unset($queryArray['ref']);
                    $queryString=http_build_query($queryArray);
                    echo $ref."?".$queryString;
                  }
                 ?>                 
                 " class="btn btn-lg btn-black">Regresar</a>
            </div>
          
          <div class="col-md-6">
            <input class="btn btn-lg btn-red" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="submit-foto" value="Guardar"/>
          </div>
        </form>

        </center>
      </div>
      </div>
    </div>
  </section>

  </div>
</div>
 
 
<!--- END WRAPP --->
<script type="text/javascript" src="../../themes/js/jquery.min.js"></script>
<script type="text/javascript" src="../../themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../themes/js/plugins.js"></script>
<script type="text/javascript" src="../../themes/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="../../themes/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="../../themes/js/rev-slider.js"></script>
<script type="text/javascript" src="../../themes/js/scripts.js"></script>
<script type="text/javascript" src="../../themes/js/alimentar_serie_uploads.js"></script>

</body>
</html>