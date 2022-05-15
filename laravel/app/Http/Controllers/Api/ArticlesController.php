<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApiArticle;
use Illuminate\Http\Request;
use Validator;

class ArticlesController extends Controller
{
    public function show()
    {
        $articles = ApiArticle::all();

        return response()->json($articles, 201);
    }

    public function showArticle($id)
    {
        $article = ApiArticle::find($id);

        if (!$article) {
            return response() ->json([
                "status" => false,
                "message" => "not found"
            ]) -> setStatusCode(404, 'post not found');
        }
        return response()->json($article);
    }

    public function storeArticle(Request $request)
    {
        $request_data = $request->only(['title', 'content']);

        $validator = Validator::make($request_data, [
            "title" => ['required', 'string'],
            "content" => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validator->messages()
            ])->setStatusCode(422);
        }


        $article = ApiArticle::create([
           "title" => $request->title,
           "content" => $request->content
        ]);

        return response()->json([
            "status" => true,
            "article" => $article
        ])->setStatusCode(201, "Article is created");
    }

    public function putArticle($id, Request $request)
    {
        $request_data = $request->only(['title', 'content']);

        $validator = Validator::make($request_data, [
            "title" => ['required', 'string'],
            "content" => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validator->messages()
            ])->setStatusCode(422);
        }

        $article = ApiArticle::find($id);

        if (!$article) {
            return response()->json([
                "status" => false,
                "message" => "Article not found"
            ])->setStatusCode(422, "Article not found");
        }

        $article->title = $request_data["title"];
        $article->content = $request_data["content"];

        $article->save();

        return response()->json([
            "status" => true,
            "message" => "article is updated"
        ])->setStatusCode(200, "article is updated");
    }

    public function patchArticle($id, Request $request)
    {
        $request_data = $request->only(['title', 'content']);

        if (count($request_data) === 0) {
            return response()->json([
                "status" => false,
                "message" => "all fields is empty"
            ])->setStatusCode(422);
        }

        $rules_const = [
            "title" => ['required', 'string'],
            "content" => ['required', 'string']
        ];

        $rules = [];

        foreach ($request_data as $key => $request_datum) {
            $rules[$key] = $rules_const[$key];
        }
        $validator = Validator::make($request_data, $rules);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validator->messages()
            ])->setStatusCode(422);
        }

        $article = ApiArticle::find($id);

        if (!$article) {
            return response()->json([
                "status" => false,
                "message" => "Article not found"
            ])->setStatusCode(422, "Article not found");
        }

        foreach ($request_data as $key => $request_datum) {
            $article->$key = $request_datum; //article->поле
        }
        $article->save();

        return response()->json([
            "status" => true,
            "message" => "article is updated"
        ])->setStatusCode(200, "article is updated");
    }

    public function deleteArticle($id)
    {
        $article = ApiArticle::find($id);

        if (!$article) {
            return response()->json([
                "status" => false,
                "message" => "Article not found"
            ])->setStatusCode(422, "Article not found");
        }
        $article->delete();

        return response()->json([
            "status" => true,
            "message" => "Article is delete"
        ])->setStatusCode(200, "Article is Delete");
    }
}
