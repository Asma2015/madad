<?php
namespace App\Http\Controllers;
use App\Company;
use App\Http\Requests\StoreCompany;
use App\Http\Requests\UpdateCompany;
use App\Notifications\Noti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = Company::orderBy('created_at', 'DESC')->paginate(10);
        switch ($request->ws) {
            case 'getCompanies' :
                return $companies;
                break;
            default :
                return view('companies.index', compact('companies'));
                break;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        try {
            DB::beginTransaction();
            $company = Company::create($request->all());
            if ($request->has('logo')) {
                $logo = $request->file('logo')->storeAs('logo', $company->id, 'public');
                $company->update(['logo' => $company->id]);
            }
            /**
             * Send email whenever new company is entered (use Mailgun or Mailtrap)
             */
            $request->user()->notify(new Noti([
                'subject' => 'Company successfully has been createad',
                'url' => route('companies.show', $company->id),
                'gretting' => 'Company successfully has been createad!',
            ]));
            DB::commit();
            $response = $company->name . " successfully created!";
        } catch (\Throwable $t) {
            DB::rollback();
            return redirect()->back()->withInput($request->all())->withErrors(['error' => $t->getMessage()]);
        }
        return redirect()->route('companies.index')->withSuccess($response);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompany $request, Company $company)
    {
        if ($request->has('logo')) {
            $logo = $request->file('logo')->storeAs('logo', $company->id, 'public');
        }
        $company->update([
            'name' => $request->fname,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $company->id
        ]);
        $request->user()->notify(new Noti([
            'subject' => 'Adding Company',
            'url' => route('companies.edit', $company->id),
            'gretting' => 'Company successfully has been createad!',
        ]));
        return redirect()->route('companies.index')->withSuccess($company->name . ' updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $message = $company->name_name . " successfully deleted!";
        $company->employees->map->delete();
        $company->delete();
        return redirect()->route('companies.index')->withSuccess($message);
    }
}
