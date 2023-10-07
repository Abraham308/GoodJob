<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Summary;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VacController extends Controller
{
    public function addvac (Request $request) {
        $vacancyData = $request->except('_token');
        $validator = Validator::make($vacancyData, [
            'vac-name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'vac-sal' => 'required|min:1'
        ]);

        if ($validator->fails()) {
            return redirect(route('add-vac'))
                ->withErrors($validator)
                ->withInput();
        }

        $vacancy = new Vacancy();
        $vacancy->title = request('vac-name');
        $vacancy->category_id = request('category_id');
        $vacancy->author_id = Auth::guard('employers')->user()->id;
        $vacancy->description = request('description');
        $vacancy->price = request('vac-sal');
        $vacancy->save();

        return redirect(route('rabprofile-page', ['id' => $vacancy->id]));
    }

    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->delete();

        return redirect()->back()->with('success', 'Резюме удалено');
    }

    public function update(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->title = $request->input('vac-name');
        $vacancy->category_id = $request->input('category_id');
        $vacancy->author_id = Auth::guard('employers')->user()->id;
        $vacancy->description = $request->input('description');
        $vacancy->price = $request->input('vac-sal');
        $vacancy->save();

        return redirect(route('rabprofile-page'))->with('success', 'Вакансия изменена');
    }


    public function searchByCategory($id) {
        $category = Category::findOrFail($id);
        $vacancies = $category->vacancies;


        return view('searchvacancies', ['vacancies' => $vacancies, 'category' => $category->title]);
    }

    public function search(Request $request) {
        $search = trim($request->search);
        $vacancies = Vacancy::where('title', 'LIKE', '%'.$search.'%')
            ->get();

        return view('searchvacancies', ['search' => $search, 'vacancies' => $vacancies]);
    }
}
