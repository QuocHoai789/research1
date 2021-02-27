<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register_Documents extends Model
{
    protected $table = 'register_documents';
    public function studydoc()
    {
    	return $this->beLongsto('App\StudyDocument', 'study_document_id');
    }
}
