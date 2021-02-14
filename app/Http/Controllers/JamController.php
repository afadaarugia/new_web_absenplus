<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJamRequest;
use App\Http\Requests\UpdateJamRequest;
use App\Repositories\JamRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class JamController extends AppBaseController
{
    /** @var  JamRepository */
    private $jamRepository;

    public function __construct(JamRepository $jamRepo)
    {
        $this->jamRepository = $jamRepo;
    }

    /**
     * Display a listing of the Jam.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $jams = $this->jamRepository->all();

        return view('jams.index')
            ->with('jams', $jams);
    }

    /**
     * Show the form for creating a new Jam.
     *
     * @return Response
     */
    public function create()
    {
        return view('jams.create');
    }

    /**
     * Store a newly created Jam in storage.
     *
     * @param CreateJamRequest $request
     *
     * @return Response
     */
    public function store(CreateJamRequest $request)
    {
        $input = $request->all();

        $jam = $this->jamRepository->create($input);

        Flash::success('Jam saved successfully.');

        return redirect(route('jams.index'));
    }

    /**
     * Display the specified Jam.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jam = $this->jamRepository->find($id);

        if (empty($jam)) {
            Flash::error('Jam not found');

            return redirect(route('jams.index'));
        }

        return view('jams.show')->with('jam', $jam);
    }

    /**
     * Show the form for editing the specified Jam.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jam = $this->jamRepository->find($id);

        if (empty($jam)) {
            Flash::error('Jam not found');

            return redirect(route('jams.index'));
        }

        return view('jams.edit')->with('jam', $jam);
    }

    /**
     * Update the specified Jam in storage.
     *
     * @param int $id
     * @param UpdateJamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJamRequest $request)
    {
        $jam = $this->jamRepository->find($id);

        if (empty($jam)) {
            Flash::error('Jam not found');

            return redirect(route('jams.index'));
        }

        $jam = $this->jamRepository->update($request->all(), $id);

        Flash::success('Jam updated successfully.');

        return redirect(route('jams.index'));
    }

    /**
     * Remove the specified Jam from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jam = $this->jamRepository->find($id);

        if (empty($jam)) {
            Flash::error('Jam not found');

            return redirect(route('jams.index'));
        }

        $this->jamRepository->delete($id);

        Flash::success('Jam deleted successfully.');

        return redirect(route('jams.index'));
    }
}
