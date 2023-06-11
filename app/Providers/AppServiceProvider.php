<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Cart;
use App\Models\Room;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        $page_data = Page::where('id', 1)->first();
        view()->share('global_page_data', $page_data);

        // $contact_data = Contact::where('id', 1)->first();
        $contact_data = Contact::first();
        view()->share('global_page_data_second', $contact_data);

        $cart_data = Cart::first();
        view()->share('global_page_data_third', $cart_data);

        $room_data = Room::get();
        view()->share('global_room_data', $room_data);

        $setting_data = Setting::where('id',1)->first();
        view()->share('global_setting_data', $setting_data);
    }
}
