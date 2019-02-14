<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone'
    ];
    protected $appends = [
        'fullname',
    ];
    /**
     * Relationships
     */
    /**
     * The belongsTo relationship to Company
     *
     * @return belongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    /**
     * Attributes
     */
    /**
     * Get full name attribute
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        $last_name = $this->last_name ? " {$this->last_name}" : '';
        return sprintf('%s%s', $this->first_name, $last_name);
    }
}