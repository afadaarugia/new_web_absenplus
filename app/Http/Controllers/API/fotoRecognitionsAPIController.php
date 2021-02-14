<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatefotoRecognitionsAPIRequest;
use App\Http\Requests\API\UpdatefotoRecognitionsAPIRequest;
use App\Models\fotoRecognitions;
use App\Repositories\fotoRecognitionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class fotoRecognitionsController
 * @package App\Http\Controllers\API
 */

class fotoRecognitionsAPIController extends AppBaseController
{
    /** @var  fotoRecognitionsRepository */
    private $fotoRecognitionsRepository;

    public function __construct(fotoRecognitionsRepository $fotoRecognitionsRepo)
    {
        $this->fotoRecognitionsRepository = $fotoRecognitionsRepo;
    }

    /**
     * Display a listing of the fotoRecognitions.
     * GET|HEAD /fotoRecognitions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $fotoRecognitions = $this->fotoRecognitionsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($fotoRecognitions->toArray(), 'Foto Recognitions retrieved successfully');
    }

    /**
     * Store a newly created fotoRecognitions in storage.
     * POST /fotoRecognitions
     *
     * @param CreatefotoRecognitionsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatefotoRecognitionsAPIRequest $request)
    {
        $input = $request->all();

        $fotoRecognitions = $this->fotoRecognitionsRepository->create($input);

        return $this->sendResponse($fotoRecognitions->toArray(), 'Foto Recognitions saved successfully');
    }

    /**
     * Display the specified fotoRecognitions.
     * GET|HEAD /fotoRecognitions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var fotoRecognitions $fotoRecognitions */
        $fotoRecognitions = $this->fotoRecognitionsRepository->find($id);

        if (empty($fotoRecognitions)) {
            return $this->sendError('Foto Recognitions not found');
        }

        return $this->sendResponse($fotoRecognitions->toArray(), 'Foto Recognitions retrieved successfully');
    }

    /**
     * Update the specified fotoRecognitions in storage.
     * PUT/PATCH /fotoRecognitions/{id}
     *
     * @param int $id
     * @param UpdatefotoRecognitionsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefotoRecognitionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var fotoRecognitions $fotoRecognitions */
        $fotoRecognitions = $this->fotoRecognitionsRepository->find($id);

        if (empty($fotoRecognitions)) {
            return $this->sendError('Foto Recognitions not found');
        }

        $fotoRecognitions = $this->fotoRecognitionsRepository->update($input, $id);

        return $this->sendResponse($fotoRecognitions->toArray(), 'fotoRecognitions updated successfully');
    }

    /**
     * Remove the specified fotoRecognitions from storage.
     * DELETE /fotoRecognitions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var fotoRecognitions $fotoRecognitions */
        $fotoRecognitions = $this->fotoRecognitionsRepository->find($id);

        if (empty($fotoRecognitions)) {
            return $this->sendError('Foto Recognitions not found');
        }

        $fotoRecognitions->delete();

        return $this->sendSuccess('Foto Recognitions deleted successfully');
    }
}
