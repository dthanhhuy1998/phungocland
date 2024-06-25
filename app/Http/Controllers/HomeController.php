<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use SEOMeta;

use App\Models\Project;
use App\Models\Sale;
use App\Models\Rent;
use App\Models\Article;
use App\Models\Slide;
use App\Models\Category;
use App\Models\Partner;
use App\Models\CustomerRegister;
use App\Models\Config;
use App\Models\Province;
use App\Models\SaleGalleryModel;
use App\Models\RentGalleryModel;
use App\Models\ProjectGalleryModel;
use App\Models\ArticleGallery;
use App\Models\ProductCategory;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Models
        $article = new Article();

        $slides = Slide::where('status', 1)->orderBy('position', 'asc')->get();

        $lastedProjectFeatureds = Project::where('highlight', 1)
        ->where('status', 1)
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get();

        $sales = Sale::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->limit(15)
        ->get();

        $rents = Rent::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->limit(15)
        ->get();

        $lastedArticle = DB::table('article as a')
        ->select('title', 'view', 'cat.slug as c_slug', 'a.slug as a_slug', 'a.image as a_image')
        ->join('categories as cat', 'a.category_id', '=', 'cat.id')
        ->where('a.status', 1)
        ->where('cat_type', 'article')
        ->orderBy('a.created_at', 'desc')
        ->take(5)
        ->get();

        $lastedViewed = DB::table('article as a')
        ->select('title', 'view', 'cat.slug as c_slug', 'a.slug as a_slug')
        ->join('categories as cat', 'a.category_id', '=', 'cat.id')
        ->where('a.status', 1)
        ->where('cat_type', 'article')
        ->orderBy('view', 'desc')
        ->take(5)
        ->get();

        $horizontalCategories = DB::table('categories')
        ->select('id', 'name', 'slug')
        ->where('cat_type', 'article')
        ->where('id', '<>', 0)
        ->where('slug', 'truyen-thong')
        ->orWhere('slug', 'du-lich')
        ->orWhere('slug', 'to-chuc-su-kien')
        ->orderBy('position', 'asc')
        ->get();

        $verticalCategories = DB::table('categories')
        ->select('id', 'name', 'slug')
        ->where('cat_type', 'article')
        ->where('id', '<>', 0)
        ->where('slug', 'xay-dung')
        ->orWhere('slug', 'du-thuyen')
        ->orderBy('position', 'asc')
        ->get();

        $provinces = Province::orderBy('name', 'asc')->get();

        // access analytics
        $this->analyticsAccess();
        // online analytics
        $this->analyticsOnline();

        // seo tools
        $config = new Config();
        $metaTitle = $config->getValueByKey('meta_title');
        $metaDesc = $config->getValueByKey('meta_desc');
        $metaKeyword = $config->getValueByKey('meta_keyword');
        $logo = asset('storage/app/' . $config->getValueByKey('logo')) ;
        $this->seotools($metaTitle, $metaDesc, $metaKeyword, URL::current(), $logo);

        return view('catalog.pages.home',
            compact(
                'slides', 
                'lastedProjectFeatureds',
                'sales',
                'rents',
                'lastedArticle',
                'lastedViewed',
                'provinces',
                'horizontalCategories',
                'verticalCategories'
            )
        );
    }

    // Posts
    public function getAllPost()
    {
        return 'tất cả bài viết';
    }

    public function getPostsByCategory($categorySlug)
    {
        return 'danh mục bài viết';
    }

    public function getPostDetail($categorySlug, $postSlug)
    {
        if (Article::where('slug', $postSlug)->exists()) {
            $article = Article::where('slug', $postSlug)->first();

            // count view
            if(isset($postSlug)) {
                $article->view = $article->view + 1;
                $article->save();
            }

            $title = $article->title;

            $relatedPosts = Article::where('category_id', $article->category_id)
            ->where('id', '<>', $article->id)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

            // SEO
            $title = $article->title;
            $image = (!empty($article->image)) ? asset('storage/app/' . $article->image) : asset('storage/app/uploads/default.png');
            $this->seotools($title, $article->summary, $article->tag, URL::current(), $image);

            $gallery = ArticleGallery::where('post_id', $article->id)->orderBy('sort_order', 'asc')->get();

            return view('catalog.pages.article.detail',
                compact('title', 'article', 'relatedPosts', 'gallery')
            );
        }
    }

    // Projects
    public function getAllProject()
    {
        return 'tất cả dự án';
    }

    public function getProjectsByCategory($categorySlug)
    {
        return 'danh mục dự án';
    }

    public function getProjectDetail($postSlug)
    {
        return 'chi tiết dự án';
    }

    // Real estate sales
    public function getAllReaLEstateSales()
    {
        return 'tất cả bất động sản bán';
    }

    public function getReaLEstateSalesByCategory()
    {
        return 'danh mục bất động sản bán';
    }

    public function getReaLEstatesSaleDetail()
    {
        return 'chi tiết bất động sản bán';
    }

    // Real estate for rent
    public function getAllReaLEstateRents()
    {
        return 'tất cả cho thuê';
    }

    public function getReaLEstateRentsByCategory()
    {
        return 'danh mục cho thuê';
    }

    public function getReaLEstateRentDetail()
    {
        return 'chi tiết cho thuê';
    }

    public function analyticsOnline() 
    {
        $tg = time();
        $tgout = 900; //15 phút
        $tgnew = $tg - $tgout; // sau 15 phút không làm gì sẽ không tính là online
        $ip = $_SERVER['REMOTE_ADDR'];
        $local = $_SERVER['HTTP_HOST'];

        DB::table('useronline')->insert([
            'tgtmp'         => $tg,
            'ip'            => $ip,
            'local'         => $local,
            'created_at'    => date('Y-m-d H:i:s')
        ]);

        DB::table('useronline')->where('tgtmp', '<', $tgnew)->delete();
    }

    public function analyticsAccess() 
    {
        //Kiểm tra xem IP có phải là từ Share Internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        //Kiểm tra xem IP có phải là từ Proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //Kiểm tra xem IP có phải là từ Remote Address
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

        DB::table('truycap')->insert([
            'ip_address' => $ip_address,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
