<?php

namespace Lembarek\Core\Models;

use App\Traits\Categoriable;

class Category extends Model
{
  use Categoriable;

  protected $fillable = ['name', 'slug', 'description', 'parent', 'model'];

  public function setNameAttribute($value)
  {
    $this->attributes['name'] = $value;

    if (! $this->exists) {
      $this->attributes['slug'] = str_slug($value);
    }
  }

   /**
    * return children of this category
    *
    * @return Category
    */
   public function childrenCategories()
   {
        return $this->whereParent($this->id)->get();
   }

}
