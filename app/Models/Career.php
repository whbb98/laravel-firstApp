<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Career extends Model
{
    use HasFactory;
    protected $table = 'career';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function addCareerRow(Request $req)
    {
        $this->type = strip_tags($req->career_type);
        $this->career_name = strip_tags($req->career_name);
        $this->period = strip_tags($req->career_period);
        $this->organization = strip_tags($req->organization);
        return $this->save();
    }
    public function dropCareerRow($id)
    {
        return $this->delete();
    }
}
