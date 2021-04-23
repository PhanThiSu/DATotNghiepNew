<div class="row">
	<div class="col-xs-12">
		<div class="box">		   
		    <div class="box-body">
		    	<fieldset>
				    <div id="legend">
				      <legend class=""><?php echo "Xem chi tiết nhóm" ?></legend>
				    </div>
				    <?php if($app['act'] != 'view') { ?>
				    	<form id="form-addgroup" action="<?php echo vendor_app_util::url(["ctl"=>"groups", "act"=>$app['act'] == 'edit'?$app['act']."/".$this->record['id']:$app['act']]); ?>" method="post" enctype="multipart/form-data">
				    <?php } ?>
				    	<?php //if(property_exists(get_class($this),'errors')) { ?>
				    	<?php if(isset(($this->errors['database']))) { ?>
				    		<div class="alert alert-danger  alert-dismissible fade in" role="alert"> 
				    			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
				    			<h4>Oh snap! You got an error!</h4> 
				    			<p><?=$this->errors['database'];?></p> 
				    		</div>
				    	<?php } ?>

						    <div class="form-group row">
						      <!-- First Name -->
						      <label class="control-label col-md-3" for="name">Tên nhóm</label>
						      <div class="controls col-md-7">
						        <input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="name" name="group[name]" placeholder="" class="form-control" value="<?php if(isset($this->record['name'])) echo $this->record['name']; ?>">
						        <?php if( isset($this->errors['name'])) { ?>
						        	<p class="text-danger"><?=$this->errors['name']; ?></p>
						        <?php } ?>
						      </div>
						    </div>

							<div class="form-group row">
							    <label for="start_day" class="col-md-3 control-label">Ngày bắt đầu</label>
							    <div class="col-md-7">
							      <input <?php if($app['act']=='view') echo "disabled"; ?> name="group[start_day]" type="date" class="form-control" id="start_day" required <?php echo (isset($this->record))? "value='".$this->record['start_day']."'":""; ?>>
						          <?php if( isset($this->errors['start_day'])) { ?>
						        	<p class="text-danger"><?=$this->errors['start_day']; ?></p>
						          <?php } ?>
							    </div>
							</div>

							<div class="form-group row">
							    <label for="end_day" class="col-md-3 control-label">Ngày kết thúc</label>
							    <div class="col-md-7">
							      <input <?php if($app['act']=='view') echo "disabled"; ?> name="group[end_day]" type="date" class="form-control" id="end_day" required <?php echo (isset($this->record))? "value='".$this->record['end_day']."'":""; ?>>
						          <?php if( isset($this->errors['end_day'])) { ?>
						        	<p class="text-danger"><?=$this->errors['end_day']; ?></p>
						          <?php } ?>
							    </div>
							</div>
							
						    <div class="form-group row">
						      <!-- E-mail -->
						      <label class="control-label col-md-3" for="description">Mô tả</label>
						      <div class="controls col-md-7">
						        <textarea <?php if($app['act']=='view') echo "disabled"; ?> id="description" name="group[description]" placeholder="Description..." class="form-control" value="<?php if(isset($this->record['description'])) echo($this->record['description']); ?>"><?php echo (isset($this->record))? " ".$this->record['description']." ":""; ?></textarea>
						        <?php if( isset($this->errors['description'])) { ?>
						        	<p class="text-danger"><?=$this->errors['description']; ?></p>
						        <?php } ?>
						      </div>
						    </div>

						    <div class="form-group row">
						      <!-- Status -->
						      <label class="control-label col-md-3" for="status">Trạng thái</label>
						      <div class="controls col-md-7">
						      	<?php if($app['act'] !='view'){ ?>
							      	<select name="group[status]" id="input-status" class="form-control">
							      		<?php foreach (group_model::$status as $k => $v) { ?>
											<option value="<?=$k;?>" <?=(!isset($this->record['status']) && 1==$k)? 'selected':'';?> <?=(isset($this->record['status']) && $this->record['status']==$k)? 'selected="selected"':'';?>
											><?=$v;?>
											</option>
										<?php } ?>
									</select>
								<?php } else { ?>
									<input disabled type="text" id="status" name="group[status]"  class="form-control" value="<?php if(isset($this->record['status'])) echo group_model::$status[$this->record['status']]; ?>">
								<?php } ?>
						        <?php if( isset($this->errors['status'])) { ?>
						        	<p class="text-danger"><?=$this->errors['status']; ?></p>
						        <?php } ?>
						      </div>
						    </div>

						    <?php if($app['act'] !='view'){ ?>
							    <div class="form-group row">
							      <div class="controls col-md-10">
							        <input class="btn btn-success pull-right" type="submit" name="btn_submit" value="<?php echo ucfirst($app['act']) ?>">
							      </div>
							    </div>
						    <?php } ?>
				    <?php if($app['act'] != 'view') { ?>
				    	</form>
				    <?php } ?>
				</fieldset>
		    </div>
		</div>
	</div>
</div>
