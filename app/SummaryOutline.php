<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SummaryOutline extends Model
{
	protected $table = 'summary_outline';

	public function document()
	{
		return $this->belongsTo('App\Documents' , 'id_doc');
	}    
}
