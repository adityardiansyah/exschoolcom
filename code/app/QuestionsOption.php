<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionsOption extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['option', 'correct', 'question_id'];

    public function setQuestionIdAttribute($input)
    {
        $this->attributes['question_id'] = $input ? $input : null;
    }
    
    public function questionId()
    {
        return $this->belongsTo(Question::class, 'question_id')->withTrashed();
    }
}
