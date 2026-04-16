<?php

namespace App\Http\Controllers;

use App\Models\NonAttendanceDay;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class NonAttendanceDayController extends Controller
{
    public function index()
    {
        $items = NonAttendanceDay::latest()->get();
        return view('admin.non-attendance.index', compact('items'));
    
    }

    public function create(){
        return view('admin.non-attendance.create');
    }

    public function edit($id){
        $item = NonAttendanceDay::findOrFail($id);
        return view('admin.non-attendance.edit', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:holiday,weekend,closure,other',
            'date' => 'nullable|date',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'weekday' => 'nullable|integer|min:0|max:6',
            'is_recurring' => 'nullable|boolean',
        ]);

        $type = $request->type;


        if ($type === 'weekend') {

            $record = NonAttendanceDay::updateOrCreate(
                [
                    'type' => 'weekend',
                    'weekday' => null
                ],
                [
                    'title' => $request->title,
                    'type' => 'weekend',
                    'is_recurring' => true
                ]
            );

        
        }

        if ($type === 'closure') {

            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);

            $period = CarbonPeriod::create($request->start_date, $request->end_date);

            $created = [];

            foreach ($period as $date) {

                $created[] = NonAttendanceDay::create([
                    'title' => $request->title,
                    'type' => 'closure',
                    'date' => $date->format('Y-m-d'),
                    'is_recurring' => false
                ]);
            }

    
        }


        if (in_array($type, ['holiday', 'other'])) {

            $request->validate([
                'date' => 'required|date'
            ]);

            $record = NonAttendanceDay::updateOrCreate(
                [
                    'type' => $type,
                    'date' => $request->date
                ],
                [
                    'title' => $request->title,
                    'weekday' => $request->weekday,
                    'is_recurring' => false
                ]
            );

        
        }


        return redirect()->route('admin.non-attendance-days.index')->with('success', 'Non-attendance day created successfully');

    
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:holiday,weekend,closure,other',
            'date' => 'nullable|date',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'weekday' => 'nullable|integer|min:0|max:6',
            'is_recurring' => 'nullable|boolean',
        ]);

        $record = NonAttendanceDay::findOrFail($id);
        $record->title = $request->title;
        $record->type = $request->type;
        $record->date = $request->date;
        $record->weekday = $request->weekday;
        $record->is_recurring = $request->is_recurring;
        $record->save();

        return redirect()->route('admin.non-attendance-days.index')->with('success', 'Non-attendance day updated successfully');

    }

    public function destroy($id)
    {
        $record = NonAttendanceDay::findOrFail($id);
        $record->delete();

       return redirect()->route('admin.non-attendance-days.index')->with('success', 'Non-attendance day deleted successfully');
    }
}