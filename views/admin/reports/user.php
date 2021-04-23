<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>
<link rel="stylesheet" href="<?php echo RootREL; ?>media/bootstrap/css/dataTables.bootstrap.min.css">
<script type="text/javascript">
	var norecords 	= parseInt(<?php echo $this->records['norecords']; ?>);
	var nocurp 		= parseInt(<?php echo $this->records['nocurp']; ?>);
	var curp 		= parseInt(<?php echo $this->records['curp']; ?>);
	var nopp 		= parseInt(<?php echo $this->records['nopp']; ?>);
</script>

<?php vendor_html_helper::contentheader('Quản lý báo cáo công việc', [['urlp'=>['ctl'=>$app['ctl'], 'act'=>$app['act']]]]); ?>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
			    <div class="box-body row">
	    			<div class="col-sm-10 col-xs-10">
	    			</div>

	    			<div class="col-sm-2 col-xs-2">
	    				<button id="delete-reports" class="btn btn-danger pull-right">
	    					<i class="fa fa-remove"></i>
	    				</button>
	    				<a href="<?php echo vendor_app_util::url(['ctl'=>'reports','act'=>'add']); ?>" id="add-report" type = "button" class="btn btn-primary pull-right" >
	    					<i class="fa fa-plus"></i>
	    				</a>	
	    			</div>
			    </div>
			    <!-- /.box-header -->
			    
				<?php include_once 'views/admin/'.$this->controller.'/_datatable.php';	?>
			    </div>
			</div>
		</div>
	</div>
</section>

<script src="<?php echo RootREL; ?>media/admin/js/reports_table.js"></script>
<!-- /.box -->
<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>