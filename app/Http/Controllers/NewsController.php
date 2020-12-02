<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Categories_news;

class NewsController extends Controller
{
    public function listNews()
    {
        $news = News::join('categories_news', 'categories_news.id', '=', 'news.id_categoriesnews')->select(
            'news.id','categories_news.name as categories_news_name',
            'news.title','news.image','news.content')->get();
        $Categories_news_name = Categories_news::all();
        return view('admin.news', [
            'news' => $news, 
            'categories_news_name' => $Categories_news_name
        ]);
    }
    public function addNews(Request $request)
    {
        if ($request->ajax()) {

            $output = '';
            $news = new News();
            if ($request->hasFile('image')) {
                $image = $request->image;
                $image->move(base_path('public/upload/img'), $image->getClientOriginalname());
                $img = $image->getClientOriginalname();
            }
            $news->image = $img;
            $news->id_categoriesnews = $request->categories_news_name;
            $news->title = $request->title;
            $news->content = $request->content;
            $news->save();
            $news = News::join('categories_news', 'categories_news.id', '=', 'news.id_categoriesnews')->select('news.id', 'news.title', 'categories_news.name as categories_news_name','news.image','news.content')->get();
            if ($news) {
                foreach ($news as $Objrow) {
                    $output .= '<tr>
                    <th>' . $Objrow->id . '</th>
                <td>' . $Objrow->categories_news_name . '</td>
                <td>' . $Objrow->title . '</td>
                <td><img src="' . url("") . '/upload/img/' . $Objrow->image . '" alt="" width="30px"></td>
                <td>' . $Objrow->content . '</td>
                <td>
                    <a class="btn btn-primary btn-lg" onclick="event.preventDefault();editNews(' . $Objrow->id . ');" href="">Sửa</a>
                    <a  class=" btn btn-danger btn-lg js-deleteNews" href="">Xóa</a>
                </td>
                     </tr>';
                }
            }
            return Response($output);
        }
    }
    public function editNews($id)
    {
        $editNews = News::find($id);
        return response()->json([
            'editNews'  => $editNews,
        ], 200);
    }
    public function postEditNews(Request $request, $id)
    {
        if ($request->ajax()) {

            $output = '';
            $news = News::find($id);
            if ($request->hasFile('image')) {
                $image = $request->image;
                $image->move(base_path('public/upload/img'), $image->getClientOriginalname());
                $img = $image->getClientOriginalname();
            } else {
                $img = $request->img_hi;
            }
            $news->image = $img;
            $news->id_categoriesnews = $request->categories_news_name;
            $news->title = $request->title;
            $news->content = $request->content;
            $news->save();
            $news2 = News::join('categories_news', 'categories_news.id', '=', 'news.id_categoriesnews')->select(
                'news.id','categories_news.name as categories_news_name',
                'news.title','news.image','news.content')->get();
                
            if ($news2) {
                foreach ($news2 as $value) {
                    $output .= '<tr>
                <th>' . $value->id . '</th>
                <td>' . $value->categories_news_name . '</td>
                <td>' . $value->title . '</td>
                <td><img src="' . url("") . '/upload/img/' . $value->image . '" alt="" width="30px"></td>
                <td>' . $value->content . '</td>
                <td>
                    <a class="btn btn-primary btn-lg" onclick="event.preventDefault();editNews(' . $value->id . ');" href="">Sửa</a>
                    <a class=" btn btn-danger btn-lg js-deleteNews" href="">Xóa</a>
                </td>
                 </tr>';
                }
            }
            return Response($output);
        }
    }
    public function deleteNews(Request $request, $id)
    {
        if ($request->ajax()) {

            $deleteNews = News::find($id);
            if ($deleteNews) {
                $deleteNews->delete();
            }
            return response(['code' => 200]);
        }
    }
}

