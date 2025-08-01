<?php

// app/Http/Resources/JobPostingDehydratedResource.php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobPostingDehydratedResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'company_id' => $this->company_id,
            'location'   => $this->location,
            'work_type'  => $this->work_type,
            'salary'     => $this->salary,
        ];
    }
}
