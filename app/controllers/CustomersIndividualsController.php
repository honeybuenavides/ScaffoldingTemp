<?php

class CustomersIndividualsController extends \BaseController {



	protected $custIndividual;

	public function __construct(CustomersIndividual $custIndividual){

		$this->custIndividual = $custIndividual;
	}


	public function index()
	{
		$custIndividuals = DB::table('CustomersIndividuals')->get();

		return View::make('custIndividuals.index')
			->with('custIndividuals', $custIndividuals);
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
		$custIndividuals = DB::table('CustomersIndividuals');
			->lists('strCustProfIndName', 'id');

		return View::make('custIndividuals.create')
			->with('CustomersIndividuals', $custIndividuals);
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
		$custIndividuals = $this->custIndividual->findOrFail($id);

		return View::make('custIndividuals.show', compact('custIndividual'));
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
		//$custIndividual = $this->custIndividual->find($id);
		$custIndividual = DB::table('CustomersIndividuals')
			->lists('strCustProfIndName', 'id');

		if (is_null($custIndividual))
		{
			return Redirect::route('custIndividuals.index');
		}

		return View::make('custIndividuals.edit')
			->with('custIndividuals', $custIndividuals)
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
			$custIndividual = $this->custIndividual->find($id);
			$custIndividual->update($input);

			return Redirect::route('custIndividuals.show', $id);
		}

		return Redirect::route('custIndividuals.edit', $id)
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