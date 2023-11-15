<?php namespace app\arrival\classes;

use October\Rain\Database\Model;

class Student extends Model
{
    // Názov tabuľky v databáze
    protected $table = 'acme_schoolattendance_students';

    // Definuj polia v tabuľke
    protected $fillable = ['name', 'student_id', 'other_fields'];

    public $rules = [
        'name' => 'required|string'
    ];

    // Ak sú potrebné nejaké relácie, môžeš ich definovať tu
    // Napríklad, ak študent môže mať viacero záznamov o dochádzke
    public $hasMany = [
        'attendances' => 'Acme\SchoolAttendance\Classes\Attendance'
    ];
}
    