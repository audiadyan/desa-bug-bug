<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Staf;
use App\Models\About;
use App\Models\Event;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'page_title' => 'Beranda',
            'newss' => News::with(['user'])->latest()->limit(3)->get(),
            'stafs' => Staf::inRandomOrder()->get(),
            'events' => Event::whereDate('time', Carbon::today())->orderBy('time')->get(),
        ]);
    }

    public function indexInfo()
    {
        return view('pages.information', [
            'page_title' => 'Informasi',
            'newss' => News::with(['user'])->latest()->paginate(7),
            'events' => Event::whereDate('time', '>=', Carbon::today())->orderBy('time', 'ASC')->limit(10)->get(),
        ]);
    }

    public function showNews(News $news)
    {
        return view('pages.news-detail', [
            'page_title' => 'Berita',
            'news' => $news,
        ]);
    }

    public function about()
    {
        return view('pages.about', [
            'page_title' => 'Tentang Desa',
            'about' => About::first(),
        ]);
    }

    public function statistic()
    {
        return view('pages.statistic', [
            'page_title' => 'Statistik Desa',
            'statistic' => Statistic::first(),
        ]);
    }

    public function indexStaf()
    {
        return view('pages.staf', [
            'page_title' => 'Staf Desa',
            'stafs' => Staf::inRandomOrder()->get(),
        ]);
    }

    public function stafDetail(Staf $staf)
    {
        return view('pages.staf-detail', [
            'page_title' => 'Detail Staf',
            'staf' => $staf,
        ]);
    }
}
