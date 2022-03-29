<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Post;
use App\Models\ResourceType;
use App\Models\Skill;
use App\Models\Specialist;
use Illuminate\Support\ServiceProvider;
use App\Models\Region;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('auth.register', function($view) {
            $regions = Region::select('id','name_uz')->get();
            $this->regions = $regions;
            $view->with(['regions' => $this->regions]);
        });

        view()->composer(['home', 'layouts.footer'], function($view) {
            $latest_news = Post::active()->orderBy('id', 'desc')->limit(3)->get();
            $this->latest_news = $latest_news;
            $view->with(['latest_news' => $this->latest_news]);
        });

        view()->composer(['rezumes.create', 'profile.addvacancy', 'profile.editvacancy', 'auth.register', 'profile.addrezume', 'profile.editrezume'], function($view) {
            $specialists = Specialist::active()->orderBy('s_order')->get();
            $skills = Skill::select('id','name')->get();
            $this->specialists = $specialists;
            $this->skills = $skills;

            $view->with(['specialists' => $this->specialists, 'skills' => $this->skills]);
        });

        view()->composer(['layouts.app'], function($view) {
            $didnt_read_messages_count = Contact::where('is_read', 'is', false)->count();
            $this->didnt_read_messages_count = $didnt_read_messages_count;
            $view->with(['didnt_read_messages_count' => $this->didnt_read_messages_count]);
        });

        view()->composer(['admin.resources.*', 'layouts.*'], function($view) {
            $resource_types = ResourceType::active()->orderBy('r_order')->get();
            $this->resource_types = $resource_types;
            $view->with(['resource_types' => $this->resource_types]);
        });

        view()->composer(['includes.specialists_with_vacancies_count'], function($view) {
            $specialists_with_vacancies_count = Specialist::with('vacancies')->active()->orderBy('s_order')->get();
            $this->specialists_with_vacancies_count = $specialists_with_vacancies_count;
            $view->with(['specialists_with_vacancies_count' => $this->specialists_with_vacancies_count]);
        });

        view()->composer(['includes.specialists_with_rezumes_count'], function($view) {
            $specialists_with_rezumes_count = Specialist::with('rezumes')->active()->orderBy('s_order')->get();
            $this->specialists_with_rezumes_count = $specialists_with_rezumes_count;
            $view->with(['specialists_with_rezumes_count' => $this->specialists_with_rezumes_count]);
        });

        Paginator::useBootstrap();
    }
}
