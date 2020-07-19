<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $books = Book::where('user_id', '=', $user->id)
            ->paginate(5);

        return response()->json(compact('books'),200);
    }

    public function store(BookRequest $request)
    {
        $user = auth()->user();
        $path = '';
        if ($request->has('image')) {
            $file = $request->image;
            $safeName = Str::random(3) . time() . '.' . 'png';
            $path = storage_path(). '/' . $safeName;
            Storage::put($path, base64_decode($file));
        }

        $data = [
            'name' => $request->name,
            'page_count' => $request->page_count,
            'annotation' => $request->annotation,
            'image' => $path,
            'author_id' => $request->author,
            'user_id' => $user->id
        ];

        Book::create($data);

        return response()->json([
            'message' => 'Successfully store',
        ], 201);
    }

    public function update(BookRequest $request, $id)
    {
        $data = $request->all();
        $book = Book::findOrFail($id);
        $book->fill($data)->save();

        return response()->json([
            'message' => 'Successfully update',
        ], 201);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if($book->delete()) {
            return response()->json([
                'message' => 'Successfully delete',
            ], 204);
        }
    }
}
