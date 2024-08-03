<?php

declare(strict_types=1);

namespace Engelsystem\Models;

use Engelsystem\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * @property string      $login
 * @property string      $bezirk
 *
 * @property-read User   $user
 *
 * @method static QueryBuilder|Bezirk[] whereLogin($value)
 * @method static QueryBuilder|Bezirk[] whereBezirk($value)
 */
class Bezirk extends BaseModel
{
    use HasFactory;

    /** @var bool Disable timestamps */
    public $timestamps = false;

    /** @var bool Indicates the model's ID is not auto-incrementing. */
    public $incrementing = false;

    /** @var array<string> The primary key for the model. */
    protected $primaryKey = ['login', 'bezirk'];

    /** @var array<string> */
    protected $fillable = [
        'login',
        'bezirk',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'login', 'name');
    }
}