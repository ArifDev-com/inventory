<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Expense;
use App\Models\ExtraExpense;

use App\Models\ExpenseCategory;
use App\Models\ExtraExpenseCategory;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index(){
      $authId = Auth::user()->id;
        $expenseCategory = ExpenseCategory::latest()->get();
        $expenses= Expense::latest()->where('user_id',$authId)->get();
        return view('admin.expense.index',compact('expenseCategory','expenses'));
     }
    
     public function create(){
      $authId = Auth::user()->id;
        $expenseCategories = ExpenseCategory::latest()->where('user_id',$authId)->get();
        $expenses= Expense::latest()->get();
        return view('admin.expense.create',compact('expenseCategories','expenses'));
     }
    
     public function store(Request $request){
    
         $request->validate([
            //  'expenseCategory_id' => 'required|max:255',
            //  'date' => 'required|max:255',
            //  'amount' => 'required|max:255',
            //  'expense_code' => 'required|max:255',
            //  'expense_for' => 'required|max:255',
            //  'description' => 'required',
            //  'status' => 'required|max:255',
         ]);
       
         Expense::insert([
          'user_id' => Auth::id(),
             'expenseCategory_id' => $request->expenseCategory_id,
             'date' => $request->date,
             'amount' => $request->amount,
            //  'expense_code' => $request->expense_code,
             'expense_for' => $request->expense_for,
             'description' => $request->description,
            //  'status' => $request->status,
             'created_at' => Carbon::now(),
         ]);
       
       return Redirect()->route('expense.index')->with('success','Expense Added');
       
       }
    
       public function edit($exp_id){
        $authId = Auth::user()->id;
        $expenseCategories = ExpenseCategory::latest()->where('user_id',$authId)->get();
        $expense = Expense::findOrFail($exp_id);
        return view('admin.expense.edit',compact('expenseCategories','expense'));
    }
    
    public function update(Request $request, $exp_id){
    
      $exp_id = $request->id;
    
      Expense::findOrFail($exp_id)->Update([
        'expenseCategory_id' => $request->expenseCategory_id,
        'date' => $request->date,
        'amount' => $request->amount,
        // 'expense_code' => $request->expense_code,
         'expense_for' => $request->expense_for,
        'description' => $request->description,
        // 'status' => $request->status,
        'update_at' => Carbon::now(),
      ]);
    
      return Redirect()->route('expense.index')->with('success','Expense successfully Updated');
    }
    
    
    // public function destroy($exp_id){
    // Expense::findOrFail($exp_id)->delete();
    // return Redirect()->back()->with('delete','successfully Deleted');
    // }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return Redirect()->back()->with('delete', 'successfully Deleted');
    }

    // Extra Index Controller

    public function extraExpenseList(){
        $expenses= ExtraExpense::latest()->paginate(1);
        return view('admin.extra_expense.index',compact('expenses'));
    }

    public function createExtra(){
        $extra_expenseCategories = ExtraExpenseCategory::latest()->get();
        // $expenses= Expense::latest()->get();
        // return view('admin.expense.create',compact('expenseCategories','expenses'));
        return view('admin.extra_expense.create',compact('extra_expenseCategories'));
     }

     public function storeExtra(Request $request){
    
        $request->validate([
            'expenseCategory_id' => 'required|max:255',
            'date' => 'required|max:255',
            'amount' => 'required|max:255',
            'expense_code' => 'required|max:255',
            'expense_for' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|max:255',
        ]);
      
        ExtraExpense::insert([
            'expenseCategory_id' => $request->expenseCategory_id,
            'date' => $request->date,
            'amount' => $request->amount,
            'expense_code' => $request->expense_code,
            'expense_for' => $request->expense_for,
            'description' => $request->description,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
      
      return Redirect()->route('extra.expense.index')->with('success','Extra Expense Added');
      
      }

      public function editExtra($id){
        $expenseCategories = ExtraExpenseCategory::latest()->get();
        $expense = ExtraExpense::findOrFail($id);
        // return view('admin.expense.edit',compact('expenseCategories','expense'));
        return view('admin.extra_expense.edit',compact('expenseCategories','expense'));
    }

    public function updateExtra(Request $request, $id){
    
        $exp_id = $request->id;
      
        ExtraExpense::findOrFail($id)->Update([
          'expenseCategory_id' => $request->expenseCategory_id,
          'date' => $request->date,
          'amount' => $request->amount,
          'expense_code' => $request->expense_code,
          'expense_for' => $request->expense_for,
          'description' => $request->description,
          'status' => $request->status,
          'update_at' => Carbon::now(),
        ]);
      
        return Redirect()->route('extra.expense.index')->with('success','Extra Expense successfully Updated');
      }
  
}
