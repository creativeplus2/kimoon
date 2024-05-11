<?php

namespace App\Providers;

use App\Models\Bank;
use App\Models\ProductCategory;
use App\Models\ProductUnit;
use App\Models\SubCategory;
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

        View::composer(['products.create', 'products.edit'], function ($view) {
            $data = SubCategory::select('id', 'nama_sub_kategori')->get();
            return $view->with(
                'subCategories',
                $data
            );
        });

        View::composer(['products.create', 'products.edit'], function ($view) {
            $data = ProductUnit::select('id', 'nama_unit')->get();
            return $view->with(
                'productUnits',
                $data
            );
        });

        View::composer(['kabkots.create', 'kabkots.edit', 'members.create', 'members.edit','members.show'], function ($view) {
            return $view->with(
                'provinces',
                \App\Models\Province::select('id', 'provinsi')->get()
            );
        });

        View::composer(['kecamatans.create', 'kecamatans.edit'], function ($view) {
            return $view->with(
                'kabkots',
                \App\Models\Kabkot::select('id', 'kabupaten_kota')->get()
            );
        });

        View::composer(['kelurahans.create', 'kelurahans.edit'], function ($view) {
            return $view->with(
                'kecamatans',
                \App\Models\Kecamatan::select('id', 'kecamatan')->get()
            );
        });
    }
}
