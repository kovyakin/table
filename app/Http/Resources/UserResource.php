<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'image' => 'https://img.freepik.com/free-photo/adorable-looking-kitten-with-sunglasses_23-2150886412.jpg?ga=GA1.1.600801028.1727432239&semt=ais_hybrid',
            'email_verified_at' => $this->email_verified_at->format('d-m-Y'),
            'rating' => random_int(0, 5),
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
            'expanded' => $this->expanded,
            'checkbox1' => (bool)random_int(0, 1),
            'checkbox2' => (bool)random_int(0, 1),
            'checkbox3' => (bool)random_int(0, 1),
        ];
    }
}
