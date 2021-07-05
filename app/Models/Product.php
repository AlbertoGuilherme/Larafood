<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use TenantTrait;
    protected $fillable = ['id', 'title', 'flag', 'price', 'description', 'image'];


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
       /**
         * Category not linked with profile
         */
        public function categoriesAvaliable($filter = null)
        {
            $categories = Category::whereNotIn('id' , function($query){
                                $query->select('category_product.category_id');
                                $query->from('category_product');
                                $query->whereRaw("category_product.product_id={$this->id}");
                            })->where(function ( $queryFilter) use ($filter){
                                if($filter)
                                       $queryFilter->where('categories.name', 'LIKE', "%{$filter}%");
                            })
                            ->paginate();


                            return $categories;


        }
}
