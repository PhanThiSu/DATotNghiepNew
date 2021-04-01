<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>
<link rel="stylesheet" href="<?php echo RootREL; ?>media/bootstrap/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/select2/select2.min.css">
<script> var data = [], labels=[];  </script>
<?php vendor_html_helper::contentheader('reports <small>management</small>', [['urlp'=>['ctl'=>$app['ctl'], 'act'=>$app['act']]]]); 

	$total=0;
	if($this->records) { 
		foreach($this->records as $record){
			$total += $record['total'];
		}
	}
?>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
			    <div class="box-header with-border row id="reports-header">
					<div class="col-sm-6">
						<h3 class="box-title">
							User report in groups 
						</h3>
					</div>
					<div class="col-sm-6">
						<h3 class="box-title text-info pull-right text-right">This <?php echo $this->timetype; ?>, <a href="<?php echo vendor_app_util::url(['ctl'=>'reports','act'=>'user/'.$this->user['id']]); ?>"><?=$this->user['lastname'];?></a> have total work time is <strong class="text-danger"><?=$total;?></strong> hour(s)</h3>
					</div>
			    </div>
				 
			    <div class="box-body row">
	    			<div class="col-sm-10 col-xs-10">

						<div class="row" style="margin-bottom: 20px;">
							<div class="btn-group btn-toggle col-md-6"> 
								<button class="btn <?=($this->timetype=='all')? 'btn-danger active':'btn-default ';?>">All</button>
							    <button class="btn <?=($this->timetype=='year')? 'btn-danger active':'btn-default ';?>">Year</button>
							    <button class="btn <?=($this->timetype=='month')? 'btn-danger active':'btn-default';?>">Month</button>
							    <button class="btn <?=($this->timetype=='week')? 'btn-danger active':'btn-default ';?>">Week</button>
							    <button class="btn <?=($this->timetype=='date')? 'btn-danger active':'btn-default ';?>">Date</button>
							</div>
						</div>

						<div class="row">
			      			<form id="form-report" action="<?php echo vendor_app_util::url(["ctl"=>"reports", "act"=>'usertimegroups']); ?>" method="post" enctype="multipart/form-data" class="form-inline">
			      				<input type="hidden" name="timetype" id="timetype" value="<?=$this->timetype;?>">
				      				<div class="col-md-4 form-group form-inline form-report <?=($this->timetype=='year')? '':'hide';?>" id="form-report-year" >
								    <label class="sr-only" for="exampleInputAmount">Select year: </label>
								    <div class="input-group">
								      	<div class="input-group-addon mobileHide">Select year: </div>
								      		<?php $crry = date('Y');?>
				      						<select name="year" class="form-control selectInput" id="year">
				      						<?php for ($i=$crry; $i>2009; $i--): ?>
				      							<option <?=($this->time==$i)? 'selected':''; ?> value="<?=$i;?>"><?=$i;?></option>
				      						<?php endfor; ?>
				      						</select>
				      					</div>
				      				</div>
								
								<div class="col-md-5 form-group form-inline form-report <?=($this->timetype=='month')? '':'hide';?>" id="form-report-month">
								    <label class="sr-only" for="exampleInputAmount">Select month: </label>
								    <div class="input-group user-input-group">
								      	<div class="input-group-addon mobileHide">Select month: </div>
			      						<input type="month" name="month" class="form-control" id="month" placeholder="Month..." <?=(isset($this->time) && $this->timetype=='month')? 'value="'.$this->time.'"':'';?>>
			      					</div>
			      				</div>
							
			      				<div class="col-md-4 form-group form-inline form-report <?=($this->timetype=='week')? '':'hide';?>" id="form-report-week">
				                    <label class="sr-only" for="exampleInputAmount">Select week: </label>
				                    <div class="input-group user-input-group">
				                      	<div class="input-group-addon mobileHide">Select week: </div>
				                      	<input type="week" name="week" class="form-control" id="week" placeholder="Week..." <?=(isset($this->time) && $this->timetype=='week')? 'value="'.$this->time.'"':'';?>>
				                    </div>
			                  	</div>

			                  	<div class="col-md-4 form-group form-inline form-report <?=($this->timetype=='date')? '':'hide';?>" id="form-report-date">
				                    <label class="sr-only" for="exampleInputAmount">Select date: </label>
				                    <div class="input-group user-input-group">
				                      	<div class="input-group-addon mobileHide">Select date: </div>
				                      	<input type="date" name="date" class="form-control" id="date"  <?=(isset($this->time) && $this->timetype=='date')? 'value="'.$this->time.'"':'';?>>
				                    </div>
			                  	</div>

							
								<div class="form-group col-md-4 ">
								    <label class="sr-only" for="exampleInputAmount">Select users: </label>
								    <div class="input-group">
								      	<div class="input-group-addon mobileHide">Select users: </div>
								      	<select name="user_id" id="user_id" class="form-control select2" style="width: 120px">
								      		<?php foreach ($this->users as $user) { ?>
												<option value="<?=$user['id'];?>" <?=($this->user['id']==$user['id'])? 'selected="selected"':'';?>><?=$user['firstname'].' '.$user['lastname'];?></option>
											<?php } ?>
			      						</select>
			      					</div>
			      				</div>

								<button type="submit" class="btn btn-info btt-submit-margin" name="btn_submit">Submit</button>
			      			</form>
						</div>
	    			</div>

	    			<div class="col-sm-2 col-xs-2">
	    				<a href="<?php echo vendor_app_util::url(['ctl'=>'reports','act'=>'add']); ?>" id="add-report" type = "button" class="btn btn-primary pull-right" >
	    					<i class="fa fa-plus"></i>
	    				</a>	
	    			</div>
	    		</div>
		    	<!-- /.box-header -->

			    <div class="box-body">
					<div id="table_wrapper" class="dataTables_wrapper form-inline dt-boostrap">
						<div class="row">
							<div class="col-sm-6">
								<canvas id="myChart" width="100%" height="100%"></canvas>
							</div>
							<div class="col-sm-6">
								<table id="table_reports" class="table table-bordered table-striped dataTable" role = "grid" aria-describedby="example1_info" controller="reports" >
									<thead>
										<tr role="row">
											<th>Group</th>
											<th>Total Time</th>
											<th>Percent</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="tbody-reports">
									<?php if($this->records && $this->records->num_rows) { ?>
						                <?php foreach($this->records as $record) { ?>
						                	<tr>
												<td><?=$record['name']; ?></td>
												<td><?=$record['total']; ?></td>
												<td>
													<?=100*round(($record['total']/$total), 4); ?>	
												</td>
												<td>
													<a type="button" class="btn btn-success view-record month" href="<?=vendor_app_util::url(array('ctl'=>'reports', 'act'=>'usergroup/id_group='.$record['group_id'].'/id_user='.$record['user_id']));?>"><i class="fa fa-eye" aria-hidden="true"></i>
													</a>
												</td>
												<script> 
													data.push(<?=$record['total'];?>);
													labels.push("<?=$record['name']; ?>");
												</script>
						                	</tr>
											<?php $i++; ?>
						                <?php } ?>
						            <?php } else { ?>
										<tr role="row"><td colspan="3"><h3 class="text-danger text-center"> No data </h3></td></tr>
						            <?php } ?>
									</tbody>
									<tfoot>
					                	<tr>
											<th>Group</th>
											<th>Total Time</th>
											<th>Percent</th>
											<th>Action</th>
					                	</tr>
					                </tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="<?php echo RootREL; ?>media/admin/js/userstimegroups.js"></script>	
<script src="<?php echo RootREL; ?>media/select2/select2.full.min.js"></script>
<script src="<?php echo RootREL; ?>media/chartjs/Chart.min.js"></script>
<script src="<?php echo RootREL; ?>media/admin/js/usersgroups.js"></script>
<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>
