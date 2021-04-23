<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>
<link rel="stylesheet" href="<?php echo RootREL; ?>media/bootstrap/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/bootstrap/css/checkbox-x.min.css">
<?php 
global $app;
if(isset($app['prs']['status'])) {
	if($app['prs']['status'])
		$checkboxVal = 1;
	else
		$checkboxVal = NULL;
} else 	$checkboxVal = 0;
?>
<script type="text/javascript">	
	var norecords 	= parseInt(<?php echo $this->records['norecords']; ?>);
	var nocurp 		= parseInt(<?php echo $this->records['nocurp']; ?>);
	var curp 		= parseInt(<?php echo $this->records['curp']; ?>);
	var nopp 		= parseInt(<?php echo $this->records['nopp']; ?>);

	var getDisable  = <?=(isset($app['prs']['status']) && ($app['prs']['status']==='0'))? 1:0;?>
</script>

<?php vendor_html_helper::contentheader('Quản lý thông báo', [['urlp'=>['ctl'=>$app['ctl'], 'act'=>$app['act']]]]); ?>

	<div class="row content">
		<div class="col-xs-12 col-lg-12">
			<div class="box dataTables_wrapper">
			    <div class="box-header">
		    		<div class="row" id="records-header">
		    			<div class="col-sm-8 col-xs-6">
		    			</div>
		    			<div class="col-sm-4 col-xs-6">
							<a href="<?php echo vendor_app_util::url(['ctl'=>'notifications','act'=>'add']); ?>" id="add-record">
		    					<button class="btn btn-primary pull-right ml-1 mb-1">
		    					<i class="fa fa-plus"></i>
		    					</button>
		    				</a>	
		    			</div>
		    			<div class="col-sm-8 col-xs-6">
		    			</div>
		    		</div>
			    </div>

			    	
			    <div class="box-body">
					<ul class="sidebar-menu" data-widget="tree">
						<?php if(empty($this->records['data'])){?>
							<tr role="row"><td colspan="3"><h3 class="text-danger text-center"> No data</h3></td></tr>
						<?php }?>
						<?php $count = 1; foreach ($this->records['data'] as $record) { ?>
						<li class="treeview">
							<a href="#">
								<span class='textFullName'><?= $record['users_firstname']." ".$record['users_lastname'] ?></span>
								<span><?= $record['title'] ?></span>
								<span class="pull-right-container">
									<span class="mr-1"> <i class="fa fa-calendar-check-o"></i> </span>
									<span class="mr-1 treeview-time"><?= $record['created'] ?></span>
									<i class="fa fa-angle-right pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu content_ul" style="background:white;margin-bottom:20px; margin-top:20px;padding:20px;">
								<li style="white-space:normal;">
									<h4>Chủ đề: <span><?= $record['title'] ?></span></h4></br>
									<h4>Nội dung:</h4></br>
									<div class='ml-1'><?= $record['content'] ?></div></br>
									<h4>Từ: <span><?= $record['users_firstname']." ".$record['users_lastname'] ?></span></h4>
								</li>
							</ul>
						</li>
						<?php } ?>
					</ul>
					<div class="row">
						<?php vendor_html_helper::pagination($this->records['norecords'], $this->records['nocurp'], $this->records['curp'], $this->records['nopp']); ?>
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo RootREL; ?>media/bootstrap/js/checkbox-x.min.js"></script>

<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>
