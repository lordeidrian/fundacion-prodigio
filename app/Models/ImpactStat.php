<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpactStat extends Model
{
    use HasFactory;
    protected $fillable = ['value', 'label', 'icon', 'order', 'is_active'];
}
