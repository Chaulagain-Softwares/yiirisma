<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
$this->title = 'Dashboard';
?>
<?php if (isset($_GET['view'])):
$this->widget('Wmain',array('view'=>$_GET['view']));	
else:
Yii::app()->user->setFlash('block', 'this is set from '.__FILE__);
Yii::app()->user->setFlash('error', 'this is set from '.__FILE__);
Yii::app()->user->setFlash('info', 'this is set from '.__FILE__);
Yii::app()->user->setFlash('success', 'this is set from '.__FILE__);
?>

<div class="sortable row-fluid">
	<a data-rel="tooltip" title="6 new members."
		class="well span3 top-block" href="#"> <span
		class="icon32 icon-red icon-user"></span>
		<div>Total Members</div>
		<div>507</div> <span class="notification">6</span>
	</a> <a data-rel="tooltip" title="4 new pro members."
		class="well span3 top-block" href="#"> <span
		class="icon32 icon-color icon-star-on"></span>
		<div>Pro Members</div>
		<div>228</div> <span class="notification green">4</span>
	</a> <a data-rel="tooltip" title="$34 new sales."
		class="well span3 top-block" href="#"> <span
		class="icon32 icon-color icon-cart"></span>
		<div>Sales</div>
		<div>$13320</div> <span class="notification yellow">$34</span>
	</a> <a data-rel="tooltip" title="12 new messages."
		class="well span3 top-block" href="#"> <span
		class="icon32 icon-color icon-envelope-closed"></span>
		<div>Messages</div>
		<div>25</div> <span class="notification red">12</span>
	</a>
</div>

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
			<h2>
				<i class="icon-info-sign"></i> Introduction
			</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i>
				</a> <a href="#" class="btn btn-minimize btn-round"><i
					class="icon-chevron-up"></i> </a> <a href="#"
					class="btn btn-close btn-round"><i class="icon-remove"></i> </a>
			</div>
		</div>
		<div class="box-content">
			<h1>
				Yiirisma <small>free, premium quality, responsive, multiple skin
					YII admin template.</small>
			</h1>
			<p>Its a live demo of the template. I have created Yiirisma to ease
				the repeat work I have to do on my projects. Now I re-use Yiirisma
				as a base for my admin panel work and I am sharing it with you :)</p>
			<p>
				<b>All pages in the menu are functional, take a look at all, please
					share this with your followers.</b>
			</p>
			<p class="center">
				<a href="#"
					class="btn btn-large btn-primary"><i
					class="icon-chevron-left icon-white"></i> Back to article</a> <a
					href="http://rkchaulagain.com.np/yiirisma"
					class="btn btn-large"><i class="icon-download-alt"></i> Download Page</a>
			</p><?php /* 
			http://usman.it/free-responsive-admin-template
			 */?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="row-fluid sortable">
	<div class="box span4">
		<div class="box-header well">
			<h2>
				<i class="icon-th"></i> Tabs
			</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i>
				</a> <a href="#" class="btn btn-minimize btn-round"><i
					class="icon-chevron-up"></i> </a> <a href="#"
					class="btn btn-close btn-round"><i class="icon-remove"></i> </a>
			</div>
		</div>
		<div class="box-content">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active"><a href="#info">Info</a></li>
				<li><a href="#custom">Custom</a></li>
				<li><a href="#messages">Messages</a></li>
			</ul>

			<div id="myTabContent" class="tab-content">
				<div class="tab-pane active" id="info">
					<h3>
						Yiirisma <small>a fully featued YII template</small>
					</h3>
					<p>Its a fully featured, responsive YII template for your admin panel.
						Its optimized for tablet and mobile phones. Scan the QR code below
						to view it in your mobile device.</p>
					<img alt="QR Code" class="charisma_qr center"
						src="<?php echo Yii::app()->baseUrl?>/img/qrcode136.png" />
				</div>
				<div class="tab-pane" id="custom">
					<h3>
						Custom <small>small text</small>
					</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Curabitur bibendum ornare dolor.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales
						at. Nulla tellus elit, varius non commodo eget, mattis vel eros.
						In sed ornare nulla. Donec consectetur, velit a pharetra
						ultricies, diam lorem lacinia risus, ac commodo orci erat eu
						massa. Sed sit amet nulla ipsum. Donec felis mauris, vulputate sed
						tempor at, aliquam a ligula. Pellentesque non pulvinar nisi.</p>
				</div>
				<div class="tab-pane" id="messages">
					<h3>
						Messages <small>small text</small>
					</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales
						at. Nulla tellus elit, varius non commodo eget, mattis vel eros.
						In sed ornare nulla. Donec consectetur, velit a pharetra
						ultricies, diam lorem lacinia risus, ac commodo orci erat eu
						massa. Sed sit amet nulla ipsum. Donec felis mauris, vulputate sed
						tempor at, aliquam a ligula. Pellentesque non pulvinar nisi.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Curabitur bibendum ornare dolor.</p>
				</div>
			</div>
		</div>
	</div>
	<!--/span-->

	<div class="box span4">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-user"></i> Member Activity
			</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i
					class="icon-chevron-up"></i> </a> <a href="#"
					class="btn btn-close btn-round"><i class="icon-remove"></i> </a>
			</div>
		</div>
		<div class="box-content">
			<div class="box-content">
				<ul class="dashboard-list">
					<li><a href="#"> <img class="dashboard-avatar" alt="Usman"
							src="http://www.gravatar.com/avatar/f0ea51fa1e4fae92608d8affee12f67b.png?s=50">
					</a> <strong>Name:</strong> <a href="#">Usman </a><br> <strong>Since:</strong>
						17/05/2012<br> <strong>Status:</strong> <span
						class="label label-success">Approved</span>
					</li>
					<li><a href="#"> <img class="dashboard-avatar" alt="Sheikh Heera"
							src="http://www.gravatar.com/avatar/3232415a0380253cfffe19163d04acab.png?s=50">
					</a> <strong>Name:</strong> <a href="#">Sheikh Heera </a><br> <strong>Since:</strong>
						17/05/2012<br> <strong>Status:</strong> <span
						class="label label-warning">Pending</span>
					</li>
					<li><a href="#"> <img class="dashboard-avatar" alt="Abdullah"
							src="http://www.gravatar.com/avatar/46056f772bde7c536e2086004e300a04.png?s=50">
					</a> <strong>Name:</strong> <a href="#">Abdullah </a><br> <strong>Since:</strong>
						25/05/2012<br> <strong>Status:</strong> <span
						class="label label-important">Banned</span>
					</li>
					<li><a href="#"> <img class="dashboard-avatar" alt="Saruar Ahmed"
							src="http://www.gravatar.com/avatar/564e1bb274c074dc4f6823af229d9dbb.png?s=50">
					</a> <strong>Name:</strong> <a href="#">Saruar Ahmed </a><br> <strong>Since:</strong>
						17/05/2012<br> <strong>Status:</strong> <span
						class="label label-info">Updates</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!--/span-->

	<div class="box span4">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-list-alt"></i> Realtime Traffic
			</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i
					class="icon-chevron-up"></i> </a> <a href="#"
					class="btn btn-close btn-round"><i class="icon-remove"></i> </a>
			</div>
		</div>
		<div class="box-content">
			<div id="realtimechart" style="height: 190px;"></div>
			<p class="clearfix">You can update a chart periodically to get a
				real-time effect by using a timer to insert the new data in the plot
				and redraw it.</p>
			<p>
				Time between updates: <input id="updateInterval" type="text"
					value="" style="text-align: right; width: 5em"> milliseconds
			</p>
		</div>
	</div>
	<!--/span-->
</div>
<!--/row-->

<div class="row-fluid sortable">
	<div class="box span4">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-list"></i> Buttons
			</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i>
				</a> <a href="#" class="btn btn-minimize btn-round"><i
					class="icon-chevron-up"></i> </a> <a href="#"
					class="btn btn-close btn-round"><i class="icon-remove"></i> </a>
			</div>
		</div>
		<div class="box-content buttons">
			<p class="btn-group">
				<button class="btn">Left</button>
				<button class="btn">Middle</button>
				<button class="btn">Right</button>
			</p>
			<p>
				<button class="btn btn-small">
					<i class="icon-star"></i> Icon button
				</button>
				<button class="btn btn-small btn-primary">Small button</button>
				<button class="btn btn-small btn-danger">Small button</button>
			</p>
			<p>
				<button class="btn btn-small btn-warning">Small button</button>
				<button class="btn btn-small btn-success">Small button</button>
				<button class="btn btn-small btn-info">Small button</button>
			</p>
			<p>
				<button class="btn btn-small btn-inverse">Small button</button>
				<button class="btn btn-large btn-primary btn-round">Round button</button>
				<button class="btn btn-large btn-round">
					<i class="icon-ok"></i>
				</button>
				<button class="btn btn-primary">
					<i class="icon-edit icon-white"></i>
				</button>
			</p>
			<p>
				<button class="btn btn-mini">Mini button</button>
				<button class="btn btn-mini btn-primary">Mini button</button>
				<button class="btn btn-mini btn-danger">Mini button</button>
				<button class="btn btn-mini btn-warning">Mini button</button>
			</p>
			<p>
				<button class="btn btn-mini btn-info">Mini button</button>
				<button class="btn btn-mini btn-success">Mini button</button>
				<button class="btn btn-mini btn-inverse">Mini button</button>
			</p>
		</div>
	</div>
	<!--/span-->

	<div class="box span4">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-list"></i> Buttons
			</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i>
				</a> <a href="#" class="btn btn-minimize btn-round"><i
					class="icon-chevron-up"></i> </a> <a href="#"
					class="btn btn-close btn-round"><i class="icon-remove"></i> </a>
			</div>
		</div>
		<div class="box-content  buttons">
			<p>
				<button class="btn btn-large">Large button</button>
				<button class="btn btn-large btn-primary">Large button</button>
			</p>
			<p>
				<button class="btn btn-large btn-danger">Large button</button>
				<button class="btn btn-large btn-warning">Large button</button>
			</p>
			<p>
				<button class="btn btn-large btn-success">Large button</button>
				<button class="btn btn-large btn-info">Large button</button>
			</p>
			<p>
				<button class="btn btn-large btn-inverse">Large button</button>
			</p>
			<div class="btn-group">
				<button class="btn btn-large">Large Dropdown</button>
				<button class="btn btn-large dropdown-toggle" data-toggle="dropdown">
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li><a href="#"><i class="icon-star"></i> Action</a></li>
					<li><a href="#"><i class="icon-tag"></i> Another action</a></li>
					<li><a href="#"><i class="icon-download-alt"></i> Something else
							here</a></li>
					<li class="divider"></li>
					<li><a href="#"><i class="icon-tint"></i> Separated link</a></li>
				</ul>
			</div>

		</div>
	</div>
	<!--/span-->

	<div class="box span4">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-list"></i> Weekly Stat
			</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i>
				</a> <a href="#" class="btn btn-minimize btn-round"><i
					class="icon-chevron-up"></i> </a> <a href="#"
					class="btn btn-close btn-round"><i class="icon-remove"></i> </a>
			</div>
		</div>
		<div class="box-content">
			<ul class="dashboard-list">
				<li><a href="#"> <i class="icon-arrow-up"></i> <span class="green">92</span>
						New Comments
				</a>
				</li>
				<li><a href="#"> <i class="icon-arrow-down"></i> <span class="red">15</span>
						New Registrations
				</a>
				</li>
				<li><a href="#"> <i class="icon-minus"></i> <span class="blue">36</span>
						New Articles
				</a>
				</li>
				<li><a href="#"> <i class="icon-comment"></i> <span class="yellow">45</span>
						User reviews
				</a>
				</li>
				<li><a href="#"> <i class="icon-arrow-up"></i> <span class="green">112</span>
						New Comments
				</a>
				</li>
				<li><a href="#"> <i class="icon-arrow-down"></i> <span class="red">31</span>
						New Registrations
				</a>
				</li>
				<li><a href="#"> <i class="icon-minus"></i> <span class="blue">93</span>
						New Articles
				</a>
				</li>
				<li><a href="#"> <i class="icon-comment"></i> <span class="yellow">254</span>
						User reviews
				</a>
				</li>
			</ul>
		</div>
	</div>
	<!--/span-->
</div>
<!--/row-->
<?php endif;?>
