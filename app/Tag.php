<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\TagsSample;

class Tag extends Model
{
    use SoftDeletes;

    /** @var array  */
    protected $dates = ['deleted_at'];

    /** @var array  */
    protected $fillable = ['space_id', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spendings()
    {
        return $this->hasMany(Spending::class);
    }

    public static function createDefault($spaceId)
    {
        $tagsSamples = TagsSample::select('name','type')->get();
        foreach ($tagsSamples as $tagSample){
            Tag::create(
                array(
                    'space_id'  => $spaceId,
                    'name'      => $tagSample->name,
                    'type'      => $tagSample->type
                )
            );
        }
    }
}
