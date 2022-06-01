<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $tasks = [];

        foreach ($this->tasks as $task) {
            $tasks[] = [
                'id' => $task->id,
                'name' => $task->name,
                'description' => $task->description,
                'date of creation' => $task->created_at->format('d.m.Y H:i:s')
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'date of creation' => $this->created_at->format('d.m.Y H:i:s'),
            'tasks' => $tasks
        ];
    }
}
