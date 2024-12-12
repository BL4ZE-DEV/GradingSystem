<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function Add(Request $request)
    {

        $request->validate([
            'subjects' => 'required|array|min:1',
            'subjects.*.name' => 'required|string|max:255',
            'subjects.*.firstTest' => 'required|numeric|min:0|max:100',
            'subjects.*.secondTest' => 'required|numeric|min:0|max:100',
            'subjects.*.exam' => 'required|numeric|min:0|max:100',
            'subjects.*.note' => 'required|numeric|min:0|max:100',
        ]);

        $subjects= $request->subjects;
        $results= [];

        foreach($subjects as $subject){
            $TestEval = ($subject['firstTest'] + $subject['secondTest']) / 2 ;
            $ExamEval = $subject['note'] + $subject['exam'];
            $total = $TestEval + $ExamEval;

            $results[] = [
                'subject' => $subject['name'],
                'total' => $total,
                'remark' => $this->getRemark($total)
            ];
        }
        return response()->json([
            'result' => $results
        ]);

       
    } 

    private function getRemark($total)
    {
        if ($total >= 75) {
            return 'A';
        } elseif ($total >= 65) {
            return 'B';
        } elseif ($total >= 55) {
            return 'C';
        } elseif ($total >= 45) {
            return 'D';
        } else {
            return 'F';
        }
    }
}
