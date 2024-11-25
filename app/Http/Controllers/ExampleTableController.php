<?php

namespace App\Http\Controllers;


use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Cache;

use Kovyakin\Components\app\Interfaces\ComponentsController;


class ExampleTableController implements ComponentsController
{
    protected string|null $message;

    public function __construct()
    {
        $this->message = Cache::get('message');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): ResourceCollection
    {
      // your code
        $sortBy = $request->query('sortBy');

        $sortType = $request->query('sortType');

        $limit = $request->query('limit');

        $model = User::query()
            ->orderBy($sortBy, $sortType)
            ->paginate($limit);

        if (Cache::has('message')) {
            Cache::forget('message');
        }


        return UserResource::collection($model)->additional(['message' => $this->message]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():array
    {
      // your code
        return ['result' => view('exampleTable.create')->render()];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // your code
    Cache::set(
        'message',
        json_encode(
            [
                'severity' => 'info',
                'summary' => 'Добавление записи',
                'detail' => 'Запись была  добавлена'
            ],
            JSON_UNESCAPED_UNICODE
        )
    );

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):array
    {
      // your code
        return ['result' => view('exampleTable.show')->with(['user' => User::find($id)])->render()];

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):array
    {
      // your code
        return ['result' => view('exampleTable.edit')->with(['user' => User::find($id)])->render()];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
  // your code
        Cache::set(
            'message',
            json_encode(
                [
                    'severity' => 'success',
                    'summary' => 'Редактирование записи',
                    'detail' => 'Запись была  изменена'
                ],
                JSON_UNESCAPED_UNICODE
            )
        );

        return redirect('/example');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): array
    {
      // your code
       User::find($id)->delete();

        Cache::set(
            'message',
            json_encode(
                [
                    'severity' => 'info',
                    'summary' => 'Удаление записи',
                    'detail' => 'Запись была  удалена'
                ],
                JSON_UNESCAPED_UNICODE
            )
        );
        return ['success' => true];
    }

    public function search(Request $request):ResourceCollection
    {
        // your code
        if (Cache::has('message')) {
            Cache::forget('message');
        }

        return UserResource::collection(User::query()
            ->where($request->field, 'like', '%' . $request->value . '%')
            ->orderBy($request->sortBy,$request->sortType)
            ->paginate($request->limit))->additional(['message' => $this->message]);
    }

    public function updateCheckbox(Request $request, string $id): array
    {
      // your code
        Cache::set(
            'message',
            json_encode(
                [
                    'severity' => 'success',
                    'summary' => 'Изменение записи',
                    'detail' => 'Запись изменена'
                ],
                JSON_UNESCAPED_UNICODE
            )
        );
        return ['success' => true];
    }

    public function destroySelected(Request $request): array
    {
        // your code
        Cache::set(
            'message',
            json_encode(
                [
                    'severity' => 'info',
                    'summary' => 'Удаление записей',
                    'detail' => 'Записи были  удалены'
                ],
                JSON_UNESCAPED_UNICODE
            )
        );
        return ['success' => true];
    }

}
