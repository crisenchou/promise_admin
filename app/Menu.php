<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Menu
 *
 * @property-read \App\Permission $permission
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Menu[] $subMenu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu parent()
 * @mixin \Eloquent
 */
class Menu extends Model
{

    public $fillable = [
        'pid', 'name', 'url', 'target', 'icon', 'status'
    ];

    /**
     * The roles that belong to the user.
     */
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function subMenu()
    {
        return $this->hasMany(Menu::class, 'pid');
    }

    public function scopeParent($query)
    {
        return $query->where('pid', 0);
    }
}
