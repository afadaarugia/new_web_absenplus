<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetmpImageAPIRequest;
use App\Http\Requests\API\UpdatetmpImageAPIRequest;
use App\Models\tmpImage;
use App\Repositories\tmpImageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tmpImageController
 * @package App\Http\Controllers\API
 */

class tmpImageAPIController extends AppBaseController
{
    /** @var  tmpImageRepository */
    private $tmpImageRepository;

    public function __construct(tmpImageRepository $tmpImageRepo)
    {
        $this->tmpImageRepository = $tmpImageRepo;
    }

    /**
     * Display a listing of the tmpImage.
     * GET|HEAD /tmpImages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tmpImages = $this->tmpImageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tmpImages->toArray(), 'Tmp Images retrieved successfully');
    }

    /**
     * Store a newly created tmpImage in storage.
     * POST /tmpImages
     *
     * @param CreatetmpImageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetmpImageAPIRequest $request)
    {
        $input = $request->all();

        $tmpImage = $this->tmpImageRepository->create($input);

        return $this->sendResponse($tmpImage->toArray(), 'Tmp Image saved successfully');
    }

    /**
     * Display the specified tmpImage.
     * GET|HEAD /tmpImages/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tmpImage $tmpImage */
        $tmpImage = $this->tmpImageRepository->find($id);

        if (empty($tmpImage)) {
            return $this->sendError('Tmp Image not found');
        }

        return $this->sendResponse($tmpImage->toArray(), 'Tmp Image retrieved successfully');
    }

    /**
     * Update the specified tmpImage in storage.
     * PUT/PATCH /tmpImages/{id}
     *
     * @param int $id
     * @param UpdatetmpImageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetmpImageAPIRequest $request)
    {
        $input = $request->all();

        /** @var tmpImage $tmpImage */
        $tmpImage = $this->tmpImageRepository->find($id);

        if (empty($tmpImage)) {
            return $this->sendError('Tmp Image not found');
        }

        $tmpImage = $this->tmpImageRepository->update($input, $id);

        return $this->sendResponse($tmpImage->toArray(), 'tmpImage updated successfully');
    }

    /**
     * Remove the specified tmpImage from storage.
     * DELETE /tmpImages/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tmpImage $tmpImage */
        $tmpImage = $this->tmpImageRepository->find($id);

        if (empty($tmpImage)) {
            return $this->sendError('Tmp Image not found');
        }

        $tmpImage->delete();

        return $this->sendSuccess('Tmp Image deleted successfully');
    }
}
