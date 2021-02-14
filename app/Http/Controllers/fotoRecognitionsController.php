<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatefotoRecognitionsRequest;
use App\Http\Requests\UpdatefotoRecognitionsRequest;
use App\Repositories\fotoRecognitionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class fotoRecognitionsController extends AppBaseController
{
    /** @var  fotoRecognitionsRepository */
    private $fotoRecognitionsRepository;

    public function __construct(fotoRecognitionsRepository $fotoRecognitionsRepo)
    {
        $this->fotoRecognitionsRepository = $fotoRecognitionsRepo;
    }

    /**
     * Display a listing of the fotoRecognitions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $fotoRecognitions = $this->fotoRecognitionsRepository->all();

        return view('foto_recognitions.index')
            ->with('fotoRecognitions', $fotoRecognitions);
    }

    /**
     * Show the form for creating a new fotoRecognitions.
     *
     * @return Response
     */
    public function create()
    {
        return view('foto_recognitions.create');
    }

    /**
     * Store a newly created fotoRecognitions in storage.
     *
     * @param CreatefotoRecognitionsRequest $request
     *
     * @return Response
     */
    public function store(CreatefotoRecognitionsRequest $request)
    {
        $input = $request->all();

        $fotoRecognitions = $this->fotoRecognitionsRepository->create($input);

        Flash::success('Foto Recognitions saved successfully.');

        return redirect(route('fotoRecognitions.index'));
    }

    /**
     * Display the specified fotoRecognitions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fotoRecognitions = $this->fotoRecognitionsRepository->find($id);

        if (empty($fotoRecognitions)) {
            Flash::error('Foto Recognitions not found');

            return redirect(route('fotoRecognitions.index'));
        }

        return view('foto_recognitions.show')->with('fotoRecognitions', $fotoRecognitions);
    }

    /**
     * Show the form for editing the specified fotoRecognitions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fotoRecognitions = $this->fotoRecognitionsRepository->find($id);

        if (empty($fotoRecognitions)) {
            Flash::error('Foto Recognitions not found');

            return redirect(route('fotoRecognitions.index'));
        }

        return view('foto_recognitions.edit')->with('fotoRecognitions', $fotoRecognitions);
    }

    /**
     * Update the specified fotoRecognitions in storage.
     *
     * @param int $id
     * @param UpdatefotoRecognitionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefotoRecognitionsRequest $request)
    {
        $fotoRecognitions = $this->fotoRecognitionsRepository->find($id);

        if (empty($fotoRecognitions)) {
            Flash::error('Foto Recognitions not found');

            return redirect(route('fotoRecognitions.index'));
        }

        $fotoRecognitions = $this->fotoRecognitionsRepository->update($request->all(), $id);

        Flash::success('Foto Recognitions updated successfully.');

        return redirect(route('fotoRecognitions.index'));
    }

    /**
     * Remove the specified fotoRecognitions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fotoRecognitions = $this->fotoRecognitionsRepository->find($id);

        if (empty($fotoRecognitions)) {
            Flash::error('Foto Recognitions not found');

            return redirect(route('fotoRecognitions.index'));
        }

        $this->fotoRecognitionsRepository->delete($id);

        Flash::success('Foto Recognitions deleted successfully.');

        return redirect(route('fotoRecognitions.index'));
    }
}
