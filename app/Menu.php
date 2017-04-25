<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{


    public $fillable = ['parent_id', 'permission_id', 'name', 'url', 'target', 'icon', 'status'];

    /**
     * The roles that belong to the user.
     */
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function subMenu()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function scopeParent($query)
    {
        return $query->where('parent_id', 0);
    }
}
