
<?php
function url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST']. "/test-project/public";
}
function base_url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST']. "/test-project";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo url(); ?>/plugin/bootstrap/css/bootstrap.css" rel="stylesheet" />  
    <link href="<?php echo url(); ?>/css/style.css" rel="stylesheet" />  

    <title>Document</title>
</head>
<body>
    <header>
        <div class="container">
<a href="<?php echo base_url() ?>" class="brand">
<h1>Logo</h1>
</a>
         
        </div>
    </header>