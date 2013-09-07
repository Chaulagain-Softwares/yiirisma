<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
		'Error',
);
?>

<p class="error-code"><?php echo $code; ?></p>
<p class="not-found">
	Not<br />Found
</p>
<div class="clear"></div>
<div class="content">
	<?php echo CHtml::encode($message); ?> <br /> 
	<?php echo CHtml::link('Go Home',Yii::app()->homeUrl)?> or<br />
	<form action="<?php echo Yii::app()->createUrl('site/search')?>">
		Search<br /> <input autofocus type="text" name="search" />
	</form>
</div>
