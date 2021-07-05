<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the plan "creating" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function creating(Product $product)
    {
            $product->flag = Str::kebab($product->title);
    }

    /**
     * Handle the product "updating" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updating(Product $product)
    {
        $product->flag = Str::kebab($product->title);
    }

}
