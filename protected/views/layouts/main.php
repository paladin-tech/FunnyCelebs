<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print"/>
    <!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
	      media="screen, projection"/>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
    <a name="top"></a>

    <div id="header">
        <div id="logo"></div>
        <div id="mainmenu">
			<?php $this->widget('zii.widgets.CMenu', array(
			'items' => array(
				array('label' => 'Home', 'url' => array('/site/index')),
				array('label' => 'Gallery', 'url' => array('/site/page', 'view' => 'gallery')),
				array('label' => 'Shop', 'url' => array('/site/page', 'view' => 'shop')),
				array('label' => 'f-News', 'url' => array('/site/page', 'view' => 'f-news')),
				array('label' => 'f-AQ', 'url' => array('/site/faq')),
				array('label' => 'Contact', 'url' => array('/site/contact')),
				array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
				array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
			),
		)); ?>
        </div>
        <div id="slides"></div>
    </div>
    <!-- header -->

    <!-- mainmenu -->
	<?php if (isset($this->breadcrumbs)): ?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links' => $this->breadcrumbs,
	)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">
        <div id="footer-container">
            <div id="footer-copyright">
                Copyright &copy; <?php echo date('Y'); ?> by <span style="color: #ffffff">Michael Wolf</span>. All
                Rights
                Reserved.
            </div>
            <div id="footer-menu">
				<?php $this->widget('zii.widgets.CMenu', array(
				'items' => array(
					array('label' => 'home', 'url' => array('/site/index')),
					array('label' => 'gallery', 'url' => array('/site/page', 'view' => 'gallery')),
					array('label' => 'shop', 'url' => array('/site/page', 'view' => 'shop')),
					array('label' => 'f-News', 'url' => array('/site/page', 'view' => 'f-news')),
					array('label' => 'f-AQ', 'url' => array('/site/faq')),
					array('label' => 'contact', 'url' => array('/site/contact'))
				),
			)); ?>
                <!--            <ul>-->
                <!--                <li>home</li>-->
                <!--                <li>gallery</li>-->
                <!--                <li>shop</li>-->
                <!--                <li>f-news</li>-->
                <!--                <li>f-aq</li>-->
                <!--                <li>contact</li>-->
                <!--            </ul>-->
            </div>
            <div id="back-to-top"><img src="images/BackToTop.png" alt="" onclick="window.location.href = '#top'"
                                       title="Back to Top"></div>
            <div class="clear"></div>
        </div>
    </div>
    <!-- footer -->

</div>
<!-- page -->

</body>
</html>
