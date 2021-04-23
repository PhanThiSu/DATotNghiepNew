<?php
class request_model extends  vendor_frap_model
{
	public $nopp = 20;
	public static $status = [
						0 => 'Chưa đọc',
						1 => 'Tán thành',
						2 => 'Từ chối'
					];

	protected $relationships = [
		'belongTo'	=>	['user','key'=>'user_id']
	];

	public function rules() {
		global $app;
	    return [
        	'datetime_start'=> ['required'],
        	'datetime_end' 	=> ['required'],
	        'reason'		=> ['required',	'string'],
	        'status'		=> [['inlist', 'value'=>array_keys(self::$status)]]
	    ];
	}
}
?>