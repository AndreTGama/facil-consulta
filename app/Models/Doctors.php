<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctors extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * O atributo que deve mostrar o nome da tabela.
     *
     * @var array
     */
    protected $table = 'medico';
    /**
     * fillable
     *
     * Os atributos que são atribuíveis em massa
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'especialidade',
        'cidade_id',
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
     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
        'deleted_at' => 'date:Y-m-d H:i:s',
    ];
    /**
     * Pega a cidade que o médico pertence.
     */
    public function cities(): BelongsTo
    {
        return $this->belongsTo(Cities::class);
    }
    /**
     * Pega os pacientes que estão relacionados com o médico.
     */
    public function patients()
    {
        return $this->belongsToMany(Patients::class, 'medico_paciente', 'medico_id', 'paciente_id');
    }
}
