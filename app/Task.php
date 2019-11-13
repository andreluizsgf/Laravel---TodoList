<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    public const STATUS = [1 => 'Pendente', 2 => 'Finalizada'];
        
    protected $fillable = [
        'description'
    ];

    public static function rules()
    {
        $rules = [
            'description' => ['text', 'required', 'max:191'],
        ];

        return $rules;
    }

    public function getIsDoneStrAttribute($value)
    {
        if (empty($this->is_done)) {
            return "";
        }
        return self::STATUS[$this->is_done];
    }
}
