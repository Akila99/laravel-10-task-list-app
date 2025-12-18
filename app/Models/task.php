<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    //
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'title',
        'description',
        'long_description',
    ];

    public function toggleComplete()
    {
        $this->is_completed = !$this->is_completed;
        $this->save();
    }
}
