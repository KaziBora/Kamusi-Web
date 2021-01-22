<?php

namespace App\Http\Controllers;

use App\Models\Trivia;
use App\Models\Word;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    
    public function getWords()
    {
        $results = Word::select('')->get();

        if (!$results)
            return response()->json(['response' => Response::HTTP_BAD_REQUEST], Response::HTTP_BAD_REQUEST);
        else
            return response()->json(['response' => Response::HTTP_OK, 'results' => $results], Response::HTTP_OK);
    }

    public function getCategories()
    {
        $results = Category::select('title', 'description', 'icon')->get();

        if (!$results)
            return response()->json(['response' => Response::HTTP_BAD_REQUEST], Response::HTTP_BAD_REQUEST);
        else
            return response()->json(['response' => Response::HTTP_OK, 'results' => $results], Response::HTTP_OK);
    }

    public function getTrivia(Request $rq)
    {
        $time_stamp = "'" . time() . "'";
        $skip = $time_stamp[9] + $time_stamp[10];
        //$gaps = round(($time_stamp[9] + $time_stamp[10]) / 2);
        
        if ($rq->category == 1)
            $results = Word::select('id')->skip($skip)->take($rq->limit)->inRandomOrder()->get();
        else 
            $results = Word::select('id')->skip($skip)->take($rq->limit)->inRandomOrder()->get();

        if (!$results) 
            return response()->json(['response' => Response::HTTP_BAD_REQUEST], Response::HTTP_BAD_REQUEST);
        else 
            return response()->json(['response' => Response::HTTP_OK, 'results' => $results], Response::HTTP_OK);
    }

}
