<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSektorRequest;
use App\Http\Requests\UpdateSektorRequest;
use App\Repositories\SektorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SektorController extends AppBaseController
{
    /** @var  SektorRepository */
    private $sektorRepository;

    public function __construct(SektorRepository $sektorRepo)
    {
        $this->sektorRepository = $sektorRepo;
    }

    /**
     * Display a listing of the Sektor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sektors = $this->sektorRepository->all();

        return view('sektors.index')
            ->with('sektors', $sektors);
    }

    /**
     * Show the form for creating a new Sektor.
     *
     * @return Response
     */
    public function create()
    {
        return view('sektors.create');
    }

    /**
     * Store a newly created Sektor in storage.
     *
     * @param CreateSektorRequest $request
     *
     * @return Response
     */
    public function store(CreateSektorRequest $request)
    {
        $input = $request->all();

        $sektor = $this->sektorRepository->create($input);

        Flash::success('Sektor saved successfully.');

        return redirect(route('sektors.index'));
    }

    /**
     * Display the specified Sektor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sektor = $this->sektorRepository->find($id);

        if (empty($sektor)) {
            Flash::error('Sektor not found');

            return redirect(route('sektors.index'));
        }

        return view('sektors.show')->with('sektor', $sektor);
    }

    /**
     * Show the form for editing the specified Sektor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sektor = $this->sektorRepository->find($id);

        if (empty($sektor)) {
            Flash::error('Sektor not found');

            return redirect(route('sektors.index'));
        }

        return view('sektors.edit')->with('sektor', $sektor);
    }

    /**
     * Update the specified Sektor in storage.
     *
     * @param int $id
     * @param UpdateSektorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSektorRequest $request)
    {
        $sektor = $this->sektorRepository->find($id);

        if (empty($sektor)) {
            Flash::error('Sektor not found');

            return redirect(route('sektors.index'));
        }

        $sektor = $this->sektorRepository->update($request->all(), $id);

        Flash::success('Sektor updated successfully.');

        return redirect(route('sektors.index'));
    }

    /**
     * Remove the specified Sektor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sektor = $this->sektorRepository->find($id);

        if (empty($sektor)) {
            Flash::error('Sektor not found');

            return redirect(route('sektors.index'));
        }

        $this->sektorRepository->delete($id);

        Flash::success('Sektor deleted successfully.');

        return redirect(route('sektors.index'));
    }
}
