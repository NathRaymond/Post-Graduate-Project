<?php

namespace App\Imports;

use App\Models\AcademicSession;
use App\Models\Programmes;
use App\Models\Application;
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



class UploadApplication implements ToModel, WithHeadingRow,WithValidation, WithBatchInserts
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
    //   dd($row);
        $i=0;

        $session = AcademicSession::where('description',$row["session"])->first();
        $applicant = Applicant::where('applicantid',trim($row["applicantid"]))->first();
        $programme = Programmes::where('description',trim($row["degreeid"]))->first();

        // $applicant
        if($applicant){
            $applicant_id = $applicant->id;
        }else{
            $applicant = Applicant::where('id',1)->first();

            $applicant_id = $applicant->id;
        }

        if($programme){
            $program_id = $programme->id;
        }else{
            $program_id = $row["degreeid"]==null??0;

        }
        if($session){
            $session_id = $session->id;
        }else{
            $session_id = $row["session"];

        }

        return new Application([
            'applicationRefNo'=>$row["applicationrefno"],
            'applicant_id'=>$applicant_id,
            'applicant_email'=>$applicant->email,
            'session_id'=>$session_id,
            'program_id'=>$program_id,
            'mode'=>$row["modeid"],
            'semester'=>$row["semester"],
            'accept_declaration'=>$row["acceptdeclaration"],
            'isRecommended'=>$row["isrecommended"],
            'status'=>$row["status"],
            'type'=>$row["islocal"],
            'courserecommendedfor'=>$row["courserecommendedfor"],

            'withscholarship'=>$row["withscholarship"],
            'fieldofinterest'=>$row["fieldofinterest"],

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



    // public function chunkSize(): int
    // {
    //     return 200;
    // }
    public function batchSize(): int
    {
        return 200;
    }
}
