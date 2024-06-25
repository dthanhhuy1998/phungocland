<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use DB;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Article;
use App\Models\Project;
use App\Models\Config;
use App\Models\Province;

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
        View::composer('catalog.common.layout', function ($view) {
            $categories = Category::where('status', 1)
            ->where('id', '<>', 0)
            ->where('cat_type', 'article')
            ->where('parent_id', 0)
            ->orderBy('created_at', 'asc')
            ->get();

            $saleCategories = Category::where('cat_type', 'sale')
            ->where('status', 1)
            ->where('id', '<>', 1)
            ->orderBy('created_at', 'asc')
            ->get();

            $rentCategories = Category::where('cat_type', 'rent')
            ->where('status', 1)
            ->where('id', '<>', 1)
            ->orderBy('created_at', 'asc')
            ->get();

            $projectCategories = Category::where('cat_type', 'project')
            ->where('status', 1)
            ->where('id', '<>', 1)
            ->orderBy('created_at', 'asc')
            ->get();

            $pCategories = ProductCategory::where('parent_id', 0)
            ->where('id', '<>', 0)
            ->where('status', 1)
            ->orderBy('created_at', 'asc')
            ->get();

            $config = new Config();
            $codeHeader = $config->getValueByKey('code_header');
            $codeFooter = $config->getValueByKey('code_footer');
            $logo = $config->getValueByKey('logo');
            $phone = $config->getValueByKey('phone');
            $gmail = $config->getValueByKey('gmail');


            $view->with([
                'categories'        => $categories,
                'saleCategories'    => $saleCategories,
                'rentCategories'    => $rentCategories,
                'projectCategories' => $projectCategories,
                'pCategories'       => $pCategories,
                'serviceCodeHeader' => $codeHeader,
                'serviceCodeFooter' => $codeFooter,
                'logo'              => $logo,
                'servicePhone'      => $phone,
                'serviceGmail'      => $gmail,
            ]);
        });

        View::composer('catalog.common.header', function ($view) {
            // config
            $config = new Config();
            $phone = $config->getValueByKey('phone');
            $gmail = $config->getValueByKey('gmail');

            $view->with([
                'servicePhone'      => $phone,
                'serviceGmail'      => $gmail,
            ]);
        });

        View::composer('catalog.common.footer', function ($view) {
            // config
            $config = new Config();
            $configContact = $config->getValueByKey('contact');
            $googleMap = $config->getValueByKey('google_map');
            $logo = $config->getValueByKey('logo');
            $phone = $config->getValueByKey('phone');
            $gmail = $config->getValueByKey('gmail');
            $fanpage = $config->getValueByKey('fanpage');
            $youtube = $config->getValueByKey('youtube');
            $instagram = $config->getValueByKey('instagram');

            // access analytics
            // get access analytics
            $accessTotal = DB::table('truycap')->count();
            // get online analytices
            $online = DB::table('useronline')->distinct()->count('ip');

            $view->with([
                'serviceContact'    => $configContact,
                'serviceGoogleMap'  => $googleMap,
                'serviceLogo'       => $logo,
                'servicePhone'      => $phone,
                'serviceGmail'      => $gmail,
                'serviceFanpage'    => $fanpage,
                'serviceYoutube'    => $youtube,
                'serviceInstagram'  => $instagram,
                'accessTotal'       => $accessTotal,
                'online'            => $online
            ]);
        });

        View::composer('catalog.common.search-form', function ($view) {
            $provinces = Province::orderBy('name', 'asc')->get();

            $view->with([
                'provinces' => $provinces,
            ]);
        });

        View::composer('catalog.common.most_view_post', function ($view) {
            $lastedMostViewPost = Article::select('*')
            ->orderBy('view', 'desc')
            ->first();

            $mostViewPosts = Article::select('*')
            ->where('id', '<>', $lastedMostViewPost->id)
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

            $view->with([
                'lastedMostViewPost'    => $lastedMostViewPost,
                'mostViewPosts'         => $mostViewPosts
            ]);
        });
        
        View::composer('catalog.common.featured_post', function ($view) {
            $featuredPosts = Article::select('*')
            ->where('highlight', 1)
            ->orderBy('created_at', 'asc')
            ->take(5)
            ->get();
            
            $view->with([
                'featuredPosts' => $featuredPosts,
            ]);
        });

        View::composer('catalog.common.featured_project', function ($view) {
            $featuredProjects = Project::where('highlight', 1)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

            $view->with([
                'featuredProjects' => $featuredProjects,
            ]);
        });
    }
}
