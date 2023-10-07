<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Summary;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SumController extends Controller
{
    public function addsum (Request $request) {
        $summaryData = $request->except('_token');
        $validator = Validator::make($summaryData, [
           'sum-name' => 'required',
           'category_id' => 'required',
            'description' => 'required',
            'sum-sal' => 'required|min:1'
        ]);

        if ($validator->fails()) {
            return redirect(route('add-sum'))
                ->withErrors($validator)
                ->withInput();
        }

        $summary = new Summary();
        $summary->title = request('sum-name');
        $summary->category_id = request('category_id');
        $summary->author_id = Auth::user()->id;
        $summary->description = request('description');
        $summary->price = request('sum-sal');
        $summary->save();

        return redirect(route('profile-page', ['id' => $summary->id]));
    }

    public function destroy($id)
    {
        $summary = Summary::findOrFail($id);
        $summary->delete();

        return redirect()->back()->with('success', 'Резюме удалено');
    }

    public function update(Request $request, $id)
    {
        $summaryData = $request->except('_token');
        $validator = Validator::make($summaryData, [
            'sum-name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'sum-sal' => 'required|min:1'
        ]);

        if ($validator->fails()) {
            return redirect(route('summary.update'))
                ->withErrors($validator)
                ->withInput();
        }


        $summary = Summary::findOrFail($id);
        $summary->title = $request->input('sum-name');
        $summary->category_id = $request->input('category_id');
        $summary->author_id = Auth::user()->id;
        $summary->description = $request->input('description');
        $summary->price = $request->input('sum-sal');
        $summary->save();

        return redirect(route('profile-page'))->with('success', 'Резюме изменено');
    }

    public function searchByCategory($id) {
        $category = Category::findOrFail($id);
        $summaries = $category->summaries;


        return view('searchsummaries', ['summaries' => $summaries, 'category' => $category->title]);
    }

    public function search(Request $request) {
        $search = trim($request->search);
        $summaries = Summary::where('title', 'LIKE', '%'.$search.'%')
            ->get();

        return view('searchsummaries', ['search' => $search, 'summaries' => $summaries]);
    }
}
