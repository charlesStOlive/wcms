<?php namespace Waka\Wcms\Models;

use Model;

/**
 * solution Model
 */

class Solution extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\NestedTree;
    use \Waka\Cloudis\Classes\Traits\CloudiTrait;
    use \Waka\Utils\Classes\Traits\DataSourceHelpers;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'waka_wcms_solutions';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'name' => 'required',
        'slug' => 'required|unique:waka_cloudis_biblios',
        'state' => 'required',
    ];

    public $customMessages = [
        'name.required' => 'waka.wcms::solution.e.name',
        'slug.required' => 'waka.wcms::solution.e.slug',
    ];

    /**
     * @var array attributes send to datasource for creating document
     */
    public $attributesToDs = [
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [
        'content',
    ];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [
    ];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
    ];
    public $hasOneThrough = [];
    public $hasManyThrough = [
    ];
    public $belongsTo = [
    ];
    public $belongsToMany = [
        'needs' => ['Waka\Wcms\Models\Need', 'table' => 'waka_wcms_needs_solutions'],
    ];
    public $morphTo = [];
    public $morphOne = [
    ];
    public $morphMany = [
    ];
    public $attachOne = [
        'main_image' => 'Waka\Cloudis\Models\CloudiFile',
        'masque' => 'Waka\Cloudis\Models\CloudiFile',
    ];
    public $attachMany = [
    ];

    /**
     *EVENTS
     **/

    /**
     * LISTS
     **/
    public function listStateOptions()
    {
        return [
            'draft' => 'brouillon',
            'noPage' => 'Pas de page',
            'ready' => 'prêt',
        ];
    }

    /**
     * GETTERS
     **/

    /**
     * SCOPES
     */

    /**
     * SETTERS
     */

    /**
     * FILTER FIELDS
     */

    /**
     * OTHERS
     */
    public function getRapidLinksAttribute()
    {
        return [
            [
                "name" => "Page Web",
                "href" => url('solution/' . $this->slug),
                "target" => "_blank",
            ],
        ];
    }

}
