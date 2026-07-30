<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['company_name', 'contact_person', 'email', 'phone'])]
class Client extends Model
{
    use HasFactory;
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
