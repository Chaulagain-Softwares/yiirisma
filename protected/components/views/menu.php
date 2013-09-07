<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
						<li><a class="ajax-link" href="<?php echo Yii::app()->homeUrl?>"><i class="icon-home"></i><span
								class="hidden-tablet"> Dashboard</span> </a></li>
						<?php foreach (Main::adminmenu() as $key=>$menu){
							echo '<li><a class="ajax-link" href="'.Yii::app()->createUrl($menu['url']['0']).'"><i class="icon-home"></i><span
								class="hidden-tablet"> '.$menu['label'].'</span> </a></li>';
						}?>			
						<li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/ui')?>"><i class="icon-eye-open"></i><span
								class="hidden-tablet"> UI Features</span> </a></li>
						<li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/form')?>"><i class="icon-edit"></i><span
								class="hidden-tablet"> Forms</span> </a></li>
						<li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/chart')?>"><i
								class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span>
						</a></li>
						<li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/typography')?>"><i
								class="icon-font"></i><span class="hidden-tablet"> Typography</span>
						</a></li>
						<li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/gallery')?>"><i
								class="icon-picture"></i><span class="hidden-tablet"> Gallery</span>
						</a></li>
						<li class="nav-header hidden-tablet">Sample Section</li>
						<li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/table')?>"><i
								class="icon-align-justify"></i><span class="hidden-tablet">
									Tables</span> </a></li>
						<li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/calendar')?>"><i
								class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span>
						</a></li>
						<li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/grid')?>"><i class="icon-th"></i><span
								class="hidden-tablet"> Grid</span> </a></li>
						<li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/icon')?>"><i class="icon-star"></i><span
								class="hidden-tablet"> Icons</span> </a></li>
						<li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/file-manager')?>"><i
								class="icon-folder-open"></i><span class="hidden-tablet"> File
									Manager</span> </a></li>
						<li><a href="<?php echo Yii::app()->createUrl('site/index/view/tour')?>"><i class="icon-globe"></i><span
								class="hidden-tablet"> Tour</span> </a></li>			
						<?php /* 
						<li><a href="<?php echo Yii::app()->createUrl('site/index/view/error')?>"><i class="icon-ban-circle"></i><span
								class="hidden-tablet"> Error Page</span> </a></li>
						<li><a href="<?php echo Yii::app()->createUrl('site/index/view/login')?>"><i class="icon-lock"></i><span
								class="hidden-tablet"> Login Page</span> </a></li> */?>
					</ul>
					<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input
						id="is-ajax" type="checkbox"> Ajax on menu</label>
				</div>
				<!--/.well -->
			</div><!--/span-->