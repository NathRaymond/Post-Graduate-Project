<?php

namespace App\Imports;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Shared\Date;
// use function App\Helpers\generate_uuid;

use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
// use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Contracts\Queue\ShouldQueue;



class UploadApplicant implements ToModel, WithHeadingRow, WithChunkReading,WithValidation, WithBatchInserts
{


  // use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  public function __construct()
  {
      set_time_limit(80000000);
      ini_set('max_execution_time', '10000'); //300 seconds = 5 minutes
      ini_set('memory_limit', '1024M'); // or you could use 1G
      ini_set('upload_max_filesize', '500M'); // or you could use 1G


  }
    /**
     * @param array $row
     * @return Applicant|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|null
     * @throws \Exception
     */
    public function model(array $row)
    {
      dd($row);
        $i=0;


        return new Applicant([
            'applicantRefNo'=>$row["applicationrefno"],
            'session'=>$row["session"],
            'surname'=>$row["surname"],
            'first_name'=>$row["firstname"],
            'middlename'=>$row["middlename"],
            'sex'=>$row["sex"],
            'marital_status'=>$row["maritalstatus"],
            'dob'=>$row["dateofbirth"],
            'religion'=>$row["religion"],
            'phone'=>$row["phone"],
            'surname'=>$row["nationname"],
            'state'=>$row["statename"],
            'email'=>$row["email"],
            'programme'=>$row["degreename"],
            'mode'=>$row["modename"],
            'surname'=>$row["mailingaddressid"],
            'surname'=>$row["homeaddressid"],
            'surname'=>$row["fieldinterest"],
            'surname'=>$row["registeredfordegreeinanyuni"],
            'status'=>$row["status"],
            'type'=>$row["islocal"],
            'surname'=>$row["acceptdeclaration"],
            'surname'=>$row["isrecommended"],
            'surname'=>$row["matricno"],
                    ]);
    }


    public function rules(): array
    {
      return [
        //   'postdate'   => 'required|max:50',
        //   'valdate'    => 'required|max:50',
        //   'details'    => 'required',
        // $row{//   'debits'     => "required|regex:/^\d*(\.\d{1,2})?$/",,
        // $row{//   'credits'    => "required|regex:/^\d*(\.\d{1,2})?$/",,


      ];

    }



    public function chunkSize(): int
    {
        return 1000;
    }
    public function batchSize(): int
    {
        return 1000;
    }
}
