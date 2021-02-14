<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJamAPIRequest;
use App\Http\Requests\API\UpdateJamAPIRequest;
use App\Models\Jam;
use App\Repositories\JamRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class JamController
 * @package App\Http\Controllers\API
 */

class JamAPIController extends AppBaseController
{
    /** @var  JamRepository */
    private $jamRepository;

    public function __construct(JamRepository $jamRepo)
    {
        $this->jamRepository = $jamRepo;
    }

    /**
     * Display a listing of the Jam.
     * GET|HEAD /jams
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $jams = $this->jamRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($jams->toArray(), 'Jams retrieved successfully');
    }

    /**
     * Store a newly created Jam in storage.
     * POST /jams
     *
     * @param CreateJamAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJamAPIRequest $request)
    {
        $input = $request->all();

        $jam = $this->jamRepository->create($input);

        return $this->sendResponse($jam->toArray(), 'Jam saved successfully');
    }

    /**
     * Display the specified Jam.
     * GET|HEAD /jams/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Jam $jam */
        $jam = $this->jamRepository->find($id);

        if (empty($jam)) {
            return $this->sendError('Jam not found');
        }

        return $this->sendResponse($jam->toArray(), 'Jam retrieved successfully');
    }

    /**
     * Update the specified Jam in storage.
     * PUT/PATCH /jams/{id}
     *
     * @param int $id
     * @param UpdateJamAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJamAPIRequest $request)
    {
        $input = $request->all();

        /** @var Jam $jam */
        $jam = $this->jamRepository->find($id);

        if (empty($jam)) {
            return $this->sendError('Jam not found');
        }

        $jam = $this->jamRepository->update($input, $id);

        return $this->sendResponse($jam->toArray(), 'Jam updated successfully');
    }

    /**
     * Remove the specified Jam from storage.
     * DELETE /jams/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Jam $jam */
        $jam = $this->jamRepository->find($id);

        if (empty($jam)) {
            return $this->sendError('Jam not found');
        }

        $jam->delete();

        return $this->sendSuccess('Jam deleted successfully');
    }
}
