<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorsPatients extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * O atributo que deve mostrar o nome da tabela.
     *
     * @var array
     */
    protected $table = 'medico_paciente';
    /**
     * fillable
     *
     * Os atributos que são atribuíveis em massa
     *
     * @var array
     */
    protected $fillable = [
        'medico_id',
        'paciente_id',
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
}
