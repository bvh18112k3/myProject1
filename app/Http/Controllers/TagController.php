<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    public function index()
    {
        $data = Tag::query()->paginate();
        return view(OBJECT . DOT . __FUNCTION__, compact('data'));
    }

    public function create()
    {
        return view(OBJECT . DOT . __FUNCTION__);
    }

    public function store(Request $request)
    {
        $tableName = (new Tag())->getTable();
        $this->validate($request,
            [
                'name' => ['required', 'min:3', 'max:20', Rule::unique($tableName)],
                'image' => ['nullable', 'image', 'max:200']
            ]
        );
        try {
            $model = new Tag();
            $model->fill($request->all());
            if ($request->hasFile('image')) {
                $model->image = upload_file(OBJECT, $request->file('image'));
            }
            $model->save();
            return redirect()->route('tags.index')
                ->with('status', Response::HTTP_OK)
            ->with('msg', 'Thêm thành công');
        } catch (\Exception $exception) {
            Log::error('Exception', [$exception]);
            return back()
                ->with('status', Response::HTTP_BAD_REQUEST)
                ->with('msg', 'Thao tác thất bại');
        }
    }

    public function edit($id)
    {
        $data = Tag::query()->findOrFail($id);
        return view(OBJECT.DOT.__FUNCTION__, compact('data'));
    }
    public function update(Request $request, $id){
        $tableName = (new Tag())->getTable();
        $this->validate($request,
            [
                'name' => ['required', 'min:3', 'max:20', Rule::unique($tableName)],
                'image' => ['nullable', 'image', 'max:200']
            ]
        );
        try {
            $model = Tag::query()->findOrFail($id);
            $model->fill($request->all());
            if ($request->hasFile('image')) {
                $model->image = upload_file(OBJECT, $request->file('image'));
            }
            $model->save();
            return redirect()->route('tags.index')
                ->with('status', Response::HTTP_OK)
                ->with('msg', 'Thêm thành công');
        } catch (\Exception $exception) {
            Log::error('Exception', [$exception]);
            return back()
                ->with('status', Response::HTTP_BAD_REQUEST)
                ->with('msg', 'Thao tác thất bại');
        }
    }
    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            return back()
                ->with('status', Response::HTTP_OK)
                ->with('msg', 'Thao tác thành công');
        } catch (\Exception $exception) {
            Log::error('Exception', [$exception]);
            return back()
                ->with('status', Response::HTTP_BAD_REQUEST)
                ->with('msg', 'Thao tác thất bại');
        }
    }
}
