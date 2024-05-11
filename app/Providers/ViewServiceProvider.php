<?php

namespace App\Providers;

use App\Models\Bank;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;




class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['users.create', 'users.edit'], function ($view) {
            $data = Role::select('id', 'name')->get();
            return $view->with(
                'roles',
                $data
            );
        });
        View::composer(['account-banks.create', 'account-banks.edit'], function ($view) {
            $data = Bank::select('id', 'nama_bank')->get();
            return $view->with(
                'banks',
                $data
            );
        });

        View::composer(['sub-categories.create', 'sub-categories.edit'], function ($view) {
            $data = ProductCategory::select('id', 'nama_kategori')->get();
            return $view->with(
                'productCategories',
                $data
            );
        });



    }
}
