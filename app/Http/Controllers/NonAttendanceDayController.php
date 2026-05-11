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

        log_user_activity(
            0,
            'non_attendance_days',
            'index',
            'User accessed the non-attendance days index page',
            'admin/non-attendance-days'
        );

        return view('admin.non-attendance.index', compact('items'));
    }

    public function create(){
        log_user_activity(
            0,
            'non_attendance_days',
            'create',
            'User accessed the non-attendance days create page',
            'admin/non-attendance-days/create'
        );

        return view('admin.non-attendance.create');
    }

    public function edit($id){
        $item = NonAttendanceDay::findOrFail($id);

        log_user_activity(
            $item->id,
            'non_attendance_days',
            'edit',
            'User accessed edit page for non-attendance day: ' . $item->title,
            'admin/non-attendance-days/' . $item->id . '/edit',
            json_encode($item)
        );

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


        log_user_activity(
            0,
            'non_attendance_days',
            'store',
            'User created a new non-attendance day of type ' . $request->type . ': ' . $request->title,
            url()->current()
        );

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

        $item = NonAttendanceDay::findOrFail($id);
        $current_object = json_encode($item);

        $item->title = $request->title;
        $item->type = $request->type;
        $item->date = $request->date;
        $item->weekday = $request->weekday;
        $item->is_recurring = $request->is_recurring;
        $item->save();

        log_user_activity(
            $item->id,
            'non_attendance_days',
            'update',
            'User updated non-attendance day with id ' . $item->id,
            url()->current(),
            json_encode($item),
            $current_object
        );

        return redirect()->route('admin.non-attendance-days.index')->with('success', 'Non-attendance day updated successfully');

    }

    public function destroy($id)
    {
        $item = NonAttendanceDay::findOrFail($id);
        $oldItem = json_encode($item);
        $itemId = $item->id;
        $item->delete();

        log_user_activity(
            $itemId,
            'non_attendance_days',
            'destroy',
            'User deleted non-attendance day with id ' . $itemId,
            url()->current(),
            null,
            $oldItem
        );

        return redirect()->route('admin.non-attendance-days.index')->with('success', 'Non-attendance day deleted successfully');
    }
}