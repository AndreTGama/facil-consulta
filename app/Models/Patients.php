<?php

namespace App\Models;

use App\Helpers\Mask;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patients extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * O atributo que deve mostrar o nome da tabela.
     *
     * @var array
     */
    protected $table = 'paciente';
    /**
     * fillable
     *
     * Os atributos que são atribuíveis em massa
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'cpf',
        'celular',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    /**
     * Os atributos que devem ser alterados para datas.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
        'deleted_at' => 'date:Y-m-d H:i:s',
    ];
    /**
     * Pega os médicos que estão relacioados com o paciente.
     *
     * @return void
     */
    public function doctors()
    {
        return $this->belongsToMany(Doctors::class, 'medico_paciente', 'paciente_id', 'medico_id');
    }
    /**
     * add format in column cpf
     *
     * @param  string $value
     * @return void
     */
    public function getCpfAttribute($value)
    {
        return Mask::addMask('%s%s%s.%s%s%s.%s%s%s-%s%s', $value);
    }
    /**
     * remove special characters, leaving only numbers
     *
     * @param  string $value
     * @return void
     */
    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = preg_replace('/\D/', '', $value);
    }
    /**
     * add format in column celular
     *
     * @param  string $value
     * @return void
     */
    public function getCelularAttribute($value)
    {
        return Mask::addMask('(%s%s) %s %s%s%s%s-%s%s%s%s', $value);
    }
    /**
     * remove special characters, leaving only numbers
     *
     * @param  string $value
     * @return void
     */
    public function setCelularAttribute($value)
    {
        $this->attributes['celular'] = preg_replace('/\D/', '', $value);
    }
}
