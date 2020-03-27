<?php namespace Waka\Wcms\Models;

use Model;

/**
 * Solution Model
 */
class Solution extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \Waka\Cloudis\Classes\Traits\CloudiTrait;

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
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

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
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [
        'needs' => ['Waka\Wcms\Models\Need', 'table' => 'waka_wcms_needs_solutions'],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'main_image' => 'Waka\Cloudis\Models\CloudiFile',
    ];
    public $attachMany = [];

    public function afterSave()
    {
        $this->updateCloudiRelations('attach');
    }
    public function afterDelete()
    {
        //trace_log("afterDelete");
        $this->clouderDeleteAll();
    }
}
