<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;
use Auth;
class BookController extends Controller
{
    public function index()
    {
//        $books = Book::all();
        $books = Auth::user()->book()->get();
        return \response()->json([
            'data' => $books,
            'status' => Response::HTTP_OK
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'contact_name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        if(Auth::user()->book()->create($request->all())){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'fail'
            ]);
        }

    }

    public function show($id)
    {
        $book = Book::find($id);
        return \response()->json([
            'data' => $book,
            'status' => Response::HTTP_OK
        ]);
    }

    public function update($id)
    {
        $inputs = [];
        $inputs['contact_name'] = \request('contact_name');
        $inputs['phone'] = \request('phone');
        $inputs['address'] = \request('address');
        $book = Book::whereId($id)->update($inputs);
        return \response()->json([
            'data' => $book,
            'status' => Response::HTTP_OK
        ]);
    }

    public function delete($id)
    {
        $book = Book::find($id)->delete();
        return \response()->json([
            'data' => $book,
            'status' => Response::HTTP_OK
        ]);
    }
}
