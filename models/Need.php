<?php namespace Waka\Wcms\Models;

use Model;

/**
 * Need Model
 */
class Need extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;
    use \October\Rain\Database\Traits\Sortable;

    use \Waka\Cloudis\Classes\Traits\CloudiTrait;
    public $cloudiSlug = 'slug';
    public $cloudiImages = ['main_image'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'waka_wcms_needs';

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
        'deleted_at',
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [
        'cloudis_files' => [
            'Waka\Cloudis\Models\CloudisFile',
            'name' => 'cloudeable'
        ] 
    ];
    public $attachOne = [
        'main_image' => 'System\Models\File'
    ];
    public $attachMany = [];

    public function afterSave() {
        $this->checkModelCloudisFilesChanges();
        $this->updateCloudiRelations('attach');
    }
    public function afterDelete() {
       //trace_log("afterDelete");
        $this->clouderDeleteAll();
    }
}
