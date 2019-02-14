<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];
    /**
     * Relationships
     */
    /**
     * The hasMany relationship to Employees
     *
     * @return hasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
