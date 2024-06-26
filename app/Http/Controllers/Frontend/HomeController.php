<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogSectionSetting;
use App\Models\Category;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbackSectionSetting;
use App\Models\Hero;
use App\Models\PortfolioItem;
use App\Models\PortfolioSectionSetting;
use App\Models\Service;
use App\Models\SkillItem;
use App\Models\SkillSectionSetting;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero=Hero::first();
        $services = Service::all();
        $about = About::first();
        $portfolioTitle = PortfolioSectionSetting::first();
        $portfolioCategories = Category::all();
        $portfolioItems = PortfolioItem::all();
        $skillSection=SkillSectionSetting::first();
        $skill=SkillItem::all();
        $typerTitles=TyperTitle::all();
        $skill = SkillSectionSetting::first();
        $skillItems = SkillItem::all();
        $experience = Experience::first();
         $feedbacks = Feedback::all();
        $feedbackTitle = FeedbackSectionSetting::first();
         $blogs = Blog::latest()->take(5)->get();
         $blogTitle = BlogSectionSetting::first();
        // $contactTitle = ContactSectionSetting::first();
        return view('frontend.home',compact('hero','typerTitles','services','about','portfolioCategories','portfolioItems','portfolioTitle','skillSection','skillItems','skill','experience','feedbacks','feedbackTitle','blogs','blogTitle'));
    }
    public function showPortfolio($id){
        $portfolio = PortfolioItem::findOrFail($id);
        return view('frontend.portfolio-details', compact('portfolio'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function showBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $previousPost = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $nextPost = Blog::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();
        return view('frontend.blog-details', compact('blog', 'previousPost', 'nextPost'));
    }
     public function contact(Request $request)
     {
        

     }

    public function blog()
    {
        $blogs = Blog::latest()->paginate(3);
        return view('frontend.blog', compact('blogs'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
