<?php

namespace SpAnjaan\Sm\Models;

use Winter\Storm\Database\Model;
use SpAnjaan\Sm\Models\Project;

/**
 * Contact Model
 */
class Contact extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'spanjaan_sm_contacts';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['email', 'latitude', 'longitude'];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'email' => 'required|email',
    ];

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
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsTo = [];
    public $belongsToMany = [
        'projects' => [
            'SpAnjaan\Sm\Models\Project',
            'table'    => 'spanjaan_sm_contacts_projects',
            'order'    => 'name ASC',
            'key'      => 'contact_id',
            'otherKey' => 'project_id'
        ]
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    /**
     * @return array of Project Name
     */
    public function getNameOptions() {
        return Project::pulk('name', 'id');
    }
}
