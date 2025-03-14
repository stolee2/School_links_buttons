<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;

class Button extends Model
{
    protected $fillable = [
        'title',
        'link',
        'color',
        'position',
    ];
    public static $rules = [
        'title' => 'nullable|string',
        'link' => 'nullable|url',
        'color' =>'nullable|string',
        'position' => 'required|integer|between:1,9|unique:buttons,position',
    ];
    public static function validate($v){
        return Validator::make($v, static::$rules);
    } 
    public static function validateUpdate($dat, $id){
        $updateValidate = static :: $rules;
        $updateValidate['position'] = 'required|integer|between:1,9|unique:buttons,position,' . $id;
        return Validator::make($dat, $updateValidate);
    }
}
