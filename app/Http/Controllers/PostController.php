<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Exports\PostExport;
use Excel;
use PDF;

class PostController extends Controller
{
    public function index() {
    
        return view('index');
    }

    public function exportIntoExcel() 
    {
        return Excel::download(new PostExport, 'post.xlsx');
    }

    public function exportIntoCSV() 
    {
        return Excel::download(new PostExport, 'post.csv');
    }

    public function getIntel()
    {
        $posts = Post::all();
        return view('post',compact('posts'));
    }

    public function downloadPDF()
    {
        $posts= Post::all();
        $pdf = PDF::loadView('post',compact('posts'));
        return $pdf->download('posts.pdf');
    }

}
