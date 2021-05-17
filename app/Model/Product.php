<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['name', 'description', 'price', 'image'];


      public function search($filter = null){
          $results = $this->where(function ($query) use($filter){
                    if($filter){
                        $query->where('name', 'LIKE', "%{$filter}%");
                    }
          })->paginate();

       return $results;
      }

}
