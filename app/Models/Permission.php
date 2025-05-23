<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

 /**
  * The attributes that aren't mass assignable.
  *
  * @var array
  */
 protected $guarded = [];

 
//  we need to add json format column 
  protected $casts = [
    'permission' => 'json'
  ];

  public function role()
  {
      return $this->belongsTo(Role::class);
  }



}
