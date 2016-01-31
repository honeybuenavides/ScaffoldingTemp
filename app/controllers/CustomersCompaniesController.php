<?php

class CustomersCompaniesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /customerscompanies
	 *
	 * @return Response
	 */
	protected $custCompany;

	public function __construct(CustomersCompany $custCompany){

		$this->custCompany = $custCompany;
	}


	public function index()
	{
		//$custCompanies = $this->$custCompany->all();
		$custCompanies = DB::table('CustomersCompanies')->get();

		return View::make('custCompanies.index')
			->with('custCompanies', $custCompanies);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /customerscompanies/create
	 *
	 * @return Response
	 */

	/**
	 * Store a newly created resource in storage.
	 * POST /customerscompanies
	 *
	 * @return Response
	 */
	public function create()
	{
		$custCompanies = DB::table('CustomersCompanies');
			->lists('strCustProfComName', 'id');

		return View::make('custCompanies.create')
			->with('CustomersCompanies', $custCompanies);
	}

/*	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Employee::$rules);

		if ($validation->passes())
		{
			$this->employee->create($input);

			return Redirect::route('employees.index');
		}

		return Redirect::route('employees.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}*/

	/**
	 * Display the specified resource.
	 * GET /customerscompanies/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$custCompanies = $this->custCompany->findOrFail($id);

		return View::make('custCompanies.show', compact('custCompany'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /customerscompanies/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//$custCompanies = $this->custCompany->find($id);
		$custCompanies = DB::table('CustomersCompanies')
			->lists('strCustProfComName', 'id');

		if (is_null($custCompanies))
		{
Comreturn Redirect::route('custCompanies.index');
		}

		return View::make('custCompanies.edit')
			->with('custCompany', $custCompany)
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /customerscompanies/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, CustomersIndividual::$rules);

		if ($validation->passes())
		{
			$custCompany = $this->custCompany->find($id);
			$custCompany->update($input);

			return Redirect::route('custCompanies.show', $id);
		}

		return Redirect::route('custCompanies.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

}