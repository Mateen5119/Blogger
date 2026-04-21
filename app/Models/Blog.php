<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Blog extends Model
{


    //
    protected $fillable = [
        'message',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    public function chirps(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

}



// ----------------------------------------

// Create a new user
$user = \App\Models\User::create([
    'name' => 'Eloquent Expert',
    'email' => 'eloquent@expert.com',
    'password' => bcrypt('password')
]);

// Create a blog for this user
$blog = $user->blogs()->create([
    'message' => 'Eloquent makes database work a breeze!'
]);

// Access the relationship
echo $blog->user->name; // "Eloquent Expert"

// Get all blogs
\App\Models\Blog::all();

// Get recent blogs
\App\Models\Blog::latest()->get();
