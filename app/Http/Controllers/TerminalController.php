<?php
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class TerminalController extends Controller
{
    public function setup(Request $request){
        // $process = Process::fromShellCommandline('git fetch https://github.com/joorjin/campaignbistbit.git');
        // $process = Process::fromShellCommandline('git reset --hard origin/master');
        if($request->isMethod('post')){
            $process = Process::fromShellCommandline($request['command']);

            $process->run(function ($type, $buffer) {
                if (Process::ERR === $type) {
                    $response = 'error->';
                } else {
                    $response = 'The command was executed->';
                }

                $_POST['buffer']=$buffer;
                $_POST['response']=$response;
            });
            $command = $request['command'];

            $buffer = $_POST['buffer'];
            $response=$_POST['response'];
            return view('terminal.index',compact('buffer','response','command'));
        }
        return view('terminal.index');
    }
}
