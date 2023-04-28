<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
  use HasFactory;
  protected $fillable = [
    'employee', 
    'passport_type', 
    'passport_num',
    'issue_date',
    'expiry_date',
    'comment',
    // 'title', 
    // 'category', 
    // 'content', 
    'image'];

  
}
