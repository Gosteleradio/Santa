<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreSantaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rulesBox()
    {

            $tableNameCategory = (new User())->getTable();

        $this->validate( [
            'title' => 'required|min:3|max:50',
            'description' => 'required|min:4',
            'isPrivate' => 'sometimes|in:1',
            'creator_id' => "required|exists:{$tableNameCategory},id"

        ], [], [
            'title' => 'Название коробки Санты',
            'description'=>'Список желаний',
            'creator_id' => 'Создатель коробки'
        ]);

    }


}
