<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductService;

class ProductServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        $this ->app->singleton(ProductService::class, function($app)
    {
        $products =[
            [
            'id' => 1,
            'name' => 'Apple',
            'category' => 'fruit' ],
            [
                'id' => 2,
                'name' => 'Brocolli',
                'category' => 'Vegetables' ],
            [
            'id' => 3,
            'name' => 'Sardines',
            'category' => 'Canned Goods' ],
        ];
        return new ProductService($products);
    });

    }


    public function boot(): void
    {
        view()->share('productkey', 'abc123');
    }

    public function show(ProductService $productService, string $id)
    {
        $product = collect($productService->listProducts())->filter(function($item) use($id){
            return $item['id'] == $id;
        })->first();
        return $product;
    }
    


    
}
