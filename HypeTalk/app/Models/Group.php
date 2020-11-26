<?php

namespace App\Models;

use \Spatie\Searchable\Searchable;
use \Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model implements Searchable
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];
    public function members()
    {
        return $this->belongsToMany(User::class)->withPivot('role');
    }
    public function getSearchResult(): SearchResult
    {
       $url = route('group.show', $this->id);

       return new SearchResult($this, $this->name, $url);
    }
}
