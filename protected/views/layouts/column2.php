<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid sortable ui-sortable">
	<div class="box span9">
		<div data-original-title="" class="box-header well">
			<h2><?php if (isset($this->title)) echo '<i class="icon-edit"></i> '.$this->title;?></h2>
			<div class="box-icon">
				<!-- 							<a class="btn btn-setting btn-round" href="#"><i class="icon-cog"></i></a> -->
				<a class="btn btn-minimize btn-round" href="#"><i	class="icon-chevron-up"></i> </a> 
<!-- 				<a class="btn btn-close btn-round" href="#"><i class="icon-remove"></i></a> -->
			</div>
		</div>

		<div class="box-content">
			<?php echo $content; ?>
		</div>
	</div>
	<div class="box span3">
		<div data-original-title="" class="box-header well">
			<h3>Operations</h3>
<!-- 			<div class="box-icon"> -->
<!-- 				<a class="btn btn-close btn-round" href="#"><i class="icon-remove"></i> -->
<!-- 				</a> -->
<!-- 			</div> -->
		</div>
		<div class="box-content">
			<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
					//'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
			?>
		</div>

	</div>
</div>
<?php $this->endContent(); ?>