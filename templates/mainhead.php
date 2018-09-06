<? // mainhead.php

if (is_file("img/favico.ico")) $rt = "";
elseif (is_file("../img/favico.ico")) $rt = "../";
else die ("MH.6: Cannot determine root file directory.");

if (isset($plan['pl_title'])) $ogTtl = "Making Your Life Count | ".$plan['pl_title']; 
else $ogTtl = "Making Your Life Count | Dream of What Could Be";
if (isset($plan['pl_description'])) $ogDesc = $plan['pl_description'];
else $ogDesc = "Offering you simple, practical and powerful ways to help you make your life count. We use a four part theme of WALK, PRAY, CARE, SHARE.";
$ogAut = "Steve Douglass and the Making Your Life Count Team";
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$ogDesc?>">
    <meta name="author" content="<?=$ogAut?>">

    <meta property="og:url" content="http://makingyourlifecount.org"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?=$ogTtl?>"/>
    <meta property="og:author" content="<?=$ogAut?>"/>
    <meta property="og:description" content="<?=$ogDesc?>"/>
    <meta property="og:image" content="http://makingyourlifecount.org/img/fbcover.jpg"/>
    <meta property="fb:app_id" content="966242223397117"/>

    <title><?=$ogTtl?></title>
    
    <!-- Favicon and Touch Icons
    ========================================================= -->
    <link rel="shortcut icon" href="<?=$rt?>img/favico.ico" type="image/x-icon">
    <link rel="icon" href="<?=$rt?>img/favico.ico" type="image/x-icon">
    <link href="<?=$rt?>img/apple-touch-icon-114x114.png" rel="apple-touch-icon-precomposed" sizes="114x114">
    <link href="<?=$rt?>img/apple-touch-icon-72x72.png" rel="apple-touch-icon-precomposed" sizes="72x72">
    <link href="<?=$rt?>img/apple-touch-icon.png" rel="apple-touch-icon-precomposed">

    <!-- Bootstrap Core CSS
    ========================================================= -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$rt?>css/awesome-bootstrap-checkbox.css" type="text/css"/>

    <!-- Custom Fonts
    ========================================================= -->
    <link href="//fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css"/>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css"/>
    <link href="//fonts.googleapis.com/css?family=Roboto+Slab:100,200,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Animate
    ========================================================= -->
    <link rel="stylesheet" href="<?=$rt?>css/animate.min.css" type="text/css">
    