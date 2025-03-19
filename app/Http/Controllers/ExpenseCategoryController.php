<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Models\ExtraExpenseCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $authId = Auth::user()->id;
        $expenseCategories = ExpenseCategory::orderBy('id', 'DESC')->where('user_id', $authId)->get();

        return view('admin.expCategory.index', compact('expenseCategories'));
    }

    public function create()
    {
        $expenseCategories = ExpenseCategory::latest()->get();

        return view('admin.expCategory.create', compact('expenseCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        ExpenseCategory::insert([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('expense.category.index')->with('success', 'Expense Category Added');
    }

    public function edit($expCat_id)
    {
        $expenseCategory = ExpenseCategory::findOrFail($expCat_id);

        return view('admin.expCategory.edit', compact('expenseCategory'));
    }

    public function update(Request $request, $expCat_id)
    {
        $expCat_id = $request->id;

        ExpenseCategory::findOrFail($expCat_id)->Update([
            'name' => $request->name,
            'update_at' => Carbon::now(),
        ]);

        return redirect()->route('expense.category.index')->with('success', 'Expense Category successfully Updated');
    }

    // public function destroy($expCat_id)
    // {
    //     ExpenseCategory::findOrFail($expCat_id)->delete();
    //     return redirect()->back()->with('delete', 'successfully Deleted');
    // }

    public function destroy(ExpenseCategory $expCategory)
    {
        $expCategory->delete();

        return redirect()->back()->with('delete', 'successfully Deleted');
    }

    // Extra Expense Category
    public function extraCategoryList()
    {
        $extraexpenseCategories = ExtraExpenseCategory::orderBy('id', 'DESC')->get();

        return view('admin.extra_expCategory.index', compact('extraexpenseCategories'));
    }

    public function createExtra()
    {
        // $expenseCategories = ExpenseCategory::latest()->get();
        return view('admin.extra_expCategory.create');
    }

    public function storeExtra(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        ExtraExpenseCategory::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('extra.expense.category.index')->with('success', 'Expense Category Added');
    }

    public function editExtra($id)
    {
        $edit_extraexpenseCategory = ExtraExpenseCategory::findOrFail($id);

        return view('admin.extra_expCategory.edit', compact('edit_extraexpenseCategory'));
    }

    public function updateExtra(Request $request, $id)
    {
        $id = $request->id;

        ExtraExpenseCategory::findOrFail($id)->Update([
            'name' => $request->name,
            'update_at' => Carbon::now(),
        ]);

        return redirect()->route('extra.expense.category.index')->with('success', 'Extra Expense Category successfully Updated');
    }
}
